<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\accounting\models\DAL\AccountingListSymbols */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="accounting-accounting-list-symbols-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <?php
        $form = ActiveForm::begin([
            'layout'      => 'horizontal',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label'   => 'col-4',
                    'wrapper' => 'col-8',
                ],
            ],
        ]);
        ?>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'short_title')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'code_id')->dropDownList([]) ?>
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'decimal_count')->dropDownList(range(0, 5)) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'fee_decimal_count')->dropDownList(range(0, 5)) ?>
            </div>
        </div>
        <?= $form->field($model, 'descriptions', [
            'horizontalCssClasses' => [
                'label'   => 'col-2',
                'wrapper' => 'col-10',
            ]
        ])->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'is_active')->checkbox() ?>
        <?= $form->field($model, 'auto_update')->checkbox() ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>