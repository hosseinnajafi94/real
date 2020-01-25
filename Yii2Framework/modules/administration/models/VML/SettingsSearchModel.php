<?php

namespace app\modules\administration\models\VML;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\administration\models\DAL\Settings;

/**
 * SettingsSearchModel represents the model behind the search form of `app\modules\administration\models\DAL\Settings`.
 */
class SettingsSearchModel extends Settings
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'upload_max_size', 'comment_restrict_editable', 'event_remain', 'notify_remain', 'session_remain', 'journal_remain', 'report_remain', 'restart_after', 'smtp_port', 'security_type_id', 'replace_letter_id', 'language_id', 'language_type_id', 'number_format_id', 'calendar_type_id', 'date_format_type_id', 'time_zone_id', 'first_day_in_week_id', 'daylight_state_id', 'dl_from_month_id', 'dl_from_day', 'dl_to_month', 'dl_to_day'], 'integer'],
            [['logo', 'background', 'theme', 'title', 'admin_email', 'smtp_server', 'smtp_email', 'smtp_user_name', 'smtp_password'], 'safe'],
            [['enable_remember_me', 'rtl'], 'boolean'],
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
        $query = Settings::find();

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
            'enable_remember_me' => $this->enable_remember_me,
            'upload_max_size' => $this->upload_max_size,
            'comment_restrict_editable' => $this->comment_restrict_editable,
            'event_remain' => $this->event_remain,
            'notify_remain' => $this->notify_remain,
            'session_remain' => $this->session_remain,
            'journal_remain' => $this->journal_remain,
            'report_remain' => $this->report_remain,
            'restart_after' => $this->restart_after,
            'smtp_port' => $this->smtp_port,
            'security_type_id' => $this->security_type_id,
            'replace_letter_id' => $this->replace_letter_id,
            'language_id' => $this->language_id,
            'rtl' => $this->rtl,
            'language_type_id' => $this->language_type_id,
            'number_format_id' => $this->number_format_id,
            'calendar_type_id' => $this->calendar_type_id,
            'date_format_type_id' => $this->date_format_type_id,
            'time_zone_id' => $this->time_zone_id,
            'first_day_in_week_id' => $this->first_day_in_week_id,
            'daylight_state_id' => $this->daylight_state_id,
            'dl_from_month_id' => $this->dl_from_month_id,
            'dl_from_day' => $this->dl_from_day,
            'dl_to_month' => $this->dl_to_month,
            'dl_to_day' => $this->dl_to_day,
        ]);

        $query->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'background', $this->background])
            ->andFilterWhere(['like', 'theme', $this->theme])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'admin_email', $this->admin_email])
            ->andFilterWhere(['like', 'smtp_server', $this->smtp_server])
            ->andFilterWhere(['like', 'smtp_email', $this->smtp_email])
            ->andFilterWhere(['like', 'smtp_user_name', $this->smtp_user_name])
            ->andFilterWhere(['like', 'smtp_password', $this->smtp_password]);

        return $dataProvider;
    }
}
