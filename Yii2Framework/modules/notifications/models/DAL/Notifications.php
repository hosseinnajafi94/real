<?php

namespace app\modules\notifications\models\DAL;

use Yii;
use app\modules\users\models\DAL\Users;

/**
 * This is the model class for table "notifications".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $datetime
 * @property string $icon
 * @property int $type_id
 * @property int|null $user_id
 * @property int $read
 *
 * @property NotificationsListTypes $type
 * @property Users $user
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'datetime', 'icon', 'type_id', 'read'], 'required'],
            [['description'], 'string'],
            [['datetime'], 'safe'],
            [['type_id', 'user_id', 'read'], 'integer'],
            [['title', 'icon'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => NotificationsListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'description' => Yii::t('notifications', 'Description'),
            'datetime' => Yii::t('notifications', 'Datetime'),
            'icon' => Yii::t('notifications', 'Icon'),
            'type_id' => Yii::t('notifications', 'Type ID'),
            'user_id' => Yii::t('notifications', 'User ID'),
            'read' => Yii::t('notifications', 'Read'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(NotificationsListTypes::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
