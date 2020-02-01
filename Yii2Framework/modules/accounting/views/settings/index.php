<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
$this->title = Yii::t('accounting', 'Settings');
?>
<div class="accounting-settings-index card">
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
                <?php // $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
            </div>
        </div>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>