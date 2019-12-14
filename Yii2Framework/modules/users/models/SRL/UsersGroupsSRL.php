<?php
namespace app\modules\users\models\SRL;
use Yii;
use app\modules\SRL;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use app\modules\users\models\DAL\UsersGroups;
use app\modules\users\models\VML\UsersGroupsVML;
use app\modules\users\models\VML\UsersGroupsSearchVML;
class UsersGroupsSRL implements SRL {
    /**
     * @return array [UsersGroupsSearchVML $searchModel, ActiveDataProvider $dataProvider]
     */
    public static function searchModel() {
        $searchModel = new UsersGroupsSearchVML();
        $query = UsersGroups::find();
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
        $query->andFilterWhere(['like', 'title', $searchModel->title]);
        return [$searchModel, $dataProvider];
    }
    /**
     * @return UsersGroupsVML
     */
    public static function newViewModel() {
        $data = new UsersGroupsVML();
        return $data;
    }
    /**
     * @param UsersGroupsVML $data
     * @return void
     */
    public static function loadItems($data) {
    }
    /**
     * @param UsersGroupsVML $data
     * @return bool
     */
    public static function insert($data) {
        if (!$data->validate()) {
            return false;
        }
        $model = new UsersGroups();
        $model->title = $data->title;
        if ($model->save()) {
            $data->id = $model->id;
            return true;
        }
        return false;
    }
    /**
     * @return UsersGroups     */
    public static function findModel($id) {
        return UsersGroups::findOne($id);
    }
    /**
     * @param int $id
     * @return UsersGroupsVML
     */
    public static function findViewModel($id) {
        $model = self::findModel($id);
        if ($model == null) {
            return null;
        }
        $data = new UsersGroupsVML();
        $data->id = $model->id;
        $data->title = $model->title;
        $data->setModel($model);
        return $data;
    }
    /**
     * @param UsersGroupsVML $data
     * @return bool
     */
    public static function update($data) {
        if (!$data->validate()) {
            return false;
        }
        $model = $data->getModel();
        $model->title = $data->title;
        return $model->save();
    }
    /**
     * @param int $id
     * @return bool
     */
    public static function delete($id) {
        $model = self::findModel($id);
        if ($model == null) {
            return false;
        }
        return $model->delete() ? true : false;
    }
    /**
     * @return UsersGroups[]
     */
    public static function getModels() {
        return UsersGroups::find()->orderBy(['id' => SORT_ASC])->all();
    }
    /**
     * @return array
     */
    public static function getItems() {
        $models = self::getModels();
        return ArrayHelper::map($models, 'id', 'title');
    }
}