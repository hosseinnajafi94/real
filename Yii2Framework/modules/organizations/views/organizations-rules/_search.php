<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsRulesSearchVML */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organizations-rules-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'org_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'descriptions') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('organizations', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('organizations', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
