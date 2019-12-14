<?php
namespace app\modules\organizations\models\SRL;
use yii\helpers\ArrayHelper;
use app\modules\organizations\models\DAL\OrganizationsUnitsListWorkPlaceStatus;
class OrganizationsUnitsListWorkPlaceStatusSRL {
    public static function getModels($where = []) {
        $query = OrganizationsUnitsListWorkPlaceStatus::find();
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