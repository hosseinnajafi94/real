<?php
use yii\helpers\Html;
use app\config\widgets\ActiveForm;
/* @var $this \yii\web\View */
/* @var $form \app\config\widgets\ActiveForm */
/* @var $model \app\modules\users\models\VML\AddmoneyVML */
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('users', 'افزایش موجودی کیف پول');
?>
<div class="profile-change-password box">
    <?php $form = ActiveForm::begin() ?>
    <div class="box-header"><?= Yii::t('users', 'افزایش موجودی کیف پول') ?></div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <?= $form->field($model, 'amount')->textInput(['dir' => 'ltr']) ?>
        </div>
    </div>
    <div class="box-footer">
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-sm btn-success']) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>