<?php

use app\assets\AdminAsset;
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\calendars\models\VML\ImportVML */
/* @var $form ActiveForm */
?>
<div class="calendars-import">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('calendars', 'Calendars') ?></h4>
            </div>
            <p><?= 'درون ریزی' ?></p>
        </div>
        <div class="card-block">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'file')->fileInput() ?>
            <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm mb-0 btn-warning']) ?>
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm mb-0 btn-success']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
