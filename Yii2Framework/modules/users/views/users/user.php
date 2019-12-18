<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\VML\UsersVML */
//$this->title = Yii::t('users', 'Update Users: {name}', [
//    'name' => $model->id,
//]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('users', 'Update');
?>
<div class="users-complete card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('users', 'Users') ?></h4>
        </div>
        <p><?= Yii::t('users', 'User') ?></p>
    </div>
    <div class="card-block">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'fieldConfig' => ['horizontalCssClasses' => ['label' => 'col-sm-4 control-label', 'wrapper' => 'col-sm-7',], 'labelOptions' => ['style' => 'text-align: left;font-weight: bold;']]]) ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'expiration')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: center;']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'language_id')->dropDownList($model->languages) ?>
            </div>
            <div class="col-md-6">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'calendar_type_id')->dropDownList($model->calendar_types) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'date_type_id')->dropDownList($model->date_types) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'first_day_in_week_id')->dropDownList($model->first_day_in_weeks) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'number_format_id')->dropDownList($model->number_formats) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'daylight_state_id')->dropDownList($model->daylight_states) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'timezone_id')->dropDownList($model->timezones) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'from_month_id')->dropDownList($model->from_monthes) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'from_day_id')->dropDownList($model->from_days) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'to_month_id')->dropDownList($model->to_monthes) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'to_day_id')->dropDownList($model->to_days) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'rtl')->checkbox() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="border p-2 mb-1">
            <?= $form->field($model, 'use_sip')->checkbox() ?>
            <div class="row">
                <div class="col-md-6">
                    <?=
                    $form->field($model, 'mode_use_sip_id', [
                        'options' => [
                            'class' => 'form-group row mb-0'
                        ]
                    ])->dropDownList($model->mode_use_sip)
                    ?>
                </div>
            </div>
        </div>
        <div class="border p-2">
            <?= $form->field($model, 'show_lang')->checkbox() ?>
            <small class="text-danger">با انتخاب این گزینه کلماتی که قابلیت ترجمه مجدد دارند بصورت مجزا نمایش داده می شوند.</small>
        </div>
        <br/>
        <?= Html::a(Yii::t('app', 'Return'), ['view', 'id' => $model->id], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
$this->registerJs("
$('#usersvml-expiration').MdPersianDateTimePicker({
    targetTextSelector: '#usersvml-expiration',
    isGregorian: false,
    yearOffset: 60
});
$(document).on('click', '[select-year-button]', function () {
    setTimeout(function () {
        var val1 = $('.select-year-box').css('height').replace('px', '');
        var val2 = $('.select-year-box table').css('height').replace('px', '');
        var val3 = (parseInt(val2) / 2) - (parseInt(val1) / 2);
        $('.select-year-box').scrollTop(val3);
    }, 200);
});
");
