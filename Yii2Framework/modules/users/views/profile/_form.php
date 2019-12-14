<?php
use yii\helpers\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $form \app\config\widgets\ActiveForm */
/* @var $model \app\modules\users\models\VML\UsersBanksVML */
?>
<div class="users-users-banks-form box">
    <?php $form = ActiveForm::begin() ?>
    <div class="box-header"><?= Yii::t('app', $model->id ? 'Update' : 'Create') ?></div>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <?= $form->field($model, 'bank_id')->dropDownList($model->banks) ?>
            <?= $form->field($model, 'card_number')->textInput(['maxlength' => true, 'dir' => 'ltr']) ?>
            <?= $form->field($model, 'account_number')->textInput(['maxlength' => true, 'dir' => 'ltr']) ?>
            <?= $form->field($model, 'shaba_number')->textInput(['maxlength' => true, 'dir' => 'ltr']) ?>
        </div>
    </div>
    <div class="box-footer">
        <?= Html::a(Yii::t('app', 'Return'), ['/users/users/view', 'id' => $model->model->user_id], ['class' => 'btn btn-sm btn-warning btn-return']) ?>
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-sm btn-success']) ?>
    </div>
    <?php ActiveForm::end()  ?>
</div>