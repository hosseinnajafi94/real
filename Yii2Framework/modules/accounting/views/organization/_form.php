<?php
use yii\bootstrap4\Html;
use app\assets\AdminAsset;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsListYears */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="accounting-organizations-form card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">دوره مالی</h4>
        </div>
        <p><?= $this->title ?></p>
    </div>
    <div class="card-block">
        <?php
        $form = ActiveForm::begin([
            'layout'      => 'horizontal',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label'   => 'col-4 text-left',
                    'wrapper' => 'col-8',
                ],
            ],
        ]);
        ?>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'type_id')->dropDownList($types) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'start_date')->textInput(['style' => 'direction: ltr !important;text-align: left;', 'readonly' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'end_date')->textInput(['style' => 'direction: ltr !important;text-align: left;', 'readonly' => true]) ?>
            </div>
        </div>
        <?= $form->field($model, 'sanad')->checkbox() ?>
        <?= Html::a(Yii::t('app', 'Return'), ['years', 'id' => $model->organization_id], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
$this->registerJsFile('@web/themes/custom/js/moment.min.js', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/js/moment-jalaali.js', ['depends' => AdminAsset::class]);
$this->registerJs("
    $('#organizationslistyears-start_date').MdPersianDateTimePicker({
        targetTextSelector: '#organizationslistyears-start_date',
        isGregorian: false,
        yearOffset: 60,
        englishNumber: true,
    }).on('hide.bs.popover', function (e) {
        var s = tr_num(this.value).split('/');
        var date = {year: parseInt(s[0]), month: parseInt(s[1]), day: parseInt(s[2])};
        $('#organizationslistyears-end_date').MdPersianDateTimePicker('setDatePersian', date);
        
        var start_time = moment($('#organizationslistyears-start_date').val(), 'jYYYY/jMM/jDD');
        var sdate = tr_num(start_time.format('YYYY-MM-DD'));
        var gdate = new Date(sdate);
        $('#organizationslistyears-end_date').MdPersianDateTimePicker('setOption', 'disableBeforeDate', gdate);
    });
    $('#organizationslistyears-end_date').MdPersianDateTimePicker({
        targetTextSelector: '#organizationslistyears-end_date',
        isGregorian: false,
        yearOffset: 60,
        englishNumber: true,
    });
");