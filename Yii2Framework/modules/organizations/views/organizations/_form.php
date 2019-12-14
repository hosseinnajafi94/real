<?php
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsVML */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="organizations-form">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('organizations', 'Organizations') ?></h4>
            </div>
            <p><?= Yii::t('app', $model->id ? 'Update' : 'Create') ?></p>
        </div>
        <div class="card-block">
            <?php
            $form = ActiveForm::begin([
                        'layout'      => 'horizontal',
                        'fieldConfig' => [
                            'horizontalCssClasses' => [
                                'label'   => 'col-sm-3 control-label',
                                'wrapper' => 'col-sm-7',
                            ],
                            'labelOptions'         => [
                                'style' => 'text-align: left;font-weight: bold;'
                            ]
                        ],
            ]);
            ?>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#page1">شعبه</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page2">اطلاعات شعبه</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page3">تنظیمات امضاء</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page4">تعیین امضاء کنندگان</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page5">شماره گذاری عملیات</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page6">دسترسی ها</a></li>
            </ul>
            <div class="tab-content px-1">
                <div class="tab-pane active show" id="page1">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'manager_id')->dropDownList($model->managers) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'register_id')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'register_number')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'date_start')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: center;']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'activity_subject')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'parent_id')->dropDownList($model->parents) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'ws_code')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'tfn')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="page2">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'license')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'post')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'logo')->fileInput(['onchange' => "preview(this, 'preview')"]) ?>
                            <div id="preview">
                                <img src="<?= Yii::getAlias('@web/uploads/organizations/' . $model->logo) ?>" style="max-width: 100%;"/>
                            </div>
                            <br/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'province_id')->dropDownList($model->provinces) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'city_id')->dropDownList($model->cities) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'detail')->textarea(['rows' => 3]) ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="page3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10%;"></th>
                                    <th style="width: 30%;text-align: center;">عنوان</th>
                                    <th style="width: 30%;text-align: center;">تعداد</th>
                                    <th style="width: 30%;text-align: center;">شغل / شغل ها</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($index = 1; $index <= 5; $index++) {
                                    ?>
                                    <tr>
                                        <td style="padding: 0;text-align: center;vertical-align: middle;"><?= $index ?></td>
                                        <td style="padding: 0;">
                                            <select class="form-control form-control-sm"></select>
                                        </td>
                                        <td style="padding: 0;">
                                            <input type="text" class="form-control form-control-sm" value="0"/>
                                        </td>
                                        <td style="padding: 0;">
                                            <input type="text" class="form-control form-control-sm"/>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="page4">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10%;"></th>
                                    <th style="width: 15%;text-align: center;">نام</th>
                                    <th style="width: 15%;text-align: center;"></th>
                                    <th style="width: 10%;text-align: center;">به تنهایی</th>
                                    <th style="width: 10%;text-align: center;">اجباری</th>
                                    <th style="width: 10%;text-align: center;">به همراه</th>
                                    <th style="width: 15%;text-align: center;">اولویت</th>
                                    <th style="width: 15%;text-align: center;">وکیل</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 0;text-align: center;vertical-align: middle;">1</td>
                                    <td style="padding: 0;">
                                        <select class="form-control form-control-sm"></select>
                                    </td>
                                    <td style="padding: 0;">
                                        <input type="text" class="form-control form-control-sm disabled" disabled/>
                                    </td>
                                    <td style="padding: 0;text-align: center;vertical-align: middle;">
                                        <input type="checkbox">
                                    </td>
                                    <td style="padding: 0;text-align: center;vertical-align: middle;">
                                        <input type="checkbox">
                                    </td>
                                    <td style="padding: 0;text-align: center;vertical-align: middle;">
                                        <input type="checkbox">
                                    </td>
                                    <td style="padding: 0;">
                                        <input type="text" class="form-control form-control-sm"/>
                                    </td>
                                    <td style="padding: 0;">
                                        <select class="form-control form-control-sm"></select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="page5">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10%;"></th>
                                    <th style="width: 13%;text-align: center;">نام ماژول</th>
                                    <th style="width: 13%;text-align: center;">نام عملیات</th>
                                    <th style="width: 13%;text-align: center;">شمارنده</th>
                                    <th style="width: 13%;text-align: center;">پیشوند</th>
                                    <th style="width: 13%;text-align: center;">پسوند</th>
                                    <th style="width: 25%;text-align: center;">واکنش به مقدار خارج از فرمت</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 0;text-align: center;vertical-align: middle;">1</td>
                                    <td style="padding: 0;text-align: center;vertical-align: middle;">انبار</td>
                                    <td style="padding: 0;text-align: center;vertical-align: middle;">درخواست کالا</td>
                                    <td style="padding: 0;">
                                        <select class="form-control form-control-sm">
                                            <option>counter_2</option>
                                        </select>
                                    </td>
                                    <td style="padding: 0;">
                                        <input type="text" class="form-control form-control-sm"/>
                                    </td>
                                    <td style="padding: 0;">
                                        <input type="text" class="form-control form-control-sm"/>
                                    </td>
                                    <td style="padding: 0;">
                                        <select class="form-control form-control-sm">
                                            <option>عدم واکنش</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="page6">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card border">
                                <div class="card-header border-bottom-0 bg-secondary text-light" style="padding: 5px 10px;">دیدن</div>
                                <div class="card-footer border-top-0" style="padding: 5px 10px;">
                                    <a class="btn btn-sm btn-success pull-right" style="margin: 0;padding: 0px 10px;"><i class="fa fa-plus"></i> افزودن</a>
                                    <a class="btn btn-sm btn-danger pull-left" style="margin: 0;padding: 0px 10px;"><i class="fa fa-times"></i> حذف</a>
                                </div>
                                <div class="card-body border-top" style="max-height: 200px;min-height: 200px;overflow-x: hidden;overflow-y: auto;">
                                    <ul class="ul">
                                        <?php
                                        for ($index1 = 0; $index1 < 20; $index1++) {
                                            ?>
                                            <li>
                                                <span>ردیف <?= $index1 + 1 ?></span>
                                                <a class="pull-left"><i class="fa fa-times"></i></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border">
                                <div class="card-header border-bottom-0 bg-secondary text-light" style="padding: 5px 10px;">ویرایش</div>
                                <div class="card-footer border-top-0" style="padding: 5px 10px;">
                                    <a class="btn btn-sm btn-success pull-right" style="margin: 0;padding: 0px 10px;"><i class="fa fa-plus"></i> افزودن</a>
                                    <a class="btn btn-sm btn-danger pull-left" style="margin: 0;padding: 0px 10px;"><i class="fa fa-times"></i> حذف</a>
                                </div>
                                <div class="card-body border-top" style="max-height: 200px;min-height: 200px;overflow-x: hidden;overflow-y: auto;">
                                    <ul class="ul">
                                        <?php
                                        for ($index1 = 0; $index1 < 20; $index1++) {
                                            ?>
                                            <li>
                                                <span>ردیف <?= $index1 + 1 ?></span>
                                                <a class="pull-left"><i class="fa fa-times"></i></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border">
                                <div class="card-header border-bottom-0 bg-secondary text-light" style="padding: 5px 10px;">برنامه ریزی</div>
                                <div class="card-footer border-top-0" style="padding: 5px 10px;">
                                    <a class="btn btn-sm btn-success pull-right" style="margin: 0;padding: 0px 10px;"><i class="fa fa-plus"></i> افزودن</a>
                                    <a class="btn btn-sm btn-danger pull-left" style="margin: 0;padding: 0px 10px;"><i class="fa fa-times"></i> حذف</a>
                                </div>
                                <div class="card-body border-top" style="max-height: 200px;min-height: 200px;overflow-x: hidden;overflow-y: auto;">
                                    <ul class="ul">
                                        <?php
                                        for ($index1 = 0; $index1 < 20; $index1++) {
                                            ?>
                                            <li>
                                                <span>ردیف <?= $index1 + 1 ?></span>
                                                <a class="pull-left"><i class="fa fa-times"></i></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border">
                                <div class="card-header border-bottom-0 bg-secondary text-light" style="padding: 5px 10px;">مدیر</div>
                                <div class="card-footer border-top-0" style="padding: 5px 10px;">
                                    <a class="btn btn-sm btn-success pull-right" style="margin: 0;padding: 0px 10px;"><i class="fa fa-plus"></i> افزودن</a>
                                    <a class="btn btn-sm btn-danger pull-left" style="margin: 0;padding: 0px 10px;"><i class="fa fa-times"></i> حذف</a>
                                </div>
                                <div class="card-body border-top" style="max-height: 200px;min-height: 200px;overflow-x: hidden;overflow-y: auto;">
                                    <ul class="ul">
                                        <?php
                                        for ($index1 = 0; $index1 < 20; $index1++) {
                                            ?>
                                            <li>
                                                <span>ردیف <?= $index1 + 1 ?></span>
                                                <a class="pull-left"><i class="fa fa-times"></i></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php
$this->registerCss("
    .ul {margin: 0;padding: 0;list-style: none;}
    .ul li {padding: 0 5px;border-bottom: 1px solid #EEE;}
    .ul li:last-child {border: none;}
    .ul li a {display: none;}
    .ul li:hover a {display: block;}
");
$this->registerJs("
$('#organizationsvml-date_start').MdPersianDateTimePicker({
    targetTextSelector: '#organizationsvml-date_start',
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