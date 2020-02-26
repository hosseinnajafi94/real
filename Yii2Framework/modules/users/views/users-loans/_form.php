<?php
use yii\bootstrap4\Html;
use app\config\widgets\ArrayHelper;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersLoans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-loans-form card">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
        <p></p>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map($types, 'id', 'title')) ?>
            </div>
            <div class="col"></div>
        </div>   
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'position_id')->dropDownList(ArrayHelper::map($positions, 'id', 'name')) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map($groups, 'id', 'title')) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map($users, 'id', 'fname')) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'loan_type_id')->dropDownList(ArrayHelper::map($loan_types, 'id', 'title')) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'date_request')->textInput() ?>
                <?= $form->field($model, 'date_start')->textInput() ?>
                <?= $form->field($model, 'date_end')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'istallments')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'form_id')->dropDownList(ArrayHelper::map([], 'id', 'name')) ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
