<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsPositionsListSkillsVML */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="organizations-positions-list-skills-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('organizations', 'Organizations Positions List Skills') ?></h4>
        </div>
        <p><?= Yii::t('app', $model->id ? 'Update' : 'Create') ?></p>
    </div>
    <div class="card-block">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'fieldConfig' => ['horizontalCssClasses' => ['label' => 'col-sm-3 control-label', 'wrapper' => 'col-sm-7',], 'labelOptions' => ['style' => 'text-align: left;font-weight: bold;']]]) ?>
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= Html::a(Yii::t('app', 'Return'), ['/organizations/organizations/view', 'id' => $model->organization_id], ['class' => 'btn btn-sm btn-warning']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>