<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\VML\UsersVML */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="users-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('users', 'Users') ?></h4>
        </div>
        <p><?= Yii::t('app', $model->id ? 'Update' : 'Create') ?></p>
    </div>
    <div class="card-block">
        <?php
        $form = ActiveForm::begin([
            'layout'      => 'horizontal',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label'   => 'col-sm-4 control-label',
                    'wrapper' => 'col-sm-7',
                ],
                'labelOptions'         => [
                    'style' => 'text-align: left;font-weight: bold;'
                ]
            ],
        ]);
        ?>
        <?php // $form->field($model, 'group_id')->textInput() ?>
        <?php // $form->field($model, 'status_id')->textInput() ?>
        <?php // $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        <?php // $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>
        <?php // $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>
        <?php // $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'organization_id')->dropDownList($model->organizations) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'card_num')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'codemelli')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'birthplace_province_id')->dropDownList($model->birthplace_provinces) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'birthplace_city_id')->dropDownList($model->birthplace_cities) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'birthday')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: center;']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'marital_status_id')->dropDownList($model->marital_statuses) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'religion')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'military_service_status_id')->dropDownList($model->military_service_statuses) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'gender_id')->dropDownList($model->genders) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'employment_status_id')->dropDownList($model->employment_statuses) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'requested_salary')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'total_work_history')->textInput() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'account_number')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'account_type_id')->dropDownList($model->account_types) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'type_id')->dropDownList($model->types) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'date_start')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: center;']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'force_rollcall')->checkbox() ?>
            </div>
        </div>
        <?= $form->field($model, 'head_line', [
            'horizontalCssClasses' => [
                'label'   => 'col-sm-12 control-label',
                'wrapper' => 'col-sm-12',
            ],
            'labelOptions'         => [
                'style' => 'text-align: right;font-weight: bold;'
            ]
        ])->textarea(['rows' => 3]) ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'province_id')->dropDownList($model->provinces) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'city_id')->dropDownList($model->cities) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'telegram')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <?= $form->field($model, 'address', [
            'horizontalCssClasses' => [
                'label'   => 'col-sm-12 control-label',
                'wrapper' => 'col-sm-12',
            ],
            'labelOptions'         => [
                'style' => 'text-align: right;font-weight: bold;'
            ]
        ])->textarea(['rows' => 3]) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php
$this->registerJs("
$('#usersvml-birthday').MdPersianDateTimePicker({
    targetTextSelector: '#usersvml-birthday',
    isGregorian: false,
    yearOffset: 60
});
$('#usersvml-date_start').MdPersianDateTimePicker({
    targetTextSelector: '#usersvml-date_start',
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