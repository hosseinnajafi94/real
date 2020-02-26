<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
use app\config\widgets\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsMachines */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="organizations-machines-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
        <p></p>
    </div>
    <div class="card-block">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'org_id')->DropDownList(ArrayHelper::map($organizations, 'id', 'name')) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'model_id')->dropDownList(ArrayHelper::map($models, 'id', 'title')) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'machine_id')->textInput() ?>

            </div>
            <div class="col">
                <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'port')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'calendar_type_id')->dropDownList(ArrayHelper::map($calendarTypes, 'id', 'title')) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'timezone_id')->dropDownList(ArrayHelper::map($timezones, 'id', 'title')) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'daylight_id')->dropDownList(ArrayHelper::map($daylights, 'id', 'title')) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'form_month_id')->dropDownList(ArrayHelper::map($months, 'id', 'title')) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'form_day_id')->dropDownList(ArrayHelper::map($monthdays, 'id', 'title')) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'to_month_id')->dropDownList(ArrayHelper::map($months, 'id', 'title')) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'to_day_id')->dropDownList(ArrayHelper::map($monthdays, 'id', 'title')) ?>
            </div>
        </div>
        <?= $form->field($model, 'enable_cal_login')->checkbox() ?>

        <?= $form->field($model, 'default_type_sync')->checkbox() ?>

        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>

        <?php ActiveForm::end(); ?>

    </div>
</div>
