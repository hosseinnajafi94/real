<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\VML\UsersOrdersSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'unit_id') ?>

    <?= $form->field($model, 'position_id') ?>

    <?php // echo $form->field($model, 'calendar_id') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'workduration') ?>

    <?php // echo $form->field($model, 'over_floating_hour') ?>

    <?php // echo $form->field($model, 'transfer_day') ?>

    <?php // echo $form->field($model, 'transfer_hour') ?>

    <?php // echo $form->field($model, 'vacation_day') ?>

    <?php // echo $form->field($model, 'vacation_hour') ?>

    <?php // echo $form->field($model, 'max_hourly_leave') ?>

    <?php // echo $form->field($model, 'min_hourly_leave') ?>

    <?php // echo $form->field($model, 'max_delay_month') ?>

    <?php // echo $form->field($model, 'supervisor_id') ?>

    <?php // echo $form->field($model, 'salary_group_id') ?>

    <?php // echo $form->field($model, 'sick_leave_day') ?>

    <?php // echo $form->field($model, 'sick_leave_hour') ?>

    <?php // echo $form->field($model, 'marriage_leave_day') ?>

    <?php // echo $form->field($model, 'marriage_leave_hour') ?>

    <?php // echo $form->field($model, 'holiday_leave_day') ?>

    <?php // echo $form->field($model, 'leave_type_id') ?>

    <?php // echo $form->field($model, 'break_calculate_type_id') ?>

    <?php // echo $form->field($model, 'overtime_enabled')->checkbox() ?>

    <?php // echo $form->field($model, 'pre_overtime_enabled')->checkbox() ?>

    <?php // echo $form->field($model, 'floating_enabled')->checkbox() ?>

    <?php // echo $form->field($model, 'insurable')->checkbox() ?>

    <?php // echo $form->field($model, 'taxable')->checkbox() ?>

    <?php // echo $form->field($model, 'overtime_confirm')->checkbox() ?>

    <?php // echo $form->field($model, 'pre_overtime_confirm')->checkbox() ?>

    <?php // echo $form->field($model, 'cal_daily_vacation_id') ?>

    <?php // echo $form->field($model, 'floating_id') ?>

    <?php // echo $form->field($model, 'project_id') ?>

    <?php // echo $form->field($model, 'compact_row') ?>

    <?php // echo $form->field($model, 'form_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('users', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('users', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
