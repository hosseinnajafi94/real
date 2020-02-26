<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
use app\config\widgets\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersSettings */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="users-settings-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
        <p></p>
    </div>
    <div class="card-block">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'section')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map($types,'id','title')) ?>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
