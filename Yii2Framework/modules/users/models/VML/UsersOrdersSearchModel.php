<?php

namespace app\modules\users\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\users\models\DAL\UsersOrders;

/**
 * UsersOrdersSearchModel represents the model behind the search form of `app\modules\users\models\DAL\UsersOrders`.
 */
class UsersOrdersSearchModel extends UsersOrders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'type_id', 'unit_id', 'position_id', 'calendar_id', 'transfer_day', 'vacation_day', 'supervisor_id', 'salary_group_id', 'sick_leave_day', 'marriage_leave_day', 'holiday_leave_day', 'leave_type_id', 'break_calculate_type_id', 'cal_daily_vacation_id', 'floating_id', 'project_id', 'form_id'], 'integer'],
            [['start_date', 'end_date', 'workduration', 'over_floating_hour', 'transfer_hour', 'vacation_hour', 'max_hourly_leave', 'min_hourly_leave', 'max_delay_month', 'sick_leave_hour', 'marriage_leave_hour', 'compact_row'], 'safe'],
            [['overtime_enabled', 'pre_overtime_enabled', 'floating_enabled', 'insurable', 'taxable', 'overtime_confirm', 'pre_overtime_confirm'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UsersOrders::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'type_id' => $this->type_id,
            'unit_id' => $this->unit_id,
            'position_id' => $this->position_id,
            'calendar_id' => $this->calendar_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'workduration' => $this->workduration,
            'over_floating_hour' => $this->over_floating_hour,
            'transfer_day' => $this->transfer_day,
            'transfer_hour' => $this->transfer_hour,
            'vacation_day' => $this->vacation_day,
            'vacation_hour' => $this->vacation_hour,
            'max_hourly_leave' => $this->max_hourly_leave,
            'min_hourly_leave' => $this->min_hourly_leave,
            'max_delay_month' => $this->max_delay_month,
            'supervisor_id' => $this->supervisor_id,
            'salary_group_id' => $this->salary_group_id,
            'sick_leave_day' => $this->sick_leave_day,
            'sick_leave_hour' => $this->sick_leave_hour,
            'marriage_leave_day' => $this->marriage_leave_day,
            'marriage_leave_hour' => $this->marriage_leave_hour,
            'holiday_leave_day' => $this->holiday_leave_day,
            'leave_type_id' => $this->leave_type_id,
            'break_calculate_type_id' => $this->break_calculate_type_id,
            'overtime_enabled' => $this->overtime_enabled,
            'pre_overtime_enabled' => $this->pre_overtime_enabled,
            'floating_enabled' => $this->floating_enabled,
            'insurable' => $this->insurable,
            'taxable' => $this->taxable,
            'overtime_confirm' => $this->overtime_confirm,
            'pre_overtime_confirm' => $this->pre_overtime_confirm,
            'cal_daily_vacation_id' => $this->cal_daily_vacation_id,
            'floating_id' => $this->floating_id,
            'project_id' => $this->project_id,
            'form_id' => $this->form_id,
        ]);

        $query->andFilterWhere(['like', 'compact_row', $this->compact_row]);

        return $dataProvider;
    }
}
