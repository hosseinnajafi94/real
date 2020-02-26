<?php

namespace app\modules\administration\models\DAL;

use Yii;
use app\modules\users\models\DAL\Users;

/**
 * This is the model class for table "sys_events".
 *
 * @property int $id
 * @property int $status_id
 * @property int $user_id
 * @property string $ip
 * @property string $title
 * @property string $datetime
 *
 * @property SysEventsListStatuses $status
 * @property Users $user
 */
class SysEvents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_id', 'user_id', 'ip', 'title', 'datetime'], 'required'],
            [['status_id', 'user_id'], 'integer'],
            [['datetime'], 'safe'],
            [['ip', 'title'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysEventsListStatuses::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('administration', 'ID'),
            'status_id' => Yii::t('administration', 'Status ID'),
            'user_id' => Yii::t('administration', 'User ID'),
            'ip' => Yii::t('administration', 'Ip'),
            'title' => Yii::t('administration', 'Title'),
            'datetime' => Yii::t('administration', 'Datetime'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(SysEventsListStatuses::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
