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
        <?php
        $form        = ActiveForm::begin([
                    'layout'      => 'horizontal',
                    'fieldConfig' => [
                        'template'             => "{label}\n{beginWrapper}\n{input}{endWrapper}\n{hint}\n{error}\n",
                        'horizontalCssClasses' => [
                            'label'   => 'col-sm-4 control-label',
                            'wrapper' => 'col-sm-4',
                            'hint'    => 'col-sm-4',
                        ],
                        'labelOptions'         => [
                            'style' => 'text-align: left;font-weight: bold;'
                        ]
                    ],
        ]);
        ?>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'logo')->fileInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'background')->fileInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'theme')->select2([]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'enable_remember_me')->checkbox() ?>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col">
                <p class="mb-1">دانلود فایل های بیش از اندازه بزرگ، امکان اتلاف منابع سرور را در بر دارد.</p>
                <?= $form->field($model, 'upload_max_size')->textInput(['type' => 'number']) ?>
            </div>
            <div class="col">
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col">
                <p class="mb-1">در تیم‌یار محدودیت زمانی برای ویرایش کامنت ها از لحظه ایجاد آن ها وجود دارد. این محدودیت به شما این امکان را می دهد تا بحث ها و توضیحات مربوط به یک تسک، مشکلات و عناوین تالارهای گفتگو را بعد از گذشت مدت زمان مشخص غیر قابل تغییر کنید. شما می توانید تعداد روزهایی که کاربران می توانند متن کامنت های خود را ویرایش کنند را مشخص کنید.</p>
                <?= $form->field($model, 'comment_restrict_editable')->textInput(['type' => 'number']) ?>
            </div>
            <div class="col">
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'event_remain')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'notify_remain')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'session_remain')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'journal_remain')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'report_remain')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'restart_after')->textInput() ?>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'smtp_server')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'smtp_port')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'smtp_user_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'smtp_password')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'smtp_email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'admin_email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'security_type_id')->textInput() ?>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'replace_letter_id')->textInput() ?>
            </div>
            <div class="col">
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'language_id')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'rtl')->checkbox() ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'language_type_id')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'number_format_id')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'calendar_type_id')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'date_format_type_id')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'time_zone_id')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'first_day_in_week_id')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'daylight_state_id')->textInput() ?>
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'dl_from_month_id')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'dl_from_day')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'dl_to_month')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'dl_to_day')->textInput() ?>
            </div>
        </div>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>