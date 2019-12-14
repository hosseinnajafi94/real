<?php
namespace app\modules\geo\models\SRL;
use Yii;
use app\modules\SRL;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use app\modules\geo\models\DAL\GeoProvinces;
use app\modules\geo\models\VML\GeoProvincesVML;
use app\modules\geo\models\VML\GeoProvincesSearchVML;
class GeoProvincesSRL implements SRL {
    /**
     * @return array [GeoProvincesSearchVML $searchModel, ActiveDataProvider $dataProvider]
     */
    public static function searchModel() {
        $searchModel = new GeoProvincesSearchVML();
        $query = GeoProvinces::find();
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
     * @return GeoProvincesVML
     */
    public static function newViewModel() {
        $data = new GeoProvincesVML();
        return $data;
    }
    /**
     * @param GeoProvincesVML $data
     * @return void
     */
    public static function loadItems($data) {
    }
    /**
     * @param GeoProvincesVML $data
     * @return bool
     */
    public static function insert($data) {
        if (!$data->validate()) {
            return false;
        }
        $model = new GeoProvinces();
        $model->title = $data->title;
        if ($model->save()) {
            $data->id = $model->id;
            return true;
        }
        return false;
    }
    /**
     * @return GeoProvinces     */
    public static function findModel($id) {
        return GeoProvinces::findOne($id);
    }
    /**
     * @param int $id
     * @return GeoProvincesVML
     */
    public static function findViewModel($id) {
        $model = self::findModel($id);
        if ($model == null) {
            return null;
        }
        $data = new GeoProvincesVML();
        $data->id = $model->id;
        $data->title = $model->title;
        $data->setModel($model);
        return $data;
    }
    /**
     * @param GeoProvincesVML $data
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
     * @return GeoProvinces[]
     */
    public static function getModels() {
        return GeoProvinces::find()->orderBy(['id' => SORT_ASC])->all();
    }
    /**
     * @return array
     */
    public static function getItems() {
        $models = self::getModels();
        return ArrayHelper::map($models, 'id', 'title');
    }
}