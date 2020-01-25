<?php
use app\assets\AdminAsset;
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this \yii\web\View */
/* @var $model \app\modules\calendars\models\VML\CalendarsVML */
/* @var $modelType \app\modules\calendars\models\VML\CalendarsListTypeVML */
/* @var $data \yii\data\ActiveDataProvider */
/* @var $search \app\modules\calendars\models\VML\CalendarsSearchVML */
$this->title           = Yii::t('calendars', 'Calendars');
$this->params['title'] = $this->title;

//$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/themes/custom/libs/timepicker/timepicker.css', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/libs/timepicker/timepicker.js', ['depends' => AdminAsset::class]);
$types                                        = $modelType->getTypes();
Yii::$app->controller->module->params['menu'] = '
    <li class="nav-item noclose">
        <a class="menu-item menu2" style="padding: 0 !important;">
            <label class="mb-0" style="padding: 2px 14px 2px 10px !important;display: inline-block;width: 100%;cursor: pointer;">
                <input type="checkbox" class="calendar_type" data-id="all" checked/>
                <span class="menu-title">همه</span>
            </label>
        </a>
    </li>
';
$last = count($types) - 1;
foreach ($types as $index => $type) {
    Yii::$app->controller->module->params['menu'] .= '
        <li class="nav-item noclose checkitem">
            <a class="menu-item menu2" style="padding: 0 !important;">
                <label class="mb-0" style="padding: 2px 14px 2px 10px !important;display: inline-block;width: calc(68% - 24px);cursor: pointer;">
                    <input type="checkbox" class="calendar_type" data-id="' . $type['id'] . '" checked/>
                    <span class="menu-title">' . $type['title'] . '</span>
                </label>
                <span class="fa fa-pencil" data-id="' . $type['id'] . '" style="display: inline-block;width: 8%;text-align: center;padding: 8px 0;"></span>
                <span class="fa fa-times" data-id="' . $type['id'] . '" style="display: inline-block;width: 8%;text-align: center;padding: 8px 0;"></span>
                ' . ($index == 0 ? '' : '<span class="fa fa-arrow-up" data-id="' . $type['id'] . '" data-url="' . \yii\helpers\Url::to(['type-up']) . '" style="display: inline-block;width: 8%;text-align: center;padding: 8px 0;"></span>') . '
                ' . ($index == $last ? '' : '<span class="fa fa-arrow-down" data-id="' . $type['id'] . '" data-url="' . \yii\helpers\Url::to(['type-down']) . '" style="display: inline-block;width: 8%;text-align: center;padding: 8px 0;"></span>') . '
            </a>
        </li>
    ';
}
Yii::$app->controller->module->params['menu'] .= '
    <li class="nav-item"><a class="menu-item menu2 addType"><i class="fa fa-cogs"></i><span class="menu-title">تقویم جدید</a></li>
    <li class="nav-item"><a class="menu-item menu2 listType d-none"><span class="menu-title">مدیریت تقویم ها</a></li>
';
?>
<!--  -->
<div class="calendars-index">
    <div class="card">
        <div class="card-block p-1">
            <ul class="nav nav-tabs hidden-print">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#page1">تقویم</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page2">لیست رویدادها</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page3">مدیریت زمان</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page4">مقدمات برگزاری</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page5">درون ریزی</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page6">برون ریزی</a></li>
            </ul>
            <div class="tab-content p-0 pt-1">
                <div class="tab-pane active show" id="page1">
                    <?=
                    $this->render('index1', [
                        'model'       => $model,
                        'modelType'   => $modelType,
                        'modelAlarm'  => $modelAlarm,
                        'modelAlarm2' => $modelAlarm2,
                        'types'       => $types
                    ])
                    ?>
                </div>
                <div class="tab-pane" id="page2">
                    <?=
                    $this->render('index2', [
                        'data'   => $data,
                        'search' => $search
                    ])
                    ?>
                </div>
                <div class="tab-pane" id="page3">
                    <?= $this->render('index3') ?>
                </div>
                <div class="tab-pane" id="page4">
                    <?=
                    $this->render('index4', [
                        'data'              => $data4,
                        'search'            => $search4,
                        'modelRequirements' => $modelRequirements,
                    ])
                    ?>
                </div>
                <div class="tab-pane" id="page5">
                    <?php
                    $formImport                                   = ActiveForm::begin([
                                'id'          => 'importForm',
                                'action'      => ['import'],
                                'layout'      => 'horizontal',
                                'fieldConfig' => [
                                    'horizontalCssClasses' => [
                                        'label'   => 'col-4',
                                        'wrapper' => 'col-8',
                                    ],
                                ],
                    ]);
                    ?>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <?= $formImport->field($modelImport, 'file')->fileInput() ?>
                        </div>
                        <div class="col-md-4 col-12">
                        </div>
                        <div class="col-md-4 col-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <?= $formImport->field($modelImport, 'favcolor')->textInput(['type' => 'color']) ?>
                        </div>
                        <div class="col-md-4 col-12">
                            <?= $formImport->field($modelImport, 'type_id')->dropDownList($model->list_type) ?>
                        </div>
                        <div class="col-md-4 col-12">
                            <?= $formImport->field($modelImport, 'status_id')->dropDownList($model->list_status) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <?= $formImport->field($modelImport, 'location')->textInput() ?>
                        </div>
                        <div class="col-md-4 col-12">
                            <?= $formImport->field($modelImport, 'start_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
                        </div>
                        <div class="col-md-4 col-12">
                            <?= $formImport->field($modelImport, 'end_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <?= $formImport->field($modelImport, 'for_informations')->select2($model->list_users, ['multiple' => true]) ?>
                            <?php
                            DynamicFormWidget::begin([
                                'widgetContainer' => 'dynamicform_wrapper2', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                                'widgetBody'      => '.container-items2', // required: css class selector
                                'widgetItem'      => '.item2', // required: css class
                                //'limit' => 4, // the maximum times, an element can be cloned (default 999)
                                //'min' => 1, // 0 or 1 (default 1)
                                'insertButton'    => '.add-item2', // css class
                                'deleteButton'    => '.remove-item2', // css class
                                'model'           => $modelAlarm,
                                'formId'          => 'importForm',
                                'formFields'      => [
                                    'type_id',
                                    'time_id',
                                    'period_id',
                                    'alarm_type_id',
                                    'message'
                                ],
                            ]);
                            ?>
                            <div class="container-items2">
                                <div class="item2">
                                    <div class="card border">
                                        <div class="card-header">
                                            <h3 class="card-title pull-right">اعلان ( جهت اطلاع )</h3>
                                            <div class="pull-left">
                                                <button type="button" class="add-item2 btn btn-success btn-sm mb-0" style="line-height: 1;padding: 4px 4px 1px 4px;"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="remove-item2 btn btn-danger btn-sm mb-0" style="line-height: 1;padding: 4px 4px 1px 4px;"><i class="fa fa-minus"></i></button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="card-block">
                                            <?= Html::activeHiddenInput($modelAlarm, '[0]type_id', ['value' => '1']) ?>
                                            <?= $formImport->field($modelAlarm, '[0]time_id', ['options' => ['class' => 'form-group row mb-1']])->dropDownList($model->list_time) ?>
                                            <?= $formImport->field($modelAlarm, '[0]period_id', ['options' => ['class' => 'form-group row mb-1']])->dropDownList($model->list_period) ?>
                                            <?= $formImport->field($modelAlarm, '[0]alarm_type_id', ['options' => ['class' => 'form-group row mb-1']])->dropDownList($model->list_alarm_type) ?>
                                            <?php // $formImport->field($modelAlarm, '[0]message', ['options' => ['class' => 'form-group row mb-1']])->textarea(['rows' => 6])  ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php DynamicFormWidget::end(); ?>
                        </div>
                        <div class="col-md-4 col-12">
                            <?= $formImport->field($modelImport, 'implementations')->select2($model->list_users, ['multiple' => true]) ?>
                            <?php
                            DynamicFormWidget::begin([
                                'widgetContainer' => 'dynamicform_wrapper3', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                                'widgetBody'      => '.container-items3', // required: css class selector
                                'widgetItem'      => '.item3', // required: css class
                                //'limit' => 4, // the maximum times, an element can be cloned (default 999)
                                //'min' => 1, // 0 or 1 (default 1)
                                'insertButton'    => '.add-item3', // css class
                                'deleteButton'    => '.remove-item3', // css class
                                'model'           => $modelAlarm2,
                                'formId'          => 'importForm',
                                'formFields'      => [
                                    'type_id',
                                    'time_id',
                                    'period_id',
                                    'alarm_type_id',
                                    'message'
                                ],
                            ]);
                            ?>
                            <div class="container-items3">
                                <div class="item3">
                                    <div class="card border">
                                        <div class="card-header">
                                            <h3 class="card-title pull-right">اعلان ( مسئول اجرا )</h3>
                                            <div class="pull-left">
                                                <button type="button" class="add-item3 btn btn-success btn-sm mb-0" style="line-height: 1;padding: 4px 4px 1px 4px;"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="remove-item3 btn btn-danger btn-sm mb-0" style="line-height: 1;padding: 4px 4px 1px 4px;"><i class="fa fa-minus"></i></button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="card-block">
                                            <?= Html::activeHiddenInput($modelAlarm2, '[0]type_id', ['value' => '2']) ?>
                                            <?= $formImport->field($modelAlarm2, '[0]time_id', ['options' => ['class' => 'form-group row mb-1']])->dropDownList($model->list_time) ?>
                                            <?= $formImport->field($modelAlarm2, '[0]period_id', ['options' => ['class' => 'form-group row mb-1']])->dropDownList($model->list_period) ?>
                                            <?= $formImport->field($modelAlarm2, '[0]alarm_type_id', ['options' => ['class' => 'form-group row mb-1']])->dropDownList($model->list_alarm_type) ?>
                                            <?php // $formImport->field($modelAlarm, '[0]message', ['options' => ['class' => 'form-group row mb-1']])->textarea(['rows' => 6])  ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php DynamicFormWidget::end(); ?>
                        </div>
                        <div class="col-md-4 col-12">
                        </div>
                    </div>
                    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm mb-0 btn-success']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="tab-pane" id="page6">
                    <?php
                    $formExport                                   = ActiveForm::begin([
                                'id'          => 'exportForm',
                                'action'      => ['export'],
                                'layout'      => 'horizontal',
                                'fieldConfig' => [
                                    'horizontalCssClasses' => [
                                        'label'   => 'col-4',
                                        'wrapper' => 'col-8',
                                    ],
                                ],
                    ]);
                    ?>
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <?= $formExport->field($modelExport, 'title')->textInput() ?>
                        </div>
                        <div class="col-md-3 col-12">
                            <?= $formExport->field($modelExport, 'favcolor')->textInput(['type' => 'color']) ?>
                        </div>
                        <div class="col-md-3 col-12">
                        </div>
                        <div class="col-md-3 col-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <?= $formExport->field($modelExport, 'type_id')->dropDownList($model->list_type) ?>
                        </div>
                        <div class="col-md-3 col-12">
                            <?= $formExport->field($modelExport, 'status_id')->dropDownList($model->list_status) ?>
                        </div>
                        <div class="col-md-3 col-12">
                        </div>
                        <div class="col-md-3 col-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <?=
                            $formExport->field($modelExport, 'location', [
                                'horizontalCssClasses' => [
                                    'label'   => 'col-md-2 col-4',
                                    'wrapper' => 'col-md-10 col-8',
                                ],
                            ])->textInput()
                            ?>
                        </div>
                        <div class="col-md-6 col-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <?= $formExport->field($modelExport, 'start_date')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: left;']) ?>
                        </div>
                        <div class="col-md-3 col-12">
                            <?= $formExport->field($modelExport, 'start_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
                        </div>
                        <div class="col-md-3 col-12">
                        </div>
                        <div class="col-md-3 col-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <?= $formExport->field($modelExport, 'end_date')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: left;']) ?>
                        </div>
                        <div class="col-md-3 col-12">
                            <?= $formExport->field($modelExport, 'end_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
                        </div>
                        <div class="col-md-3 col-12">
                        </div>
                        <div class="col-md-3 col-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <?=
                            $formExport->field($modelExport, 'description', [
                                'horizontalCssClasses' => [
                                    'label'   => 'col-md-2 col-4',
                                    'wrapper' => 'col-md-10 col-8',
                                ],
                            ])->textarea(['rows' => 6])
                            ?>
                        </div>
                        <div class="col-md-6 col-12">
                        </div>
                    </div>
                    <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-sm mb-0 btn-warning']) ?>
                    <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-sm mb-0 btn-success']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->registerJs("
    $('#importvml-start_time, #importvml-end_time, #exportvml-start_time, #exportvml-end_time').timeDropper({format: 'HH:mm:00'}).val('');
    $('#exportvml-start_date').MdPersianDateTimePicker({
        targetTextSelector: '#exportvml-start_date',
        isGregorian: false,
        yearOffset: 60,
        englishNumber: true
    }).on('hide.bs.popover', function () {
        var s = tr_num(this.value).split('/');
        var date = {year: parseInt(s[0]), month: parseInt(s[1]), day: parseInt(s[2])};
        $('#exportvml-end_date').MdPersianDateTimePicker('setDatePersian', date);

        var start_time = moment($(this).val(), 'jYYYY/jMM/jDD');
        var sdate = tr_num(start_time.format('YYYY-MM-DD'));
        var gdate = new Date(sdate);
        $('#exportvml-end_date').MdPersianDateTimePicker('setOption', 'disableBeforeDate', gdate);
    }).val('');
    $('#exportvml-end_date').MdPersianDateTimePicker({
        targetTextSelector: '#exportvml-end_date',
        isGregorian: false,
        yearOffset: 60,
        englishNumber: true
    }).on('hide.bs.popover', function (e) {
        var start_time = parseInt($('#exportvml-start_date').val().toString().replace(/\//g, ''));
        var end_time = parseInt($('#exportvml-end_date').val().toString().replace(/\//g, ''));
        if (start_time > end_time) {
            alert(' تاریخ پایان نمی تواند کوچکتر از تاریخ شروع باشد.');
        }
    }).val('');
");
