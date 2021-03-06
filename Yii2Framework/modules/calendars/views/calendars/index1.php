<?php
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use app\assets\AdminAsset;
use app\config\widgets\ActiveForm;
use app\config\components\functions;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this \yii\web\View */
/* @var $model \app\modules\calendars\models\VML\CalendarsVML */
/* @var $modelType \app\modules\calendars\models\VML\CalendarsListTypeVML */
?>
<!--  -->
<div class="d-none border p-1 mb-1 bg-light hidden-print" style="border-radius: 4px;">
    <!--    <ul id="ulListType">
            <li>
                <label class="btn btn-sm btn-primary">
                    <input type="checkbox" class="calendar_type" data-id="all" checked/>
                    <span>همه</span>
                </label>
            </li>
    <?php
    foreach ($types as $type) {
        ?>
                                            <li>
                                                <label class="btn btn-sm btn-primary">
                                                    <input type="checkbox" class="calendar_type" data-id="<?= $type['id'] ?>" checked/>
                                                    <span><?= $type['title'] ?></span>
                                                </label>
                                            </li>
        <?php
    }
    ?>
        </ul>-->
</div>
<ul class="nav nav-tabs hidden-print">
    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#type1">نمایش یک</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#type2">نمایش دو</a></li>
</ul>
<div class="tab-content p-0 pt-1">
    <div class="tab-pane active show" id="type1">
        <div id="calendar" class="border" style="background: #F7F9FA;padding: 15px;border-radius: 4px;min-height: 800px;max-height: 800px;overflow: hidden;"></div>
    </div>
    <div class="tab-pane" id="type2">
        <div id="date6" data-url="<?= Url::to(['get-list']) ?>" class="mb-2"></div>
        <p>
            <a class="btn btn-sm btn-success addNew disabled">افزودن</a>
        </p>
        <table class="table table-bordered table-sm mb-0" id="getList">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>عنوان</th>
                    <th><label><input type="checkbox"/> حذف کلی</label></th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <a class="btn btn-sm btn-danger mb-0 mt-1 pull-left list1DeleteAll disabled">حذف</a>
    </div>
</div>
<!-- Events -->
<div>
    <?php ob_start(); ?>
    <?php
    Modal::begin([
        'id'      => 'modalNew',
        'options' => ['class' => ''],
        'title'   => Yii::t('app', 'Create'),
        'footer'  => Html::a(Yii::t('app', 'Save'), null, ['class' => 'btn btn-sm btn-success', 'id' => 'saveNew'])
    ]);
    ?>
    <?php
    $form                     = ActiveForm::begin([
                'id'          => 'formNew',
                'action'      => ['event'],
                'layout'      => 'horizontal',
                'fieldConfig' => [
                    'horizontalCssClasses' => [
                        'label'   => 'col-5',
                        'wrapper' => 'col-7',
                    ],
                ],
    ]);
    ?>
    <?= Html::activeHiddenInput($model, 'id') ?>
    <?=
    $form->field($model, 'title', [
        'template'             => '
            {label}
            <div class="col-7 input-group">
                {input}
                <div class="input-group-append" style="position: relative;">
                    <a class="btn btn-sm btn-outline-primary" id="searchTitle" data-url="' . Url::to(['search-title']) . '"><i class="fa fa-search"></i></a>
                </div>
                {hint}
                {error}
            </div>
        ',
        'horizontalCssClasses' => [
            'label'   => 'col-5',
            'wrapper' => 'col-7',
        ],
    ])->textInput(['maxlength' => true])
    ?>
    <?= $form->field($model, 'favcolor')->textInput(['type' => 'color']) ?>
    <?= $form->field($model, 'type_id')->dropDownList($model->list_type) ?>
    <?= $form->field($model, 'status_id')->dropDownList($model->list_status) ?>
    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'start_date')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: left;']) ?>
    <?= $form->field($model, 'start_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
    <?= $form->field($model, 'end_date')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: left;']) ?>
    <?= $form->field($model, 'end_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
    <?= $form->field($model, 'users')->select2($model->list_users, ['multiple' => true, 'class' => 'form-control form-control-sm'], ['closeOnSelect' => false]) ?>
    <?= $form->field($model, 'for_informations')->select2($model->list_users, ['multiple' => true, 'class' => 'form-control form-control-sm'], ['closeOnSelect' => false]) ?>
    <?= $form->field($model, 'implementations')->select2($model->list_users, ['multiple' => true, 'class' => 'form-control form-control-sm'], ['closeOnSelect' => false]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'file')->fileInput() ?>
    <?= $form->field($model, 'has_reception')->checkbox() ?>
    <?= $form->field($model, 'catering_id', ['options' => ['style' => 'display: none;']])->dropDownList($model->list_users) ?>
    <?= $form->field($model, 'requirements', ['options' => ['style' => 'display: none;']])->select2($model->list_requirements, ['multiple' => true, 'class' => 'form-control form-control-sm'], ['closeOnSelect' => false]) ?>
    <?php
    DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody'      => '.container-items', // required: css class selector
        'widgetItem'      => '.item', // required: css class
        //'limit' => 4, // the maximum times, an element can be cloned (default 999)
        //'min' => 1, // 0 or 1 (default 1)
        'insertButton'    => '.add-item', // css class
        'deleteButton'    => '.remove-item', // css class
        'model'           => $modelAlarm,
        'formId'          => 'formNew',
        'formFields'      => [
            'type_id',
            'time_id',
            'period_id',
            'alarm_type_id',
            'message'
        ],
    ]);
    ?>
    <div class="container-items">
        <div class="item card border">
            <div class="card-header" style="padding: 10px;">
                <h3 class="card-title pull-right">اعلان ( حاضرین در جلسه, جهت اطلاع )</h3>
                <div class="pull-left">
                    <button type="button" class="add-item btn btn-success btn-sm mb-0" style="line-height: 1;padding: 4px 4px 1px 4px;"><i class="fa fa-plus"></i></button>
                    <button type="button" class="remove-item btn btn-danger btn-sm mb-0" style="line-height: 1;padding: 4px 4px 1px 4px;"><i class="fa fa-minus"></i></button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-block" style="padding: 0 10px;">
                <?= Html::activeHiddenInput($modelAlarm, '[0]type_id', ['value' => 1])?>
                <?= $form->field($modelAlarm, '[0]time_id', ['options' => ['class' => 'form-group row mb-1']])->dropDownList($model->list_time) ?>
                <?= $form->field($modelAlarm, '[0]period_id', ['options' => ['class' => 'form-group row mb-1']])->dropDownList($model->list_period) ?>
                <?= $form->field($modelAlarm, '[0]alarm_type_id', ['options' => ['class' => 'form-group row mb-1']])->dropDownList($model->list_alarm_type) ?>
                <?= $form->field($modelAlarm, '[0]message', ['options' => ['class' => 'form-group row mb-1']])->textarea(['rows' => 6]) ?>
            </div>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>
    <?php
    DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper1', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody'      => '.container-items1', // required: css class selector
        'widgetItem'      => '.item1', // required: css class
        //'limit' => 4, // the maximum times, an element can be cloned (default 999)
        //'min' => 1, // 0 or 1 (default 1)
        'insertButton'    => '.add-item1', // css class
        'deleteButton'    => '.remove-item1', // css class
        'model'           => $modelAlarm2,
        'formId'          => 'formNew',
        'formFields'      => [
            'type_id',
            'time_id',
            'period_id',
            'alarm_type_id',
            'message'
        ],
    ]);
    ?>
    <div class="container-items1">
        <div class="item1 card border">
            <div class="card-header" style="padding: 10px;">
                <h3 class="card-title pull-right">اعلان ( مسئول اجرا )</h3>
                <div class="pull-left">
                    <button type="button" class="add-item1 btn btn-success btn-sm mb-0" style="line-height: 1;padding: 4px 4px 1px 4px;"><i class="fa fa-plus"></i></button>
                    <button type="button" class="remove-item1 btn btn-danger btn-sm mb-0" style="line-height: 1;padding: 4px 4px 1px 4px;"><i class="fa fa-minus"></i></button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-block" style="padding: 0 10px;">
                <?= Html::activeHiddenInput($modelAlarm2, '[0]type_id', ['value' => 2])?>
                <?= $form->field($modelAlarm2, '[0]time_id', ['options' => ['class' => 'form-group row mb-1']])->dropDownList($model->list_time) ?>
                <?= $form->field($modelAlarm2, '[0]period_id', ['options' => ['class' => 'form-group row mb-1']])->dropDownList($model->list_period) ?>
                <?= $form->field($modelAlarm2, '[0]alarm_type_id', ['options' => ['class' => 'form-group row mb-1']])->dropDownList($model->list_alarm_type) ?>
                <?= $form->field($modelAlarm2, '[0]message', ['options' => ['class' => 'form-group row mb-1']])->textarea(['rows' => 6]) ?>
            </div>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>
    <?php ActiveForm::end(); ?>
    <?php Modal::end(); ?>
    <?php $this->params['modals'][] = ob_get_clean(); ?>
</div>
<div>
    <?php ob_start(); ?>
    <?php
    Modal::begin([
        'id'      => 'modalNewAlarm',
        'options' => ['class' => ''],
        'title'   => Yii::t('app', 'Create'),
        'footer'  => ''
        . ' ' . Html::a(Yii::t('app', 'Return'), null, ['class' => 'btn btn-sm btn-warning', 'id' => 'returnNewAlarm'])
        . ' ' . Html::a(Yii::t('app', 'Save'), null, ['class' => 'btn btn-sm btn-success', 'id' => 'saveNewAlarm'])
    ]);
    ?>
    <?php $form                     = ActiveForm::begin(['id' => 'formNewAlarm', 'action' => ['alarm']]); ?>
    <?= Html::activeHiddenInput($modelAlarm, 'id') ?>
    <?= Html::activeHiddenInput($modelAlarm, 'calendar_id') ?>
    <?= $form->field($modelAlarm, 'time_id')->dropDownList($model->list_time) ?>
    <?= $form->field($modelAlarm, 'period_id')->dropDownList($model->list_period) ?>
    <?= $form->field($modelAlarm, 'alarm_type_id')->dropDownList($model->list_alarm_type) ?>
    <?= $form->field($modelAlarm, 'message')->textarea(['rows' => 6]) ?>
    <?php ActiveForm::end(); ?>
    <?php Modal::end(); ?>
    <?php $this->params['modals'][] = ob_get_clean(); ?>
</div>
<div>
    <?php ob_start() ?>
    <?php
    Modal::begin([
        'id'      => 'modalView',
        'options' => ['class' => ''],
        'title'   => Yii::t('app', 'Details'),
        'footer'  => ''
//        . ' ' . Html::a(Yii::t('app', 'افزودن هشدار'), null, ['class' => 'btn btn-sm btn-secondary add-alarm'])
        . ' ' . Html::a(Yii::t('app', 'Update'), null, ['class' => 'btn btn-sm btn-primary update'])
        . ' ' . Html::a(Yii::t('app', 'Delete'), null, ['class' => 'btn btn-sm btn-danger delete'])
    ])
    ?>
    <div>
        <p>
            <?= Html::a(Yii::t('app', 'Update'), null, ['class' => 'btn btn-sm btn-primary update']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), null, ['class' => 'btn btn-sm btn-danger delete']) ?>
        </p>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('title') ?></label>
            <div class="col-8" id="title"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('favcolor') ?></label>
            <div class="col-8"><div id="favcolor" style="height: 30px;"></div></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('type_id') ?></label>
            <div class="col-8" id="type_id"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('status_id') ?></label>
            <div class="col-8" id="status_id"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('location') ?></label>
            <div class="col-8" id="location"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('start_date') ?></label>
            <div class="col-8" id="start_date"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('start_time') ?></label>
            <div class="col-8" id="start_time"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('end_date') ?></label>
            <div class="col-8" id="end_date"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('end_time') ?></label>
            <div class="col-8" id="end_time"></div>
        </div>
        <!--
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('time_id') ?></label>
            <div class="col-8" id="time_id"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('period_id') ?></label>
            <div class="col-8" id="period_id"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('alarm_type_id') ?></label>
            <div class="col-8" id="alarm_type_id"></div>
        </div>
        -->
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('users') ?></label>
            <div class="col-8" id="users"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('for_informations') ?></label>
            <div class="col-8" id="for_informations"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('implementations') ?></label>
            <div class="col-8" id="implementations"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('description') ?></label>
            <div class="col-8" id="description"></div>
        </div>
        <div class="row form-group">
            <label class="col-4">مراحل اجرا</label>
            <div class="col-8" id="implementation_steps"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('file') ?></label>
            <div class="col-8">
                <img id="file" src="" style="max-width: 100%;max-height: 150px;"/>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('has_reception') ?></label>
            <div class="col-8" id="has_reception"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('catering_id') ?></label>
            <div class="col-8" id="catering_id"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('requirements') ?></label>
            <div class="col-8" id="requirements"></div>
        </div>
        <div class="row form-group">
            <label class="col-12">هشدارها ( حاضرین در جلسه, جهت اطلاع )</label>
            <div class="col-12">
                <ul id="alarms"></ul>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-12">هشدارها ( مسئول اجرا )</label>
            <div class="col-12">
                <ul id="alarms2"></ul>
            </div>
        </div>
    </div>
    <?php Modal::end() ?>
    <?php $this->params['modals'][] = ob_get_clean() ?>
</div>
<!-- Types -->
<div>
    <?php ob_start() ?>
    <?php
    Modal::begin([
        'size'    => Modal::SIZE_LARGE,
        'id'      => 'modalNewType',
        'options' => ['class' => ''],
        'title'   => Yii::t('app', 'Create'),
        'footer'  => Html::a(Yii::t('app', 'Save'), null, ['class' => 'btn btn-sm btn-success', 'id' => 'saveNewType'])
    ])
    ?>
    <?php $formType                 = ActiveForm::begin(['id' => 'formNewType', 'action' => ['type']]); ?>
    <?= Html::activeHiddenInput($modelType, 'id') ?>
    <?= $formType->field($modelType, 'title')->textInput() ?>
    <?= $formType->field($modelType, 'description')->textarea() ?>
    <div class="row">
        <div class="col">
            <?= $formType->field($modelType, 'sections1')->select2($modelType->list_sections, ['multiple' => true], ['closeOnSelect' => false]) ?>
        </div>
        <div class="col">
            <?= $formType->field($modelType, 'sections2')->select2($modelType->list_sections, ['multiple' => true], ['closeOnSelect' => false]) ?>
        </div>
        <div class="col">
            <?= $formType->field($modelType, 'sections3')->select2($modelType->list_sections, ['multiple' => true], ['closeOnSelect' => false]) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <?php Modal::end() ?>
    <?php $this->params['modals'][] = ob_get_clean() ?>
</div>
<div>
    <?php ob_start() ?>
    <?php
    Modal::begin([
        'id'      => 'modalListType',
        'options' => ['class' => ''],
        'title'   => 'تقویم',
    ])
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>عنوان</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($types as $type) {
                ?>
                <tr>
                    <td><?= $type['id'] ?></td>
                    <td><?= $type['title'] ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary mb-0 editType" data-id="<?= $type['id'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger mb-0 deleteType" data-id="<?= $type['id'] ?>"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php Modal::end() ?>
    <?php $this->params['modals'][] = ob_get_clean() ?>
</div>
<!--  -->
<?php
$this->registerJsFile('@web/themes/custom/js/moment.min.js', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/js/moment-jalaali.js', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/js/fullcalendar.min.js', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/js/locale-all.js', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/js/calendars.js?ver=9', ['depends' => AdminAsset::class]);
$this->registerCssFile('@web/themes/custom/css/fullcalendar.min.css', ['depends' => AdminAsset::class]);
$this->registerJs("
$(document).on('click', '#getList th input:checkbox', function (e) {
    $('#getList tbody input:checkbox').prop('checked', this.checked);
});
$(document).on('click', '.list1DeleteAll', function (e) {
    var ids = [];
    $('#getList tbody input:checkbox:checked').each(function () {
        ids.push($(this).data('id'));
    });
    if (ids.length > 0 && confirm('" . Yii::t('app', 'Are you sure?') . "')) {
        ajaxget('" . Url::to(['delete-events']) . "', {ids}, function () {
            var {url, datetime} = $('#getList tbody').data('options');
            showList(url, datetime);
        });
    }
});
$(document).on('change', '#getList input:checkbox', function (e) {
    $('.list1DeleteAll').removeClass('disabled');
    if ($('#getList tbody input:checkbox:checked').length === 0) {
        $('.list1DeleteAll').addClass('disabled');
    }
});
");
$this->registerJs("
    var types         = " . json_encode($types) . ";
    var events        = " . json_encode($model->getEvents()) . ";
    var areYouSure    = '" . Yii::t('app', 'Are you sure?') . "';
    var urlDeleteType = '" . Url::to(['delete-type']) . "';
    var urlDelete     = '" . Url::to(['delete-event']) . "';
    var urlCalendars  = '" . Yii::getAlias('@web/uploads/calendars') . "/';
    var today         = '" . functions::getjdate() . "';
    var urlSearch     = '" . Url::to(['search']) . "';
", View::POS_HEAD);
$this->registerCss('
    .fc-scroller {
        overflow-y: hidden !important;
    }
    .fc-event span.fc-title {
        white-space: nowrap !important;
        display: block !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        direction: rtl !important;
    }
    .input-group {margin-bottom: 0 !important;}
    form .form-group {margin-bottom: 3px !important;}
    .menu2 span.fa {display: none !important;}
    .menu2 span.fa.active {display: inline-block !important;}
    @media (min-width: 992px) {
        .menu2:hover span.fa {display: inline-block !important;}
    }
    #fulldate {direction: ltr;text-align: center;max-width: 150px;}
    #search {max-width: 150px;}
    #search_event {
        max-width: 150px;
        position:  relative;
        z-index:   1000;
    }
    .fc-title, .fc-time {font-size: 11px !important;}
    .fc-unthemed .fc-today {color: black !important;}
    .myselected {background-color: #bed7f3 !important;}
    .fc-basic-view td {cursor: pointer;}
    .fc-basic-view th {cursor: default;}
    .bg-light ul {list-style: none;padding: 0;margin: 0;}
    .bg-light ul li {line-height: 1;margin: 5px 0 0 0;display: inline-block;}
    .bg-light ul li label {margin: 0 !important;}
    .modal-header, .modal-footer {padding: 5px;}
    .fc-view > table * {direction: ltr !important;}
    #alarms, #alarms2 {list-style: none;padding: 0;margin: 0;}
    #alarms li, #alarms2 li {}
    #search_event_result {
        position: absolute;
        top: 48px;
        right: 0;
        width: 200%;
        max-height: 200px;
        overflow-x: hidden;
        overflow-y: auto;
        padding: 5px 0;
        margin: 0;
        list-style: none;
        text-align: right;
        border-radius: 4px;
        display: none;
    }
    #search_event_result.active {
        display: block;
    }
    #search_event_result li {
        padding: 0 15px;
    }
    #search_event_result li[data-date] {
        padding: 10px 15px 0;
        cursor: pointer;
    }
    #search_event_result li:not(:last-child) {
        border-bottom: 1px dashhed #CCC;
    }
    #search_event_result li:hover {
        background: rgba(0,0,0,0.1);
    }
    #search_event_result li span.title {
        display: block;
        line-height: 1;
    }
    #search_event_result li span.time {
        font-size: 11px;
        line-height: 1;
    }
    .r {}
    .r li {cursor: pointer;padding: 5px;}
    .r li:hover {background: rgba(0,0,0,0.2);}
    .fc-view-container {
        overflow: auto;
    }
    .fc-view > table {
        min-width: 700px;
        min-height: 100%;
        max-height: 100%;
        height: 100%;
    }
    .fc-row.fc-widget-header {
        position: relative;
    }
    .fc td, .fc th {
        padding: 0 !important;
    }
    @media (max-width: 500px) {
        #fulldate {max-width: 100%;width: 100%;margin-left: 0;}
        #search {max-width: 100%;width: 100%;}
        #search_event {max-width: 100%;width: 100%;margin: 0;}
        #search_event_result {width: 100%;}
    }
');
