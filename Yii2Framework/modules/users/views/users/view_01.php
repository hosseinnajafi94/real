<?php
use yii\bootstrap4\Html;
use app\config\components\functions;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\Users */
?>
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
            <div class="col-md-8"><?= $model->birthplaceProvince ? $model->birthplaceProvince->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-4"><?= $model->getAttributeLabel('birthplace_city_id') ?>:</label>
            <div class="col-md-8"><?= $model->birthplaceCity ? $model->birthplaceCity->title : '---' ?></div>
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
            <div class="col-md-8"><?= $model->maritalStatus ? $model->maritalStatus->title : '---' ?></div>
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
            <div class="col-md-8"><?= $model->militaryServiceStatus ? $model->militaryServiceStatus->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-4"><?= $model->getAttributeLabel('gender_id') ?>:</label>
            <div class="col-md-8"><?= $model->gender ? $model->gender->title : '---' ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-4"><?= $model->getAttributeLabel('employment_status_id') ?>:</label>
            <div class="col-md-8"><?= $model->employmentStatus ? $model->employmentStatus->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-4"><?= $model->getAttributeLabel('requested_salary') ?>:</label>
            <div class="col-md-8"><?= $model->requested_salary ? functions::toman($model->requested_salary) : '---' ?></div>
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
            <div class="col-md-8"><?= $model->accountType ? $model->accountType->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-4"><?= $model->getAttributeLabel('type_id') ?>:</label>
            <div class="col-md-8"><?= $model->type ? $model->type->title : '---' ?></div>
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
            <div class="col-md-8"><i class="fa fa-<?= $model->force_rollcall ? 'check text-success' : 'times text-danger' ?>"></i></div>
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
            <div class="col-md-8"><?= $model->province ? $model->province->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-4"><?= $model->getAttributeLabel('city_id') ?>:</label>
            <div class="col-md-8"><?= $model->city ? $model->city->title : '---' ?></div>
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
            <div class="col-md-8"><?= $model->avatar ? Html::img("@web/uploads/users/$model->avatar", ['style' => 'max-width: 100%;max-height: 100px']) : '---' ?></div>
        </div>
    </div>
</div>
<div class="row">
    <label class="col-md-12"><?= $model->getAttributeLabel('address') ?>:</label>
    <div class="col-md-12"><?= $model->address ? $model->address : '---' ?></div>
</div>