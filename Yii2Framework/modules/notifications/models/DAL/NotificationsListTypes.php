<?php

namespace app\modules\notifications\models\DAL;

use Yii;

/**
 * This is the model class for table "notifications_list_types".
 *
 * @property int $id
 * @property string $title
 *
 * @property Notifications[] $notifications
 */
class NotificationsListTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifications_list_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('notifications', 'ID'),
            'title' => Yii::t('notifications', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notifications::className(), ['type_id' => 'id']);
    }
}
