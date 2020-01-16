<?php
use yii\helpers\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersDescriptions */
/* @var $form yii\widgets\ActiveForm */
$title = 'اداری';
if ($model->type_id == 2) {
    $title = 'محرمانه';
}
elseif ($model->type_id == 3) {
    $title = 'خیلی محرمانه';
}
?>
<div class="users-users-descriptions-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('users', 'توضیحات ' . $title) ?></h4>
        </div>
        <p><?= $this->title ?></p>
    </div>
    <div class="card-block">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'descriptions')->ckeditor()->label(false) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['/users/users/view', 'id' => $model->user_id], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>