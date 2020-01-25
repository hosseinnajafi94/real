<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\Settings */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('administration', 'Settings');
?>
<div class="administration-settings-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <?php $form        = ActiveForm::begin(); ?>
        <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'background')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'theme')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'enable_remember_me')->checkbox() ?>
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'upload_max_size')->textInput() ?>
        <?= $form->field($model, 'comment_restrict_editable')->textInput() ?>
        <?= $form->field($model, 'event_remain')->textInput() ?>
        <?= $form->field($model, 'notify_remain')->textInput() ?>
        <?= $form->field($model, 'session_remain')->textInput() ?>
        <?= $form->field($model, 'journal_remain')->textInput() ?>
        <?= $form->field($model, 'report_remain')->textInput() ?>
        <?= $form->field($model, 'restart_after')->textInput() ?>
        <?= $form->field($model, 'admin_email')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'smtp_server')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'smtp_port')->textInput() ?>
        <?= $form->field($model, 'security_type_id')->textInput() ?>
        <?= $form->field($model, 'smtp_email')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'smtp_user_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'smtp_password')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'replace_letter_id')->textInput() ?>
        <?= $form->field($model, 'language_id')->textInput() ?>
        <?= $form->field($model, 'rtl')->checkbox() ?>
        <?= $form->field($model, 'language_type_id')->textInput() ?>
        <?= $form->field($model, 'number_format_id')->textInput() ?>
        <?= $form->field($model, 'calendar_type_id')->textInput() ?>
        <?= $form->field($model, 'date_format_type_id')->textInput() ?>
        <?= $form->field($model, 'time_zone_id')->textInput() ?>
        <?= $form->field($model, 'first_day_in_week_id')->textInput() ?>
        <?= $form->field($model, 'daylight_state_id')->textInput() ?>
        <?= $form->field($model, 'dl_from_month_id')->textInput() ?>
        <?= $form->field($model, 'dl_from_day')->textInput() ?>
        <?= $form->field($model, 'dl_to_month')->textInput() ?>
        <?= $form->field($model, 'dl_to_day')->textInput() ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>