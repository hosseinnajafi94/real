<?php

namespace app\modules\administration\models\DAL;

use Yii;
use app\modules\users\models\DAL\Users;

/**
 * This is the model class for table "sys_logs".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $datetime
 *
 * @property Users $user
 */
class SysLogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'datetime'], 'required'],
            [['user_id'], 'integer'],
            [['datetime'], 'safe'],
            [['title'], 'string', 'max' => 255],
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
            'user_id' => Yii::t('administration', 'User ID'),
            'title' => Yii::t('administration', 'Title'),
            'datetime' => Yii::t('administration', 'Datetime'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
