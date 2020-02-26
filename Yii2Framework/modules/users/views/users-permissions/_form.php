<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersPermissions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-permissions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'module_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('users', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
