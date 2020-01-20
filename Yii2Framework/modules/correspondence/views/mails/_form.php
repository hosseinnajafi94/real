<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\Mails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <?= $form->field($model, 'secretariat_id')->textInput() ?>

    <?= $form->field($model, 'pattern_id')->textInput() ?>

    <?= $form->field($model, 'receiver_type_id')->textInput() ?>

    <?= $form->field($model, 'receiver1_id')->textInput() ?>

    <?= $form->field($model, 'receiver2_id')->textInput() ?>

    <?= $form->field($model, 'status_id')->textInput() ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'section_1')->textInput() ?>

    <?= $form->field($model, 'section_2')->textInput() ?>

    <?= $form->field($model, 'section_3')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('correspondence', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
