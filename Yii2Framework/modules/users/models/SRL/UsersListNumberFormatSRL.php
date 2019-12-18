<?php
namespace app\modules\users\models\SRL;
use app\config\widgets\ArrayHelper;
use app\modules\users\models\DAL\UsersListNumberFormat;
class UsersListNumberFormatSRL {
    public static function getModels($where = []) {
        $query = UsersListNumberFormat::find();
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