<?php
namespace app\modules\calendars\models\SRL;
use yii\helpers\ArrayHelper;
use app\modules\calendars\models\DAL\CalendarsSections;
class CalendarsTypeSectionsSRL {
    /**
     * @return GeoCities[]
     */
    public static function getModels($where = []) {
        $query = CalendarsSections::find();
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