<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
use app\config\widgets\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsRules */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="organizations-rules-form card">
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
                <?= $form->field($model, 'org_id')->dropDownList(ArrayHelper::map($orgs,'id','name')) ?>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map($types,'id','title')) ?>

                <?= $form->field($model, 'descriptions')->ckeditor() ?>
            </div>
            <div class="col"></div>
        </div>
        <?= Html::a(Yii::t('app', 'Return'),['index'], ['class' => 'btn btn-sm btn-warning']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
        <?php ActiveForm::end(); ?>

    </div>
</div>
