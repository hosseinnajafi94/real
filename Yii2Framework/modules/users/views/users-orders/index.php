<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\users\models\VML\UsersOrdersSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('users', 'Users Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('users', 'Create Users Orders'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'type_id',
            'unit_id',
            'position_id',
            //'calendar_id',
            //'start_date',
            //'end_date',
            //'workduration',
            //'over_floating_hour',
            //'transfer_day',
            //'transfer_hour',
            //'vacation_day',
            //'vacation_hour',
            //'max_hourly_leave',
            //'min_hourly_leave',
            //'max_delay_month',
            //'supervisor_id',
            //'salary_group_id',
            //'sick_leave_day',
            //'sick_leave_hour',
            //'marriage_leave_day',
            //'marriage_leave_hour',
            //'holiday_leave_day',
            //'leave_type_id',
            //'break_calculate_type_id',
            //'overtime_enabled:boolean',
            //'pre_overtime_enabled:boolean',
            //'floating_enabled:boolean',
            //'insurable:boolean',
            //'taxable:boolean',
            //'overtime_confirm:boolean',
            //'pre_overtime_confirm:boolean',
            //'cal_daily_vacation_id',
            //'floating_id',
            //'project_id',
            //'compact_row',
            //'form_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
