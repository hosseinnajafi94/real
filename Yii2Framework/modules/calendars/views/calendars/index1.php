<?php
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use app\assets\AdminAsset;
use app\config\widgets\ActiveForm;
use app\config\components\functions;
/* @var $this \yii\web\View */
/* @var $model \app\modules\calendars\models\VML\CalendarsVML */
/* @var $modelType \app\modules\calendars\models\VML\CalendarsListTypeVML */
$types = $modelType->getTypes();
?>
<div class="border p-1 mb-1 bg-light" style="border-radius: 4px;">
    <p class="mb-2">تقویم</p>
    <a class="btn btn-sm btn-success mb-0 addType">تقویم جدید</a>
    <a class="btn btn-sm btn-secondary mb-0 listType"><i class="fa fa-edit"></i></a>
    <ul id="ulListType">
        <li>
            <label class="btn btn-sm btn-primary">
                <input type="checkbox" class="calendar_type" data-id="all"/>
                <span>همه</span>
            </label>
        </li>
        <?php
        foreach ($types as $type) {
            ?>
            <li>
                <label class="btn btn-sm btn-primary">
                    <input type="checkbox" class="calendar_type" data-id="<?= $type['id'] ?>"/>
                    <span><?= $type['title'] ?></span>
                </label>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
<div id="calendar"></div>

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
    <?php $form                     = ActiveForm::begin(['id' => 'formNew', 'action' => ['event']]); ?>
    <?= Html::activeHiddenInput($model, 'id') ?>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'favcolor')->textInput(['type' => 'color']) ?>
        </div>
    </div>
    <?= $form->field($model, 'type_id')->dropDownList($model->list_type) ?>
    <?= $form->field($model, 'status_id')->dropDownList($model->list_status) ?>
    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'start_date')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: left;']) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'start_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'end_date')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: left;']) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'end_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
        </div>
    </div>
    <?= $form->field($model, 'time_id')->dropDownList($model->list_time) ?>
    <?= $form->field($model, 'period_id')->dropDownList($model->list_period) ?>
    <?= $form->field($model, 'alarm_type_id')->dropDownList($model->list_alarm_type) ?>
    <?= $form->field($model, 'users')->select2($model->list_users, ['multiple' => true, 'class' => 'form-control form-control-sm']) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'file')->fileInput() ?>
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
        'footer'  => Html::a(Yii::t('app', 'Update'), null, ['class' => 'btn btn-sm btn-primary update'])
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
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('users') ?></label>
            <div class="col-8" id="users"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('description') ?></label>
            <div class="col-8" id="description"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('file') ?></label>
            <div class="col-8">
                <img id="file" src="" style="max-width: 100%;max-height: 150px;"/>
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
            <?= $formType->field($modelType, 'sections1')->select2($modelType->list_sections, ['multiple' => true]) ?>
        </div>
        <div class="col">
            <?= $formType->field($modelType, 'sections2')->select2($modelType->list_sections, ['multiple' => true]) ?>
        </div>
        <div class="col">
            <?= $formType->field($modelType, 'sections3')->select2($modelType->list_sections, ['multiple' => true]) ?>
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
$this->registerCssFile('@web/themes/custom/css/fullcalendar.min.css', ['depends' => AdminAsset::class]);
$this->registerCss('
    .fc-unthemed .fc-today {color: black !important;}
    .myselected {background-color: #bed7f3 !important;}
    .fc-basic-view td {cursor: pointer;}
    .fc-basic-view th {cursor: default;}
    .bg-light ul {list-style: none;padding: 0;margin: 0;}
    .bg-light ul li {line-height: 1;margin: 5px 0 0 0;display: inline-block;}
    .bg-light ul li label {margin: 0 !important;}
    .modal-header, .modal-footer {padding: 5px;}
');
$this->registerJsFile('@web/themes/custom/js/moment.min.js', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/js/moment-jalaali.js', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/js/fullcalendar.min.js', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/js/locale-all.js', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/js/calendars.js', ['depends' => AdminAsset::class]);
$this->registerJs("
    var types         = " . json_encode($types) . ";
    var events        = " . json_encode($model->getEvents()) . ";
    var areYouSure    = '" . Yii::t('app', 'Are you sure?') . "';
    var urlDeleteType = '" . Url::to(['delete-type']) . "';
    var urlDelete     = '" . Url::to(['delete']) . "';
    var urlCalendars  = '" . Yii::getAlias('@web/uploads/calendars') . "/';
    var today         = '" . functions::getjdate() . "';
    var urlSearch     = '" . Url::to(['search']) . "';
", View::POS_HEAD);
