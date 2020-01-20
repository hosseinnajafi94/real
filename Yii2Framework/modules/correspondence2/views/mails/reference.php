<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\Mails */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="mails-form">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('correspondence', 'ارجاع') ?></h4>
            </div>
        </div>
        <div class="card-block">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-3">
                    <?= $form->field($model, 'user_id')->select2($model->list_users) ?>
                </div>
            </div>
            <?= $form->field($model, 'description')->ckeditor() ?>
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>