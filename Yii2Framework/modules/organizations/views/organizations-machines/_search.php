<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsMachinesSearchVML */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organizations-machines-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'org_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'machine_id') ?>

    <?= $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'port') ?>

    <?php // echo $form->field($model, 'calendar_type_id') ?>

    <?php // echo $form->field($model, 'timezone_id') ?>

    <?php // echo $form->field($model, 'model_id') ?>

    <?php // echo $form->field($model, 'daylight_id') ?>

    <?php // echo $form->field($model, 'form_month_id') ?>

    <?php // echo $form->field($model, 'form_day_id') ?>

    <?php // echo $form->field($model, 'to_month_id') ?>

    <?php // echo $form->field($model, 'to_day_id') ?>

    <?php // echo $form->field($model, 'enable_cal_login')->checkbox() ?>

    <?php // echo $form->field($model, 'default_type_sync')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('organizations', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('organizations', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
