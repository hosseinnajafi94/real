<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\VML\MailsSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'secretariat_id') ?>

    <?= $form->field($model, 'pattern_id') ?>

    <?php // echo $form->field($model, 'receiver_type_id') ?>

    <?php // echo $form->field($model, 'receiver1_id') ?>

    <?php // echo $form->field($model, 'receiver2_id') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'section_1') ?>

    <?php // echo $form->field($model, 'section_2') ?>

    <?php // echo $form->field($model, 'section_3') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('correspondence', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('correspondence', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
