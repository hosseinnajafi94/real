<?php

namespace app\modules\administration\models\DAL;

use Yii;
use app\modules\users\models\DAL\Users;
/**
 * This is the model class for table "logins".
 *
 * @property int $id
 * @property int $user_id
 * @property string $ip
 * @property string $datetime
 *
 * @property Users $user
 */
class Logins extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logins';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'ip', 'datetime'], 'required'],
            [['user_id'], 'integer'],
            [['datetime'], 'safe'],
            [['ip'], 'string', 'max' => 255],
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
            'ip' => Yii::t('administration', 'Ip'),
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
