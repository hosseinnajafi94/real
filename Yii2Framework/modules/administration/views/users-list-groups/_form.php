<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\UsersListGroups */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="users-groups-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'admin_id')->dropDownList($users) ?>
                <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
</div>