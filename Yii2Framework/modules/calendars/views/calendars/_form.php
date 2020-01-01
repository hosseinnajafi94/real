<?php
use app\assets\AdminAsset;
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\calendars\models\VML\CalendarsVML */
/* @var $form ActiveForm */
$this->registerCssFile('@web/themes/custom/libs/timepicker/timepicker.css', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/libs/timepicker/timepicker.js', ['depends' => AdminAsset::class]);
$this->registerJs("
$('#calendarsvml-start_date').MdPersianDateTimePicker({
    targetTextSelector: '#calendarsvml-start_date',
    isGregorian: false,
    yearOffset: 60
});
$('#calendarsvml-end_date').MdPersianDateTimePicker({
    targetTextSelector: '#calendarsvml-end_date',
    isGregorian: false,
    yearOffset: 60
});
$('#calendarsvml-start_time, #calendarsvml-end_time').timeDropper({
    format: 'HH:mm:00',
    setCurrentTime: false,
    //autoswitch: true,
});
$(document).on('click', '[select-year-button]', function () {
    setTimeout(function () {
        var val1 = $('.select-year-box').css('height').replace('px', '');
        var val2 = $('.select-year-box table').css('height').replace('px', '');
        var val3 = (parseInt(val2) / 2) - (parseInt(val1) / 2);
        $('.select-year-box').scrollTop(val3);
    }, 200);
});
");
?>
<div class="calendars-form">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('calendars', 'Calendars') ?></h4>
            </div>
            <p><?= $model->title ?></p>
        </div>
        <div class="card-block">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'favcolor')->textInput(['maxlength' => true, 'type' => 'color']) ?>
                </div>
            </div>
            <?= $form->field($model, 'type_id')->dropDownList($model->list_type) ?>
            <?= $form->field($model, 'status_id')->dropDownList($model->list_status) ?>
            <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'start_date')->textInput(['readonly' => true, 'style' => 'direction: ltr !important;text-align: left;']) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'start_time')->textInput(['readonly' => true, 'style' => 'direction: ltr !important;text-align: left;']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'end_date')->textInput(['readonly' => true, 'style' => 'direction: ltr !important;text-align: left;']) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'end_time')->textInput(['readonly' => true, 'style' => 'direction: ltr !important;text-align: left;']) ?>
                </div>
            </div>
            <?= $form->field($model, 'time_id')->dropDownList($model->list_time) ?>
            <?= $form->field($model, 'period_id')->dropDownList($model->list_period) ?>
            <?= $form->field($model, 'alarm_type_id')->dropDownList($model->list_alarm_type) ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'file')->fileInput() ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
