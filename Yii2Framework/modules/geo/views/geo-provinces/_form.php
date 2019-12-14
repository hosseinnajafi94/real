<?php
use yii\helpers\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $form \app\config\widgets\ActiveForm */
/* @var $model \app\modules\geo\models\VML\GeoProvincesVML */
?>
<div class="geo-geo-provinces-form box">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-header"><?= Yii::t('app', $model->id ? 'Update' : 'Create') ?></div>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="box-footer">
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning btn-return']) ?>
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-sm btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>