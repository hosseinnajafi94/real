<?php
use yii\helpers\Html;
use app\config\widgets\ActiveForm;
use app\config\widgets\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\Geoip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="geoip-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">

        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'country_id')->select2(ArrayHelper::map($country, 'id', 'title')) ?>
            </div>
            <div class="col"></div>
        </div>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>

        <?php ActiveForm::end(); ?>

    </div>
</div>
