<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\SecretariatsPatterns */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="correspondence-secretariats-patterns-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('correspondence', 'Secretariats Patterns') ?></h4>
        </div>
        <p><?= $this->title ?></p>
    </div>
    <div class="card-block">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'secretariat_id')->dropDownList([]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'size_id')->dropDownList([]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'sign_count')->textInput(['style' => 'direction: ltr !important;text-align: left;']) ?>
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'file')->fileInput() ?>
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
        </div>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>