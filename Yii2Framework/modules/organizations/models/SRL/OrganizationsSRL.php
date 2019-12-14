<?php
namespace app\modules\organizations\models\SRL;
use yii\helpers\ArrayHelper;
use app\modules\organizations\models\DAL\Organizations;
class OrganizationsSRL {
    public static function getModels($where = []) {
        $query = Organizations::find();
        if ($where) {
            $query->where($where);
        }
        return $query->orderBy(['id' => SORT_ASC])->all();
    }
    public static function getItems($where = []) {
        $models = self::getModels($where);
        return ArrayHelper::map($models, 'id', 'name');
    }
}