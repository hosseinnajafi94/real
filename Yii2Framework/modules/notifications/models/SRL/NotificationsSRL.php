<?php
namespace app\modules\notifications\models\SRL;
use app\config\components\functions;
use app\modules\notifications\models\DAL\Notifications;
class NotificationsSRL {
    public static function unreadNotes($user_id) {
        return Notifications::find()
                        ->where(['user_id' => $user_id, 'read' => 0])
                        ->orWhere(['type_id' => 2, 'read' => 0])
                        ->orderBy(['id' => SORT_DESC])
                        ->limit(5)
                        ->all();
    }
    public static function newNote($title, $description, $icon, $type_id, $user_id = null) {
        $model              = new Notifications();
        $model->title       = $title;
        $model->description = $description;
        $model->datetime    = functions::getdatetime();
        $model->icon        = $icon;
        $model->type_id     = $type_id;
        $model->user_id     = $user_id;
        $model->read        = 0;
        return $model->save();
    }
}