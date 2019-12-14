<?php
namespace app\modules\users\models\SRL;
use Yii;
use app\modules\SRL;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use app\modules\users\models\DAL\Users;
use app\modules\users\models\VML\UsersVML;
use app\modules\users\models\VML\UsersSearchVML;
use app\modules\users\models\SRL\UsersGroupsSRL;
use app\modules\users\models\SRL\UsersStatusesSRL;
use app\modules\geo\models\SRL\GeoProvincesSRL;
use app\modules\geo\models\SRL\GeoCitiesSRL;
class UsersSRL implements SRL {
    /**
     * @return array [UsersSearchVML $searchModel, ActiveDataProvider $dataProvider]
     */
    public static function searchModel() {
        $searchModel = new UsersSearchVML();
        $query = Users::find()->where(['group_id' => 2, 'status_id' => 1]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
            'pagination' => ['defaultPageSize' => 10]
        ]);
        $searchModel->load(Yii::$app->request->queryParams);
        self::loadItems($searchModel);
        if (!$searchModel->validate()) {
            $query->where('0=1');
            return [$searchModel, $dataProvider];
        }
        $query->andFilterWhere(['province_id' => $searchModel->province_id]);
        $query->andFilterWhere(['city_id' => $searchModel->city_id]);
        $query->andFilterWhere(['like', 'codemelli', $searchModel->codemelli]);
        $query->andFilterWhere(['like', 'mobile', $searchModel->mobile]);
        $query->andFilterWhere(['like', 'username', $searchModel->username]);
        $query->andFilterWhere(['like', 'password_hash', $searchModel->password_hash]);
        $query->andFilterWhere(['like', 'password_reset_token', $searchModel->password_reset_token]);
        $query->andFilterWhere(['like', 'auth_key', $searchModel->auth_key]);
        $query->andFilterWhere(['like', 'avatar', $searchModel->avatar]);
        $query->andFilterWhere(['like', 'email', $searchModel->email]);
        $query->andFilterWhere(['like', 'fname', $searchModel->fname]);
        $query->andFilterWhere(['like', 'lname', $searchModel->lname]);
        $query->andFilterWhere(['like', 'codeposti', $searchModel->codeposti]);
        $query->andFilterWhere(['like', 'address', $searchModel->address]);
        $query->andFilterWhere(['like', 'cardmelli', $searchModel->cardmelli]);
        $query->andFilterWhere(['like', 'cardmelli_confirmed', $searchModel->cardmelli_confirmed]);
        $query->andFilterWhere(['like', 'avatar_confirmed', $searchModel->avatar_confirmed]);
        return [$searchModel, $dataProvider];
    }
    /**
     * @return UsersVML
     */
    public static function newViewModel() {
        return new UsersVML();
    }
    /**
     * @param UsersVML $data
     * @return void
     */
    public static function loadItems($data) {
        $data->groups = UsersGroupsSRL::getItems();
        $data->statuses = UsersStatusesSRL::getItems();
        $data->provinces = GeoProvincesSRL::getItems();
        $data->cities = GeoCitiesSRL::getItems();
    }
    /**
     * @param UsersVML $data
     * @return bool
     */
    public static function insert($data) {
        if (!$data->validate()) {
            return false;
        }
        $model = new Users();
        $model->group_id = $data->group_id;
        $model->status_id = $data->status_id;
        $model->codemelli = $data->codemelli;
        $model->mobile = $data->mobile;
        $model->username = $data->username;
        $model->password_hash = $data->password_hash;
        $model->password_reset_token = $data->password_reset_token;
        $model->auth_key = $data->auth_key;
        $model->avatar = $data->avatar;
        $model->email = $data->email;
        $model->fname = $data->fname;
        $model->lname = $data->lname;
        $model->province_id = $data->province_id;
        $model->city_id = $data->city_id;
        $model->codeposti = $data->codeposti;
        $model->address = $data->address;
        $model->cardmelli = $data->cardmelli;
        $model->cardmelli_confirmed = $data->cardmelli_confirmed;
        $model->avatar_confirmed = $data->avatar_confirmed;
        if ($model->save()) {
            $data->id = $model->id;
            return true;
        }
        return false;
    }
    /**
     * @return Users     */
    public static function findModel($id) {
        return Users::findOne($id);
    }
    /**
     * @param int $id
     * @return UsersVML
     */
    public static function findViewModel($id) {
        $model = self::findModel($id);
        if ($model == null) {
            return null;
        }
        return new UsersVML($model);
    }
    /**
     * @param UsersVML $data
     * @return bool
     */
    public static function update($data) {
        if (!$data->validate()) {
            return false;
        }
        $model = $data->getModel();
        $model->group_id = $data->group_id;
        $model->status_id = $data->status_id;
        $model->codemelli = $data->codemelli;
        $model->mobile = $data->mobile;
        $model->username = $data->username;
        $model->password_hash = $data->password_hash;
        $model->password_reset_token = $data->password_reset_token;
        $model->auth_key = $data->auth_key;
        $model->avatar = $data->avatar;
        $model->email = $data->email;
        $model->fname = $data->fname;
        $model->lname = $data->lname;
        $model->province_id = $data->province_id;
        $model->city_id = $data->city_id;
        $model->codeposti = $data->codeposti;
        $model->address = $data->address;
        $model->cardmelli = $data->cardmelli;
        $model->cardmelli_confirmed = $data->cardmelli_confirmed;
        $model->avatar_confirmed = $data->avatar_confirmed;
        return $model->save();
    }
    /**
     * @param Users $model
     * @return bool
     */
    public static function delete($model) {
        $model->status_id = 3;
        return $model->save();
    }
    /**
     * @param Users $model
     * @return bool
     */
    public static function confirmCardmelli($model) {
        $model->cardmelli_confirmed = true;
        return $model->save();
    }
    /**
     * @param Users $model
     * @return bool
     */
    public static function confirmAvatar($model) {
        $model->avatar_confirmed = true;
        return $model->save();
    }
    /**
     * @return Users[]
     */
    public static function getModels() {
        return Users::find()->orderBy(['id' => SORT_ASC])->all();
    }
    /**
     * @return array
     */
    public static function getItems() {
        $models = self::getModels();
        return ArrayHelper::map($models, 'id', function ($model) {
            return static::getUserFullname($model);
        });
    }
    /**
     * @param Users $user
     * @return string|null
     */
    public static function getUserFullname($user) {
        if (!$user) {
            return null;
        }
        if ($user->id == 1) {
            return 'مدیر سایت';
        }
        $id = '# ' . $user->id . ' / ';
        if ($user->fname && $user->lname) {
            return $id . $user->fname . ' ' . $user->lname;
        }
        return $id . $user->username;
    }
}