<?php

namespace app\modules\administration\models\DAL;

use Yii;

/**
 * This is the model class for table "dosip".
 *
 * @property int $id
 * @property int $type_id
 * @property string $ip
 * @property int $sub_net
 */
class Dosip extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dosip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'ip', 'sub_net'], 'required'],
            [['type_id', 'sub_net'], 'integer'],
            [['ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('administration', 'ID'),
            'type_id' => Yii::t('administration', 'Dosips Type ID'),
            'ip' => Yii::t('administration', 'Ip'),
            'sub_net' => Yii::t('administration', 'Sub Net'),
        ];
    }
}
