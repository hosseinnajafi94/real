<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersOrders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <?= $form->field($model, 'unit_id')->textInput() ?>

    <?= $form->field($model, 'position_id')->textInput() ?>

    <?= $form->field($model, 'calendar_id')->textInput() ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'workduration')->textInput() ?>

    <?= $form->field($model, 'over_floating_hour')->textInput() ?>

    <?= $form->field($model, 'transfer_day')->textInput() ?>

    <?= $form->field($model, 'transfer_hour')->textInput() ?>

    <?= $form->field($model, 'vacation_day')->textInput() ?>

    <?= $form->field($model, 'vacation_hour')->textInput() ?>

    <?= $form->field($model, 'max_hourly_leave')->textInput() ?>

    <?= $form->field($model, 'min_hourly_leave')->textInput() ?>

    <?= $form->field($model, 'max_delay_month')->textInput() ?>

    <?= $form->field($model, 'supervisor_id')->textInput() ?>

    <?= $form->field($model, 'salary_group_id')->textInput() ?>

    <?= $form->field($model, 'sick_leave_day')->textInput() ?>

    <?= $form->field($model, 'sick_leave_hour')->textInput() ?>

    <?= $form->field($model, 'marriage_leave_day')->textInput() ?>

    <?= $form->field($model, 'marriage_leave_hour')->textInput() ?>

    <?= $form->field($model, 'holiday_leave_day')->textInput() ?>

    <?= $form->field($model, 'leave_type_id')->textInput() ?>

    <?= $form->field($model, 'break_calculate_type_id')->textInput() ?>

    <?= $form->field($model, 'overtime_enabled')->checkbox() ?>

    <?= $form->field($model, 'pre_overtime_enabled')->checkbox() ?>

    <?= $form->field($model, 'floating_enabled')->checkbox() ?>

    <?= $form->field($model, 'insurable')->checkbox() ?>

    <?= $form->field($model, 'taxable')->checkbox() ?>

    <?= $form->field($model, 'overtime_confirm')->checkbox() ?>

    <?= $form->field($model, 'pre_overtime_confirm')->checkbox() ?>

    <?= $form->field($model, 'cal_daily_vacation_id')->textInput() ?>

    <?= $form->field($model, 'floating_id')->textInput() ?>

    <?= $form->field($model, 'project_id')->textInput() ?>

    <?= $form->field($model, 'compact_row')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'form_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('users', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
