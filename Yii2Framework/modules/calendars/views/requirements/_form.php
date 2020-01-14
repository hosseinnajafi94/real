<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\calendars\models\DAL\CalendarsListRequirements */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="calendars-list-requirements-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm mb-0 btn-success']) ?>
    <?php ActiveForm::end(); ?>
</div>