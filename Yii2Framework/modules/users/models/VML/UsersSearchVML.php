<?php
namespace app\modules\users\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\users\models\DAL\Users;
class UsersSearchVML extends Users {
    public function rules() {
        return [
            [['id', 'organization_id', 'group_id', 'status_id', 'birthplace_province_id', 'birthplace_city_id', 'marital_status_id', 'military_service_status_id', 'gender_id', 'employment_status_id', 'requested_salary', 'total_work_history', 'account_type_id', 'type_id', 'province_id', 'city_id', 'physical_cond_id', 'personnel_share_id', 'insurance_type_id', 'employment_type_id', 'contract_type_id', 'has_machin_id', 'is_owner_id'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'auth_key', 'code', 'fname', 'lname', 'card_num', 'codemelli', 'birthday', 'father_name', 'religion', 'account_number', 'date_start', 'head_line', 'mobile', 'phone', 'email', 'facebook', 'telegram', 'instagram', 'address', 'avatar', 'place_of_issue', 'insurance_no', 'mother_birth_place', 'father_birth_place', 'mother_first_name', 'prev_last_name', 'mother_last_name', 'passport_no', 'info_work_place', 'start_date', 'emergency_phone', 'call_receiver', 'physical_desc', 'nationality', 'issuance_date', 'insurance_start_date'], 'safe'],
            [['force_rollcall'], 'boolean'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($params) {
        $query        = Users::find()->where(['in_personeli' => true]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id'                         => $this->id,
            'organization_id'            => $this->organization_id,
            'group_id'                   => $this->group_id,
            'status_id'                  => $this->status_id,
            'birthplace_province_id'     => $this->birthplace_province_id,
            'birthplace_city_id'         => $this->birthplace_city_id,
            'birthday'                   => $this->birthday,
            'marital_status_id'          => $this->marital_status_id,
            'military_service_status_id' => $this->military_service_status_id,
            'gender_id'                  => $this->gender_id,
            'employment_status_id'       => $this->employment_status_id,
            'requested_salary'           => $this->requested_salary,
            'total_work_history'         => $this->total_work_history,
            'account_type_id'            => $this->account_type_id,
            'type_id'                    => $this->type_id,
            'date_start'                 => $this->date_start,
            'force_rollcall'             => $this->force_rollcall,
            'province_id'                => $this->province_id,
            'city_id'                    => $this->city_id,
            'start_date'                 => $this->start_date,
            'physical_cond_id'           => $this->physical_cond_id,
            'issuance_date'              => $this->issuance_date,
            'personnel_share_id'         => $this->personnel_share_id,
            'insurance_type_id'          => $this->insurance_type_id,
            'employment_type_id'         => $this->employment_type_id,
            'contract_type_id'           => $this->contract_type_id,
            'insurance_start_date'       => $this->insurance_start_date,
            'has_machin_id'              => $this->has_machin_id,
            'is_owner_id'                => $this->is_owner_id,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
                ->andFilterWhere(['like', 'password_hash', $this->password_hash])
                ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
                ->andFilterWhere(['like', 'auth_key', $this->auth_key])
                ->andFilterWhere(['like', 'code', $this->code])
                ->andFilterWhere(['like', 'fname', $this->fname])
                ->andFilterWhere(['like', 'lname', $this->lname])
                ->andFilterWhere(['like', 'card_num', $this->card_num])
                ->andFilterWhere(['like', 'codemelli', $this->codemelli])
                ->andFilterWhere(['like', 'father_name', $this->father_name])
                ->andFilterWhere(['like', 'religion', $this->religion])
                ->andFilterWhere(['like', 'account_number', $this->account_number])
                ->andFilterWhere(['like', 'head_line', $this->head_line])
                ->andFilterWhere(['like', 'mobile', $this->mobile])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'facebook', $this->facebook])
                ->andFilterWhere(['like', 'telegram', $this->telegram])
                ->andFilterWhere(['like', 'instagram', $this->instagram])
                ->andFilterWhere(['like', 'address', $this->address])
                ->andFilterWhere(['like', 'avatar', $this->avatar])
                ->andFilterWhere(['like', 'place_of_issue', $this->place_of_issue])
                ->andFilterWhere(['like', 'insurance_no', $this->insurance_no])
                ->andFilterWhere(['like', 'mother_birth_place', $this->mother_birth_place])
                ->andFilterWhere(['like', 'father_birth_place', $this->father_birth_place])
                ->andFilterWhere(['like', 'mother_first_name', $this->mother_first_name])
                ->andFilterWhere(['like', 'prev_last_name', $this->prev_last_name])
                ->andFilterWhere(['like', 'mother_last_name', $this->mother_last_name])
                ->andFilterWhere(['like', 'passport_no', $this->passport_no])
                ->andFilterWhere(['like', 'info_work_place', $this->info_work_place])
                ->andFilterWhere(['like', 'emergency_phone', $this->emergency_phone])
                ->andFilterWhere(['like', 'call_receiver', $this->call_receiver])
                ->andFilterWhere(['like', 'physical_desc', $this->physical_desc])
                ->andFilterWhere(['like', 'nationality', $this->nationality]);

        return $dataProvider;
    }
}