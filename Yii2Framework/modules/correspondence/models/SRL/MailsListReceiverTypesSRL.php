<?php
namespace app\modules\correspondence\models\SRL;
use app\config\widgets\ArrayHelper;
use app\modules\correspondence\models\DAL\MailsListReceiverTypes;
class MailsListReceiverTypesSRL {
    /**
     * @return GeoCities[]
     */
    public static function getModels($where = []) {
        $query = MailsListReceiverTypes::find();
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