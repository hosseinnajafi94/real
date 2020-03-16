<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\Settings */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('administration', 'Security');
?>
<div class="administration-settings-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <div class="alert alert-warning">
            <h4> TLS گواهی نامه دیجیتالی</h4>
            <p>امضا شده توسط : 	Certum Domain Validation CA SHA2</p>
            <p>نام متداول : 	*.2404.ir</p>
            <p>دارای اعتبار از : 	۱۰:۰۱ ۱۳۹۸/۱۱/۳۰</p>
            <p>دارای اعتبار تا : 	۱۶:۰۸ ۱۳۹۹/۱۱/۲۸</p>
        </div>
        <?php $form = ActiveForm::begin() ?>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'max_session_count')->textInput() ?>
                <?= $form->field($model, 'session_bind_ip')->checkbox() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'try_login_count')->textInput() ?>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'password_control_time')->checkbox() ?>
                <?= $form->field($model, 'password_valid_time')->textInput()?>
                <?= $form->field($model, 'min_char_pass1')->textInput()?>
                <?= $form->field($model, 'min_char_pass2')->textInput()?>
                <?= $form->field($model, 'min_char_pass3')->textInput()?>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                 <?= $form->field($model, 'auth_ads_use')->checkbox()?>
                <?= $form->field($model, 'server_domain')->textInput()?>
                <?= $form->field($model, 'machine_name')->textInput()?>
            </div>
            <div class="col">
                <?= $form->field($model, 'users_domain')->textInput()?>
                <?= $form->field($model, 'auth_ssl_ldap')->checkbox()?>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'use_x_real_ip')->checkbox()?>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'google_docs')->checkbox()?>
                <?= $form->field($model, 'custom_office_server')->checkbox()?>
            </div>
            <div class="col">
                <?= $form->field($model, 'microsoft_web_apps')->checkbox()?>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'enable_antivirus')->checkbox()?>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>