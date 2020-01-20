<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersOrders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('users', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('users', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('users', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'type_id',
            'unit_id',
            'position_id',
            'calendar_id',
            'start_date',
            'end_date',
            'workduration',
            'over_floating_hour',
            'transfer_day',
            'transfer_hour',
            'vacation_day',
            'vacation_hour',
            'max_hourly_leave',
            'min_hourly_leave',
            'max_delay_month',
            'supervisor_id',
            'salary_group_id',
            'sick_leave_day',
            'sick_leave_hour',
            'marriage_leave_day',
            'marriage_leave_hour',
            'holiday_leave_day',
            'leave_type_id',
            'break_calculate_type_id',
            'overtime_enabled:boolean',
            'pre_overtime_enabled:boolean',
            'floating_enabled:boolean',
            'insurable:boolean',
            'taxable:boolean',
            'overtime_confirm:boolean',
            'pre_overtime_confirm:boolean',
            'cal_daily_vacation_id',
            'floating_id',
            'project_id',
            'compact_row',
            'form_id',
        ],
    ]) ?>

</div>
