<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersResume */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-users-resume-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('users', 'سوابق کاری') ?></h4>
        </div>
        <p><?= $this->title ?></p>
    </div>
    <div class="card-block">
        <?php
        $form = ActiveForm::begin([
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
        ]);
        ?>

        <div class="row">
            <div class="col">
                <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'type_id')->dropDownList([]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'job')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'termination')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'start_date')->textInput(['style' => 'direction: ltr;text-align: left;', 'readonly' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'end_date')->textInput(['style' => 'direction: ltr;text-align: left;', 'readonly' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'salary')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'insurance')->checkbox() ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'style' => 'direction: ltr;text-align: left;']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'points')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
            </div>
        </div>
        <?= $form->field($model, 'address', [
            'horizontalCssClasses' => [
                'label'   => 'col-sm-2 control-label',
                'wrapper' => 'col-sm-10',
            ],
        ])->textInput(['maxlength' => true]) ?>

        <?= Html::a(Yii::t('app', 'Return'), ['/users/users/view', 'id' => $model->user_id], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
