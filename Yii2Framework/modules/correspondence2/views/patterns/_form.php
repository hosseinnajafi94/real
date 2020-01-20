<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\MailsListPatterns */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patterns-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('correspondence', 'Patterns') ?></h4>
        </div>
    </div>
    <div class="card-block">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-3">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'size_id')->dropDownList($model->list_size) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'sign_count')->textInput() ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'file')->fileInput() ?>
            </div>
        </div>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm mb-0 btn-success']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
