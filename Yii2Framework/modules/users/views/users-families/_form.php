<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersFamilies */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="users-users-families-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('users', 'خانوار') ?></h4>
        </div>
        <p><?= $this->title ?></p>
    </div>
    <div class="card-block">
        <?php $form = ActiveForm::begin([
            'layout'      => 'horizontal',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label'   => 'col-sm-4 control-label',
                    'wrapper' => 'col-sm-8',
                ],
                'labelOptions'         => [
                    'style' => 'text-align: left;font-weight: bold;'
                ]
            ],
        ]); ?>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'nationalcode')->textInput(['maxlength' => true, 'style' => 'direction: ltr;text-align: left;']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'gender_id')->dropDownList([]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'birthday')->textInput(['class' => 'form-control form-control-sm datepicker', 'style' => 'direction: ltr;text-align: left;', 'readonly' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'birthplace')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'ratio_id')->dropDownList([]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'degree_id')->dropDownList([]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'job')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'style' => 'direction: ltr;text-align: left;']) ?>
            </div>
            <div class="col-8">
                <?= $form->field($model, 'address', [
                    'horizontalCssClasses' => [
                        'label'   => 'col-sm-2 control-label',
                        'wrapper' => 'col-sm-10',
                    ],
                ])->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <?= $form->field($model, 'under_assignment')->checkbox() ?>
        <?= Html::a(Yii::t('app', 'Return'), ['/users/users/view', 'id' => $model->user_id], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>