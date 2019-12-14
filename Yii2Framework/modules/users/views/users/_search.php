<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\VML\UsersSearchVML */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'organization_id') ?>

    <?= $form->field($model, 'group_id') ?>

    <?= $form->field($model, 'status_id') ?>

    <?= $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'fname') ?>

    <?php // echo $form->field($model, 'lname') ?>

    <?php // echo $form->field($model, 'card_num') ?>

    <?php // echo $form->field($model, 'codemelli') ?>

    <?php // echo $form->field($model, 'birthplace_province_id') ?>

    <?php // echo $form->field($model, 'birthplace_city_id') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'father_name') ?>

    <?php // echo $form->field($model, 'marital_status_id') ?>

    <?php // echo $form->field($model, 'religion') ?>

    <?php // echo $form->field($model, 'military_service_status_id') ?>

    <?php // echo $form->field($model, 'gender_id') ?>

    <?php // echo $form->field($model, 'employment_status_id') ?>

    <?php // echo $form->field($model, 'requested_salary') ?>

    <?php // echo $form->field($model, 'total_work_history') ?>

    <?php // echo $form->field($model, 'account_number') ?>

    <?php // echo $form->field($model, 'account_type_id') ?>

    <?php // echo $form->field($model, 'type_id') ?>

    <?php // echo $form->field($model, 'date_start') ?>

    <?php // echo $form->field($model, 'head_line') ?>

    <?php // echo $form->field($model, 'force_rollcall')->checkbox() ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'province_id') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'facebook') ?>

    <?php // echo $form->field($model, 'telegram') ?>

    <?php // echo $form->field($model, 'instagram') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'place_of_issue') ?>

    <?php // echo $form->field($model, 'insurance_no') ?>

    <?php // echo $form->field($model, 'mother_birth_place') ?>

    <?php // echo $form->field($model, 'father_birth_place') ?>

    <?php // echo $form->field($model, 'mother_first_name') ?>

    <?php // echo $form->field($model, 'prev_last_name') ?>

    <?php // echo $form->field($model, 'mother_last_name') ?>

    <?php // echo $form->field($model, 'passport_no') ?>

    <?php // echo $form->field($model, 'info_work_place') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'emergency_phone') ?>

    <?php // echo $form->field($model, 'call_receiver') ?>

    <?php // echo $form->field($model, 'physical_cond_id') ?>

    <?php // echo $form->field($model, 'physical_desc') ?>

    <?php // echo $form->field($model, 'nationality') ?>

    <?php // echo $form->field($model, 'issuance_date') ?>

    <?php // echo $form->field($model, 'personnel_share_id') ?>

    <?php // echo $form->field($model, 'insurance_type_id') ?>

    <?php // echo $form->field($model, 'employment_type_id') ?>

    <?php // echo $form->field($model, 'contract_type_id') ?>

    <?php // echo $form->field($model, 'insurance_start_date') ?>

    <?php // echo $form->field($model, 'has_machin_id') ?>

    <?php // echo $form->field($model, 'is_owner_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('users', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('users', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
