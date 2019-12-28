<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsUnitsVML */
/* @var $form app\config\widgets\ActiveForm */
?>
<div class="organizations-units-form">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('organizations', 'Organizations Units') ?></h4>
            </div>
            <p><?= Yii::t('app', $model->id ? 'Update' : 'Create') ?></p>
        </div>
        <div class="card-block">
            <?php $form = ActiveForm::begin([
                'layout'      => 'horizontal',
                'fieldConfig' => [
                    'horizontalCssClasses' => [
                        'label'   => 'col-sm-3 control-label',
                        'wrapper' => 'col-sm-7',
                    ],
                    'labelOptions' => [
                        'style' => 'text-align: left;font-weight: bold;'
                    ]
                ],
            ]); ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'manager_id')->dropDownList($model->managers) ?>
            <?= $form->field($model, 'province_id')->dropDownList($model->provinces) ?>
            <?= $form->field($model, 'city_id')->dropDownList($model->cities) ?>
            <?= $form->field($model, 'positions')->select2($model->list_positions, ['multiple' => true]) ?>
            <?= $form->field($model, 'work_place_status_id')->dropDownList($model->workplacestatuses) ?>
            <?= $form->field($model, 'ws_code')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'tfn')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'insurance_acc_id')->dropDownList($model->insuranceaccs) ?>
            <?= $form->field($model, 'tax_acc_id')->dropDownList($model->taxaccs) ?>
            <?= $form->field($model, 'darsad1')->textInput() ?>
            <?= $form->field($model, 'darsad2')->textInput() ?>
            <?= $form->field($model, 'unit_description')->textarea(['rows' => 6]) ?>
            <?= Html::a(Yii::t('app', 'Return'), ['/organizations/organizations/view', 'id' => $model->organization_id], ['class' => 'btn btn-sm btn-warning']) ?>
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>