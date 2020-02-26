<?php

use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\SysModulesSettings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sys-modules-settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <?= $form->field($model, 'week_id')->textInput() ?>

    <?= $form->field($model, 'day')->textInput() ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'auto_update')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('administration', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
