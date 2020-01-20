<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_orders".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $type_id
 * @property int|null $unit_id
 * @property int|null $position_id
 * @property int|null $calendar_id
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $workduration
 * @property string|null $over_floating_hour
 * @property int|null $transfer_day
 * @property string|null $transfer_hour
 * @property int|null $vacation_day
 * @property string|null $vacation_hour
 * @property string|null $max_hourly_leave
 * @property string|null $min_hourly_leave
 * @property string|null $max_delay_month
 * @property int|null $supervisor_id
 * @property int|null $salary_group_id
 * @property int|null $sick_leave_day
 * @property string|null $sick_leave_hour
 * @property int|null $marriage_leave_day
 * @property string|null $marriage_leave_hour
 * @property int|null $holiday_leave_day
 * @property int|null $leave_type_id
 * @property int|null $break_calculate_type_id
 * @property bool|null $overtime_enabled
 * @property bool|null $pre_overtime_enabled
 * @property bool|null $floating_enabled
 * @property bool|null $insurable
 * @property bool|null $taxable
 * @property bool|null $overtime_confirm
 * @property bool|null $pre_overtime_confirm
 * @property int|null $cal_daily_vacation_id
 * @property int|null $floating_id
 * @property int|null $project_id
 * @property string|null $compact_row
 * @property int|null $form_id
 *
 * @property Users $user
 */
class UsersOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'type_id', 'unit_id', 'position_id', 'calendar_id', 'transfer_day', 'vacation_day', 'supervisor_id', 'salary_group_id', 'sick_leave_day', 'marriage_leave_day', 'holiday_leave_day', 'leave_type_id', 'break_calculate_type_id', 'cal_daily_vacation_id', 'floating_id', 'project_id', 'form_id'], 'integer'],
            [['start_date', 'end_date', 'workduration', 'over_floating_hour', 'transfer_hour', 'vacation_hour', 'max_hourly_leave', 'min_hourly_leave', 'max_delay_month', 'sick_leave_hour', 'marriage_leave_hour'], 'safe'],
            [['overtime_enabled', 'pre_overtime_enabled', 'floating_enabled', 'insurable', 'taxable', 'overtime_confirm', 'pre_overtime_confirm'], 'boolean'],
            [['compact_row'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('users', 'ID'),
            'user_id' => Yii::t('users', 'User ID'),
            'type_id' => Yii::t('users', 'Type ID'),
            'unit_id' => Yii::t('users', 'Unit ID'),
            'position_id' => Yii::t('users', 'Position ID'),
            'calendar_id' => Yii::t('users', 'Calendar ID'),
            'start_date' => Yii::t('users', 'Start Date'),
            'end_date' => Yii::t('users', 'End Date'),
            'workduration' => Yii::t('users', 'Workduration'),
            'over_floating_hour' => Yii::t('users', 'Over Floating Hour'),
            'transfer_day' => Yii::t('users', 'Transfer Day'),
            'transfer_hour' => Yii::t('users', 'Transfer Hour'),
            'vacation_day' => Yii::t('users', 'Vacation Day'),
            'vacation_hour' => Yii::t('users', 'Vacation Hour'),
            'max_hourly_leave' => Yii::t('users', 'Max Hourly Leave'),
            'min_hourly_leave' => Yii::t('users', 'Min Hourly Leave'),
            'max_delay_month' => Yii::t('users', 'Max Delay Month'),
            'supervisor_id' => Yii::t('users', 'Supervisor ID'),
            'salary_group_id' => Yii::t('users', 'Salary Group ID'),
            'sick_leave_day' => Yii::t('users', 'Sick Leave Day'),
            'sick_leave_hour' => Yii::t('users', 'Sick Leave Hour'),
            'marriage_leave_day' => Yii::t('users', 'Marriage Leave Day'),
            'marriage_leave_hour' => Yii::t('users', 'Marriage Leave Hour'),
            'holiday_leave_day' => Yii::t('users', 'Holiday Leave Day'),
            'leave_type_id' => Yii::t('users', 'Leave Type ID'),
            'break_calculate_type_id' => Yii::t('users', 'Break Calculate Type ID'),
            'overtime_enabled' => Yii::t('users', 'Overtime Enabled'),
            'pre_overtime_enabled' => Yii::t('users', 'Pre Overtime Enabled'),
            'floating_enabled' => Yii::t('users', 'Floating Enabled'),
            'insurable' => Yii::t('users', 'Insurable'),
            'taxable' => Yii::t('users', 'Taxable'),
            'overtime_confirm' => Yii::t('users', 'Overtime Confirm'),
            'pre_overtime_confirm' => Yii::t('users', 'Pre Overtime Confirm'),
            'cal_daily_vacation_id' => Yii::t('users', 'Cal Daily Vacation ID'),
            'floating_id' => Yii::t('users', 'Floating ID'),
            'project_id' => Yii::t('users', 'Project ID'),
            'compact_row' => Yii::t('users', 'Compact Row'),
            'form_id' => Yii::t('users', 'Form ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
