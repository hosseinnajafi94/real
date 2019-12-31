<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\calendars\models\VML\CalendarsVML */

//$this->title = Yii::t('calendars', 'Update Calendars: {name}', [
//    'name' => $model->title,
//]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('calendars', 'Calendars'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('calendars', 'Update');
?>
<div class="calendars-update">
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
                    <?= $form->field($model, 'start_date')->textInput() ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'start_time')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'end_date')->textInput() ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'end_time')->textInput() ?>
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