<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\Mails */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="mails-form">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('correspondence', $model->type_id == 1 ? 'پیش نویس' : 'نامه') ?></h4>
            </div>
            <p><?= $this->title ?></p>
        </div>
        <div class="card-block">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-3">
                    <?= $form->field($model, 'pattern_id')->select2($model->list_pattern) ?>
                </div>
                <div class="col-3">
                    <?= $form->field($model, 'signatories')->select2($model->list_signatories, ['multiple' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <?= $form->field($model, 'receiver_type_id')->select2($model->list_receiver_type) ?>
                </div>
                <div class="col-3">
                    <?= $form->field($model, 'receiver1_id', ['options' => ['style' => 'display: ' . ($model->receiver_type_id == 1 ? 'block' : 'none')]])->select2($model->list_receiver1) ?>
                    <?= $form->field($model, 'receiver2_id', ['options' => ['style' => 'display: ' . ($model->receiver_type_id == 2 ? 'block' : 'none')]])->select2($model->list_receiver2) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <?= $form->field($model, 'copies1')->select2($model->list_copies, ['multiple' => true]) ?>
                </div>
                <div class="col-6">
                    <?= $form->field($model, 'copies2')->select2($model->list_copies, ['multiple' => true]) ?>
                </div>
            </div>
            <?= $form->field($model, 'text')->ckeditor() ?>
            <?= Html::a(Yii::t('app', 'Return'), ['ongoing', 'type_id' => $model->type_id], ['class' => 'btn btn-sm btn-warning']) ?>
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php
$this->registerJs("
$('#mailsvml-receiver_type_id').change(function () {
    console.log($(this).val());
    if ($(this).val() == 1) {
        $('.field-mailsvml-receiver1_id').show();
        $('.field-mailsvml-receiver2_id').hide();
    }
    else {
        $('.field-mailsvml-receiver1_id').hide();
        $('.field-mailsvml-receiver2_id').show();
    }
});
");
?>