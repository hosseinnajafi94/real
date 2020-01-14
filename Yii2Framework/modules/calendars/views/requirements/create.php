<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\modules\calendars\models\DAL\CalendarsListRequirements */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('notifications', 'Calendars List Requirements'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendars-list-requirements-create">
    <div class="calendars-list-requirements-form card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('app', 'Create') ?></h4>
            </div>
        </div>
        <div class="card-block">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= Html::a(Yii::t('app', 'Return'), ['/calendars/calendars/index'], ['class' => 'btn btn-sm mb-0 btn-warning']) ?>
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm mb-0 btn-success']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>