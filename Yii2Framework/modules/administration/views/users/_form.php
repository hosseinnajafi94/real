<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\Users */
/* @var $form app\config\widgets\ActiveForm */
?>
<div class="users-groups-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'codemelli')->textInput(['maxlength' => true, 'style' => 'direction: ltr !important;']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'birthday')->textInput(['maxlength' => true, 'style' => 'direction: ltr !important;']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'gender_id')->dropDownList($items['gender_id']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'status_id')->dropDownList($items['status_id']) ?>
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'nationality')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'province_id')->dropDownList($items['province_id']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'city_id')->dropDownList($items['city_id']) ?>
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'mobile')->textInput(['maxlength' => true, 'style' => 'direction: ltr !important;']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'style' => 'direction: ltr !important;']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'style' => 'direction: ltr !important;']) ?>
            </div>
            <div class="col">
            </div>
        </div>
        <hr/>
        <?= $form->field($model, 'rtl')->checkbox() ?>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'language_id')->dropDownList($items['language_id']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'calendar_type_id')->dropDownList($items['calendar_type_id']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'date_type_id')->dropDownList($items['date_type_id']) ?>
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'first_day_in_week_id')->dropDownList($items['first_day_in_week_id']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'number_format_id')->dropDownList($items['number_format_id']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'timezone_id')->dropDownList($items['timezone_id']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'daylight_state_id')->dropDownList($items['daylight_state_id']) ?>
                <?php
                $id = Html::getInputId($model, 'daylight_state_id');
                $this->registerJs("
                    $(document).on('change', '#$id', function () {
                        var val = $(this).val();
                        $('#daylight_state_id').addClass('d-none');
                        if (val == 3) {
                            $('#daylight_state_id').removeClass('d-none');
                        }
                    });
                ");
                ?>
            </div>
        </div>
        <div id="daylight_state_id" class="row <?= ($model->daylight_state_id == 3 ? '' : 'd-none') ?>">
            <div class="col">
                <?= $form->field($model, 'from_month_id')->dropDownList($items['from_month_id']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'from_day_id')->dropDownList($items['from_day_id']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'to_month_id')->dropDownList($items['to_month_id']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'to_day_id')->dropDownList($items['to_day_id']) ?>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'use_sip')->checkbox() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'mode_use_sip_id')->dropDownList($items['mode_use_sip_id']) ?>
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
        </div>
        <hr/>
        <?= $form->field($model, 'show_lang')->checkbox() ?>
        <p>با انتخاب این گزینه کلماتی که قابلیت ترجمه مجدد دارند بصورت مجزا نمایش داده می شوند</p>
        <hr/>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'style' => 'direction: ltr !important;']) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true, 'style' => 'direction: ltr !important;']) ?>
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
        </div>
        <hr/>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>