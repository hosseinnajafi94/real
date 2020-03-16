<?php

namespace app\modules\administration\models\DAL;

use Yii;

/**
 * This is the model class for table "telephony".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 */
class Telephony extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telephony';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['address'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('administration', 'ID'),
            'name' => Yii::t('administration', 'Telephony Name'),
            'address' => Yii::t('administration', 'Address'),
        ];
    }
}
