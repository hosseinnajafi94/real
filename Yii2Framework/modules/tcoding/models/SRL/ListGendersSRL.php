<?php
namespace app\modules\tcoding\models\SRL;
use yii\helpers\ArrayHelper;
use app\modules\tcoding\models\DAL\ListGenders;
class ListGendersSRL {
    public static function getModels($where = []) {
        $query = ListGenders::find();
        if ($where) {
            $query->where($where);
        }
        return $query->orderBy(['id' => SORT_ASC])->all();
    }
    public static function getItems($where = []) {
        $models = self::getModels($where);
        return ArrayHelper::map($models, 'id', 'title');
    }
}
