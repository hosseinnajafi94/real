<?php

namespace app\modules\correspondence\models\DAL;

use Yii;
use app\modules\users\models\DAL\Users;

/**
 * This is the model class for table "secretariats_members".
 *
 * @property int $id
 * @property int $secretariat_id
 * @property int $user_id
 *
 * @property Secretariats $secretariat
 * @property Users $user
 */
class SecretariatsMembers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'secretariats_members';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['secretariat_id', 'user_id'], 'required'],
            [['secretariat_id', 'user_id'], 'integer'],
            [['secretariat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Secretariats::className(), 'targetAttribute' => ['secretariat_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('correspondence', 'ID'),
            'secretariat_id' => Yii::t('correspondence', 'Secretariat ID'),
            'user_id' => Yii::t('correspondence', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecretariat()
    {
        return $this->hasOne(Secretariats::className(), ['id' => 'secretariat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
