<?php
namespace app\modules\geo\models\SRL;
use Yii;
use app\modules\SRL;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use app\modules\geo\models\DAL\GeoCities;
use app\modules\geo\models\VML\GeoCitiesVML;
use app\modules\geo\models\VML\GeoCitiesSearchVML;
class GeoCitiesSRL implements SRL {
    /**
     * @return array [GeoCitiesSearchVML $searchModel, ActiveDataProvider $dataProvider]
     */
    public static function searchModel() {
        $searchModel = new GeoCitiesSearchVML();
        $query = GeoCities::find();
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
        $query->andFilterWhere(['like', 'title', $searchModel->title]);
        return [$searchModel, $dataProvider];
    }
    /**
     * @return GeoCitiesVML
     */
    public static function newViewModel() {
        $data = new GeoCitiesVML();
        return $data;
    }
    /**
     * @param GeoCitiesVML $data
     * @return void
     */
    public static function loadItems($data) {
        $data->provinces = GeoProvincesSRL::getItems();
    }
    /**
     * @param GeoCitiesVML $data
     * @return bool
     */
    public static function insert($data) {
        if (!$data->validate()) {
            return false;
        }
        $model = new GeoCities();
        $model->province_id = $data->province_id;
        $model->title = $data->title;
        if ($model->save()) {
            $data->id = $model->id;
            return true;
        }
        return false;
    }
    /**
     * @return GeoCities     */
    public static function findModel($id) {
        return GeoCities::findOne($id);
    }
    /**
     * @param int $id
     * @return GeoCitiesVML
     */
    public static function findViewModel($id) {
        $model = self::findModel($id);
        if ($model == null) {
            return null;
        }
        $data = new GeoCitiesVML();
        $data->id = $model->id;
        $data->province_id = $model->province_id;
        $data->title = $model->title;
        $data->setModel($model);
        return $data;
    }
    /**
     * @param GeoCitiesVML $data
     * @return bool
     */
    public static function update($data) {
        if (!$data->validate()) {
            return false;
        }
        $model = $data->getModel();
        $model->province_id = $data->province_id;
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
     * @return GeoCities[]
     */
    public static function getModels($where = []) {
        $query = GeoCities::find();
        if ($where) {
            $query->where($where);
        }
        return $query->orderBy(['id' => SORT_ASC])->all();
    }
    /**
     * @return array
     */
    public static function getItems($where = []) {
        $models = self::getModels($where);
        return ArrayHelper::map($models, 'id', 'title');
    }
}