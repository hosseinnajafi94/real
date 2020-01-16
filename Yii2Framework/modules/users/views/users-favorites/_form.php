<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersFavorites */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="users-users-favorites-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('users', 'علایق') ?></h4>
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
                <?= $form->field($model, 'type_id')->dropDownList([]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'times')->textInput() ?>
            </div>
        </div>
        <?= $form->field($model, 'description', [
            'horizontalCssClasses' => [
                'label'   => 'col-sm-2 control-label',
                'wrapper' => 'col-sm-10',
            ],
        ])->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'professional')->checkbox() ?>
        <?= Html::a(Yii::t('app', 'Return'), ['/users/users/view', 'id' => $model->user_id], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>