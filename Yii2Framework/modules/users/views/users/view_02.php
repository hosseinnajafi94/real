<?php
use yii\bootstrap4\Html;
use app\config\components\functions;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\Users */
?>
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
            <div class="col-md-7"><?= $model->physicalCond ? $model->physicalCond->title : '---' ?></div>
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
            <div class="col-md-7"><?= $model->personnelShare ? $model->personnelShare->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('insurance_type_id') ?>:</label>
            <div class="col-md-7"><?= $model->insuranceType ? $model->insuranceType->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('employment_type_id') ?>:</label>
            <div class="col-md-7"><?= $model->employmentType ? $model->employmentType->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('contract_type_id') ?>:</label>
            <div class="col-md-7"><?= $model->contractType ? $model->contractType->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('insurance_start_date') ?>:</label>
            <div class="col-md-7"><?= $model->insurance_start_date ? functions::tojdate($model->insurance_start_date) : '---' ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('has_machin_id') ?>:</label>
            <div class="col-md-7"><?= $model->hasMachin ? $model->hasMachin->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('is_owner_id') ?>:</label>
            <div class="col-md-7"><?= $model->isOwner ? $model->isOwner->title : '---' ?></div>
        </div>
    </div>
</div>