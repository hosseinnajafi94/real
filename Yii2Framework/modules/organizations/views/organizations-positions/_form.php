<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsPositionsVML */
/* @var $form app\config\widgets\ActiveForm */
?>
<div class="organizations-positions-form">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('organizations', 'Organizations Positions') ?></h4>
            </div>
            <p><?= Yii::t('app', $model->id ? 'Update' : 'Create') ?></p>
        </div>
        <div class="card-block">
            <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'fieldConfig' => ['horizontalCssClasses' => ['label' => 'col-sm-3 control-label', 'wrapper' => 'col-sm-7'], 'labelOptions' => ['style' => 'text-align: left;font-weight: bold;']]]) ?>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#page1">شرح وظایف اصلی</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page2">شرح وظایف فرعی</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page3">شرایط احراز</a></li>
            </ul>
            <div class="tab-content px-1">
                <div class="tab-pane active show" id="page1">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'persons')->textInput() ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'job_code')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'hiring_enable')->checkbox() ?>
                        </div>
                    </div>
                    <?= $form->field($model, 'description', ['horizontalCssClasses' => ['label' => 'col-sm-12 control-label', 'wrapper' => 'col-sm-12'], 'labelOptions' => ['style' => 'text-align: right;font-weight: bold;']])->ckeditor() ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'form_id')->dropDownList($model->forms) ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="page2">
                    <?= $form->field($model, 'extra_description', ['horizontalCssClasses' => ['label' => 'col-sm-12 control-label', 'wrapper' => 'col-sm-12'], 'labelOptions' => ['style' => 'text-align: right;font-weight: bold;']])->ckeditor() ?>
                </div>
                <div class="tab-pane" id="page3">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'degree_id')->dropDownList($model->degrees) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'experience')->textInput() ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'gender_id')->dropDownList($model->genders) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'resume_deadline')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: center;']) ?>
                        </div>
                    </div>
                    <?= $form->field($model, 'skills', ['horizontalCssClasses' => ['label' => 'col-sm-12 control-label', 'wrapper' => 'col-sm-12'], 'labelOptions' => ['style' => 'text-align: right;font-weight: bold;']])->ckeditor() ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'position_skills', ['horizontalCssClasses' => ['label' => 'col-sm-4 control-label', 'wrapper' => 'col-sm-8'], 'labelOptions' => ['style' => 'text-align: left;font-weight: bold;']])->checkboxList($model->list_skills, ['style' => 'max-height: 200px;overflow-x: hidden;overflow-y: auto;']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'view_in_portal', ['horizontalCssClasses' => ['label' => 'col-sm-4 control-label', 'wrapper' => 'col-sm-8'], 'labelOptions' => ['style' => 'text-align: left;font-weight: bold;']])->checkboxList($model->list_columns, ['style' => 'max-height: 200px;overflow-x: hidden;overflow-y: auto;']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <?= Html::a(Yii::t('app', 'Return'), ['/organizations/organizations/view', 'id' => $model->organization_id], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php
$this->registerJs("
$('#organizationspositionsvml-resume_deadline').MdPersianDateTimePicker({
    targetTextSelector: '#organizationspositionsvml-resume_deadline',
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