<?php
use app\assets\AdminAsset;
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this \yii\web\View */
/* @var $model \app\modules\calendars\models\VML\CalendarsVML */
/* @var $modelType \app\modules\calendars\models\VML\CalendarsListTypeVML */
/* @var $data \yii\data\ActiveDataProvider */
/* @var $search \app\modules\calendars\models\VML\CalendarsSearchVML */
$this->title          = Yii::t('calendars', 'Calendars');
$this->params['title'] = $this->title;

//$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/themes/custom/libs/timepicker/timepicker.css', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/libs/timepicker/timepicker.js', ['depends' => AdminAsset::class]);
$types                = $modelType->getTypes();
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
foreach ($types as $type) {
    Yii::$app->controller->module->params['menu'] .= '
        <li class="nav-item noclose">
            <a class="menu-item menu2" style="padding: 0 !important;">
                <label class="mb-0" style="padding: 2px 14px 2px 10px !important;display: inline-block;width: calc(70% - 24px);cursor: pointer;">
                    <input type="checkbox" class="calendar_type" data-id="' . $type['id'] . '" checked/>
                    <span class="menu-title">' . $type['title'] . '</span>
                </label>
                <span class="fa fa-pencil" data-id="' . $type['id'] . '" style="display: inline-block;width: 15%;text-align: center;padding: 8px 0;"></span>
                <span class="fa fa-times" data-id="' . $type['id'] . '" style="display: inline-block;width: 15%;text-align: center;padding: 8px 0;"></span>
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
                        'model'      => $model,
                        'modelType'  => $modelType,
                        'modelAlarm' => $modelAlarm,
                        'types'      => $types
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
                        'data'   => $data4,
                        'search' => $search4,
                        'modelRequirements' => $modelRequirements,
                    ])
                    ?>
                </div>
                <div class="tab-pane" id="page5">
                    <?php $formImport = ActiveForm::begin(['id' => 'importForm', 'action' => ['import']]); ?>
                    <?= $formImport->field($modelImport, 'file')->fileInput() ?>
                    <div class="row">
                        <div class="col">
                            <?= $formImport->field($modelImport, 'favcolor')->textInput(['type' => 'color']) ?>
                        </div>
                        <div class="col">
                            <?= $formImport->field($modelImport, 'type_id')->dropDownList($model->list_type) ?>
                        </div>
                        <div class="col">
                            <?= $formImport->field($modelImport, 'status_id')->dropDownList($model->list_status) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?= $formImport->field($modelImport, 'location')->textInput() ?>
                        </div>
                        <div class="col">
                            <?= $formImport->field($modelImport, 'start_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
                        </div>
                        <div class="col">
                            <?= $formImport->field($modelImport, 'end_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?= $formImport->field($modelImport, 'for_informations')->select2($model->list_users, ['multiple' => true]) ?>
                        </div>
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm mb-0 btn-success']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="tab-pane" id="page6">
                    <?php $formExport = ActiveForm::begin(['id' => 'exportForm', 'action' => ['export']]); ?>
                    <div class="row">
                        <div class="col">
                            <?= $formImport->field($modelExport, 'title')->textInput() ?>
                        </div>
                        <div class="col">
                            <?= $formImport->field($modelExport, 'favcolor')->textInput(['type' => 'color']) ?>
                        </div>
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?= $formImport->field($modelExport, 'type_id')->dropDownList($model->list_type) ?>
                        </div>
                        <div class="col">
                            <?= $formImport->field($modelExport, 'status_id')->dropDownList($model->list_status) ?>
                        </div>
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?= $formImport->field($modelExport, 'location')->textInput() ?>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?= $formImport->field($modelExport, 'start_date')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: left;']) ?>
                        </div>
                        <div class="col">
                            <?= $formImport->field($modelExport, 'start_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
                        </div>
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?= $formImport->field($modelExport, 'end_date')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: left;']) ?>
                        </div>
                        <div class="col">
                            <?= $formImport->field($modelExport, 'end_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
                        </div>
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?= $formImport->field($modelExport, 'description')->textarea(['rows' => 6]) ?>
                        </div>
                        <div class="col">
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
        yearOffset: 60
    }).val('');
    $('#exportvml-end_date').MdPersianDateTimePicker({
        targetTextSelector: '#exportvml-end_date',
        isGregorian: false,
        yearOffset: 60
    }).val('');
");