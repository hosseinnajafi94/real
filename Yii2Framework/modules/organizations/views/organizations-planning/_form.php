<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsPlanningVML */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="organizations-planning-form">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('organizations', 'برنامه ریزی') ?></h4>
            </div>
            <p><?= Yii::t('app', $model->id ? 'Update' : 'Create') ?></p>
        </div>
        <div class="card-block">
            <?php $form = ActiveForm::begin() ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <?= $form->field($model, 'description')->ckeditor() ?>
            <?= Html::a(Yii::t('app', 'Return'), ['/organizations/organizations/view', 'id' => $model->organization_id], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>