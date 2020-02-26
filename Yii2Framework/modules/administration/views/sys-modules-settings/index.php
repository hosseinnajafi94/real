<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\SysModulesSettings */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('administration', 'Update');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('administration', 'Sys Modules Settings'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sys-modules-settings-update">
    <div class="sys-modules-settings-form">
        <div class="row">
            <div class="col">
                <?php $form        = ActiveForm::begin(); ?>
                <?= $form->field($model, 'type_id')->textInput() ?>
                <?= $form->field($model, 'week_id')->textInput() ?>
                <?= $form->field($model, 'day')->textInput() ?>
                <?= $form->field($model, 'time')->textInput() ?>
                <?= $form->field($model, 'auto_update')->checkbox() ?>
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
</div>