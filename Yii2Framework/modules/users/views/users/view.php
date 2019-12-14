<?php
use app\config\components\functions;
use yii\helpers\Url;
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
use yii\widgets\Pjax;
use app\config\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\Users */
//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
$model = $model->model;
?>
<div class="users-view card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('users', 'Users') ?></h4>
        </div>
        <p><?= $model->fname . ' ' . $model->lname ?></p>
    </div>
    <div class="card-block">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#page01">پرونده</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page02">اطلاعات تکمیلی</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page17">اطلاعات کاربری</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page07">احکام / قراردادها</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page03">خانوار</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page04">معرفین</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page05">تحصیلات / مهارت</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page06">سوابق کاری</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page08">عناوین و افتخارات</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page09">تالیفات</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page10">علایق</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page11">توضیحات اداری</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page12">توضیحات اداری</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page13">توضیحات محرمانه</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page14">دسترسی ها</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page15">دسترسی مرخصی / ماموریت</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page16">مدارک</a></li>
        </ul>
        <div class="tab-content px-1">
            <div class="tab-pane active show" id="page01">
                <!--//                        'id',
                //                        'group_id',
                //                        'status_id',
                //                        'username',
                //                        'password_hash',
                //                        'password_reset_token',
                //                        'auth_key',-->
                <p>
                    <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
                    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => Yii::t('users', 'Are you sure you want to delete this item?'), 'method' => 'post']]) ?>
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('organization_id') ?>:</label>
                            <div class="col-md-8"><?= $model->organization ? $model->organization->name : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('code') ?>:</label>
                            <div class="col-md-8"><?= $model->code ? $model->code : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('fname') ?>:</label>
                            <div class="col-md-8"><?= $model->fname ? $model->fname : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('lname') ?>:</label>
                            <div class="col-md-8"><?= $model->lname ? $model->lname : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('card_num') ?>:</label>
                            <div class="col-md-8"><?= $model->card_num ? $model->card_num : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('codemelli') ?>:</label>
                            <div class="col-md-8"><?= $model->codemelli ? $model->codemelli : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('birthplace_province_id') ?>:</label>
                            <div class="col-md-8"><?= $model->birthplace_province_id ? $model->birthplace_province_id : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('birthplace_city_id') ?>:</label>
                            <div class="col-md-8"><?= $model->birthplace_city_id ? $model->birthplace_city_id : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('birthday') ?>:</label>
                            <div class="col-md-8"><?= $model->birthday ? functions::tojdate($model->birthday) : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('father_name') ?>:</label>
                            <div class="col-md-8"><?= $model->father_name ? $model->father_name : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('marital_status_id') ?>:</label>
                            <div class="col-md-8"><?= $model->marital_status_id ? $model->marital_status_id : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('religion') ?>:</label>
                            <div class="col-md-8"><?= $model->religion ? $model->religion : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('military_service_status_id') ?>:</label>
                            <div class="col-md-8"><?= $model->military_service_status_id ? $model->military_service_status_id : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('gender_id') ?>:</label>
                            <div class="col-md-8"><?= $model->gender_id ? $model->gender_id : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('employment_status_id') ?>:</label>
                            <div class="col-md-8"><?= $model->employment_status_id ? $model->employment_status_id : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('requested_salary') ?>:</label>
                            <div class="col-md-8"><?= $model->requested_salary ? $model->requested_salary : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('total_work_history') ?>:</label>
                            <div class="col-md-8"><?= $model->total_work_history ? $model->total_work_history : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('account_number') ?>:</label>
                            <div class="col-md-8"><?= $model->account_number ? $model->account_number : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('account_type_id') ?>:</label>
                            <div class="col-md-8"><?= $model->account_type_id ? $model->account_type_id : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('type_id') ?>:</label>
                            <div class="col-md-8"><?= $model->type_id ? $model->type_id : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('date_start') ?>:</label>
                            <div class="col-md-8"><?= $model->date_start ? functions::tojdate($model->date_start) : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('force_rollcall') ?>:</label>
                            <div class="col-md-8"><?= $model->force_rollcall ? $model->force_rollcall : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-12"><?= $model->getAttributeLabel('head_line') ?>:</label>
                    <div class="col-md-12"><?= $model->head_line ? $model->head_line : '---' ?></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('mobile') ?>:</label>
                            <div class="col-md-8"><?= $model->mobile ? $model->mobile : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('phone') ?>:</label>
                            <div class="col-md-8"><?= $model->phone ? $model->phone : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('province_id') ?>:</label>
                            <div class="col-md-8"><?= $model->province_id ? $model->province_id : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('city_id') ?>:</label>
                            <div class="col-md-8"><?= $model->city_id ? $model->city_id : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('email') ?>:</label>
                            <div class="col-md-8"><?= $model->email ? $model->email : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('facebook') ?>:</label>
                            <div class="col-md-8"><?= $model->facebook ? $model->facebook : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('telegram') ?>:</label>
                            <div class="col-md-8"><?= $model->telegram ? $model->telegram : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('instagram') ?>:</label>
                            <div class="col-md-8"><?= $model->instagram ? $model->instagram : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-4"><?= $model->getAttributeLabel('avatar') ?>:</label>
                            <div class="col-md-8"><?= $model->avatar ? $model->avatar : '---' ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-12"><?= $model->getAttributeLabel('address') ?>:</label>
                    <div class="col-md-12"><?= $model->address ? $model->address : '---' ?></div>
                </div>
            </div>
            <div class="tab-pane" id="page02">
                <p>
                    <?= Html::a(Yii::t('app', 'Update'), ['complete', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('place_of_issue') ?>:</label>
                            <div class="col-md-7"><?= $model->place_of_issue ? $model->place_of_issue : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('insurance_no') ?>:</label>
                            <div class="col-md-7"><?= $model->insurance_no ? $model->insurance_no : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('mother_birth_place') ?>:</label>
                            <div class="col-md-7"><?= $model->mother_birth_place ? $model->mother_birth_place : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('father_birth_place') ?>:</label>
                            <div class="col-md-7"><?= $model->father_birth_place ? $model->father_birth_place : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('mother_first_name') ?>:</label>
                            <div class="col-md-7"><?= $model->mother_first_name ? $model->mother_first_name : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('prev_last_name') ?>:</label>
                            <div class="col-md-7"><?= $model->prev_last_name ? $model->prev_last_name : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('mother_last_name') ?>:</label>
                            <div class="col-md-7"><?= $model->mother_last_name ? $model->mother_last_name : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('passport_no') ?>:</label>
                            <div class="col-md-7"><?= $model->passport_no ? $model->passport_no : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('info_work_place') ?>:</label>
                            <div class="col-md-7"><?= $model->info_work_place ? $model->info_work_place : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('start_date') ?>:</label>
                            <div class="col-md-7"><?= $model->start_date ? functions::tojdate($model->start_date) : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('emergency_phone') ?>:</label>
                            <div class="col-md-7"><?= $model->emergency_phone ? $model->emergency_phone : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('call_receiver') ?>:</label>
                            <div class="col-md-7"><?= $model->call_receiver ? $model->call_receiver : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('physical_cond_id') ?>:</label>
                            <div class="col-md-7"><?= $model->physical_cond_id ? $model->physical_cond_id : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('physical_desc') ?>:</label>
                            <div class="col-md-7"><?= $model->physical_desc ? $model->physical_desc : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('nationality') ?>:</label>
                            <div class="col-md-7"><?= $model->nationality ? $model->nationality : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('issuance_date') ?>:</label>
                            <div class="col-md-7"><?= $model->issuance_date ? functions::tojdate($model->issuance_date) : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('personnel_share_id') ?>:</label>
                            <div class="col-md-7"><?= $model->personnel_share_id ? $model->personnel_share_id : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('insurance_type_id') ?>:</label>
                            <div class="col-md-7"><?= $model->insurance_type_id ? $model->insurance_type_id : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('employment_type_id') ?>:</label>
                            <div class="col-md-7"><?= $model->employment_type_id ? $model->employment_type_id : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('contract_type_id') ?>:</label>
                            <div class="col-md-7"><?= $model->contract_type_id ? $model->contract_type_id : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('insurance_start_date') ?>:</label>
                            <div class="col-md-7"><?= $model->insurance_start_date ? functions::tojdate($model->insurance_start_date) : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('has_machin_id') ?>:</label>
                            <div class="col-md-7"><?= $model->has_machin_id ? $model->has_machin_id : '---' ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label class="col-md-5"><?= $model->getAttributeLabel('is_owner_id') ?>:</label>
                            <div class="col-md-7"><?= $model->is_owner_id ? $model->is_owner_id : '---' ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="page03">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page04">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page05">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page06">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page07">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
                </p>
                
            </div>
            <div class="tab-pane" id="page08">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page09">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page10">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page11">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page12">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page13">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page14">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page15">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page16">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page17">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
        </div>
    </div>
</div>