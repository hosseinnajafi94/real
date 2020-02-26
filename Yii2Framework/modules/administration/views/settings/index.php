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
        <?php $form = ActiveForm::begin() ?>
        <fieldset>
            <legend>تنظیمات صفحه ورود</legend>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'logo')->fileInput(['onchange' => "preview(this, 'preview_logo')"]) ?>
                    <div id="preview_logo">
                        <img style="max-width: 100%;max-height: 150px;" src="<?= Yii::getAlias('@web/uploads/settings/logo/' . $model->logo) ?>"/>
                    </div>
                </div>
                <div class="col">
                    <?= $form->field($model, 'background')->fileInput(['onchange' => "preview(this, 'preview_background')"]) ?>
                    <div id="preview_background">
                        <img style="max-width: 100%;max-height: 150px;" src="<?= Yii::getAlias('@web/uploads/settings/background/' . $model->background) ?>"/>
                    </div>
                </div>
                <div class="col">
                    <?= $form->field($model, 'theme')->select2(['light' => 'روشن', 'dark' => 'تیره']) ?>
                </div>
                <div class="col">
                    <div class="mb-4"></div>
                    <?= $form->field($model, 'enable_remember_me')->checkbox() ?>
                </div>
            </div>
        </fieldset>
        <hr/>
        <fieldset>
            <legend>تنظیم سر تیتر</legend>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
        </fieldset>
        <hr/>
        <fieldset>
            <legend>دانلود فایل و پیوست</legend>
            <p class="mb-1">دانلود فایل های بیش از اندازه بزرگ، امکان اتلاف منابع سرور را در بر دارد.</p>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'upload_max_size')->textInput() ?>
                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
        </fieldset>
        <hr/>
        <fieldset>
            <legend>ویرایش نظرات</legend>
            <p class="mb-1">
                محدودیت زمانی برای ویرایش کامنت ها از لحظه ایجاد آن ها وجود دارد.
                این محدودیت به شما این امکان را می دهد تا بحث ها و توضیحات مربوط به یک تسک،
                مشکلات و عناوین تالارهای گفتگو را بعد از گذشت مدت زمان مشخص غیر قابل تغییر کنید.
                شما می توانید تعداد روزهایی که کاربران می توانند متن کامنت های خود را ویرایش کنند را مشخص کنید.
            </p>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'comment_restrict_editable')->textInput() ?>
                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
        </fieldset>
        <hr/>
        <fieldset>
            <legend>تنظیمات زمان</legend>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'event_remain')->textInput() ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'notify_remain')->textInput() ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'session_remain')->textInput() ?>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'journal_remain')->textInput() ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'report_remain')->textInput() ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'restart_after')->textInput() ?>
                </div>
                <div class="col"></div>
            </div>
        </fieldset>
        <hr/>
        <fieldset>
            <legend>تنظیمات ارسال پست الکترونیکی</legend>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'admin_email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col">
                </div>
                <div class="col">
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'smtp_server')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'smtp_port')->textInput() ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'security_type_id')->select2($list['security_type_id']) ?>
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'smtp_user_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'smtp_password')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'smtp_email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col">
                </div>
            </div>
        </fieldset>
        <hr/>
        <fieldset>
            <legend>جایگزینی</legend>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'replace_letter_id')->select2($list['replace_letter_id']) ?>
                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
        </fieldset>
        <hr/>
        <fieldset>
            <legend>تنظیمات منطقه ای</legend>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'language_id')->select2($list['language_id']) ?>
                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
            <?= $form->field($model, 'rtl')->checkbox() ?>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'language_type_id')->select2($list['language_type_id']) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'number_format_id')->select2($list['number_format_id']) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'calendar_type_id')->select2($list['calendar_type_id']) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'date_format_type_id')->select2($list['date_format_type_id']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'time_zone_id')->select2($list['time_zone_id']) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'first_day_in_week_id')->select2($list['first_day_in_week_id']) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'daylight_state_id')->select2($list['daylight_state_id']) ?>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'dl_from_month_id')->select2($list['dl_from_month_id']) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'dl_from_day_id')->select2($list['dl_from_day_id']) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'dl_to_month_id')->select2($list['dl_from_month_id']) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'dl_to_day_id')->select2($list['dl_from_day_id']) ?>
                </div>
            </div>
        </fieldset>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php

$this->registerCss("
.select2-container--krajee-bs4[dir='rtl'] .select2-selection--single .select2-selection__arrow {
    height: 97%;
}
.select2-container--krajee-bs4[dir='rtl'] .select2-selection--single {
    padding: 0.1rem 0.5rem;
    height: auto;
}
");