<?php
use yii\helpers\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $form \app\config\widgets\ActiveForm */
/* @var $model \app\modules\users\models\VML\UsersVML */
?>
<div class="users-users-form box">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-header"><?= Yii::t('app', $model->id ? 'Update' : 'Create') ?></div>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'dir' => 'ltr']) ?>
            <?= $form->field($model, 'cardmelli')->fileInput() ?>
            <?= $form->field($model, 'avatar')->fileInput() ?>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <?= $form->field($model, 'codemelli')->textInput(['maxlength' => true, 'dir' => 'ltr']) ?>
            <?= $form->field($model, 'mobile')->textInput(['maxlength' => true, 'dir' => 'ltr']) ?>
            <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true, 'dir' => 'ltr']) ?>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <?= $form->field($model, 'province_id')->dropDownList($model->provinces) ?>
            <?= $form->field($model, 'city_id')->dropDownList($model->cities) ?>
            <?= $form->field($model, 'codeposti')->textInput(['maxlength' => true, 'dir' => 'ltr']) ?>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="box-footer">
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning btn-return']) ?>
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-sm btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>