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
        <p><?= Yii::t('users', 'Complete') ?></p>
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
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'place_of_issue')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'insurance_no')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'mother_birth_place')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'father_birth_place')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'mother_first_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'prev_last_name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'mother_last_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'passport_no')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'info_work_place')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'start_date')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: center;']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'emergency_phone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'call_receiver')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'physical_cond_id')->dropDownList($model->physical_conds) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'physical_desc')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'nationality')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'issuance_date')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: center;']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'personnel_share_id')->dropDownList($model->personnel_shares) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'insurance_type_id')->dropDownList($model->insurance_types) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'employment_type_id')->dropDownList($model->employment_types) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'contract_type_id')->dropDownList($model->contract_types) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'insurance_start_date')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: center;']) ?>
            </div>
            <div class="col-md-6">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'has_machin_id')->dropDownList($model->has_machins) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'is_owner_id')->dropDownList($model->is_owners) ?>
            </div>
        </div>
        
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
$this->registerJs("
$('#usersvml-start_date').MdPersianDateTimePicker({
    targetTextSelector: '#usersvml-start_date',
    isGregorian: false,
    yearOffset: 60
});
$('#usersvml-issuance_date').MdPersianDateTimePicker({
    targetTextSelector: '#usersvml-issuance_date',
    isGregorian: false,
    yearOffset: 60
});
$('#usersvml-insurance_start_date').MdPersianDateTimePicker({
    targetTextSelector: '#usersvml-insurance_start_date',
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