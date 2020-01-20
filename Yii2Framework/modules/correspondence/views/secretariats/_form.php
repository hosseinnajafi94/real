<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\Secretariats */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="correspondence-secretariats-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('correspondence', 'Secretariats') ?></h4>
        </div>
        <p><?= $this->title ?></p>
    </div>
    <div class="card-block">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'section_1')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'splitter_1')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'section_2')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'splitter_2')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>