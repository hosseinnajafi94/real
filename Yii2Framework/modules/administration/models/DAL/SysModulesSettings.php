<?php

namespace app\modules\administration\models\DAL;

use Yii;

/**
 * This is the model class for table "sys_modules_settings".
 *
 * @property int $id
 * @property int $type_id
 * @property int $week_id
 * @property int $day
 * @property string $time
 * @property bool $auto_update
 */
class SysModulesSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_modules_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'week_id', 'day', 'time'], 'required'],
            [['type_id', 'week_id', 'day'], 'integer'],
            [['time'], 'safe'],
            [['auto_update'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('administration', 'ID'),
            'type_id' => Yii::t('administration', 'Type ID'),
            'week_id' => Yii::t('administration', 'Week ID'),
            'day' => Yii::t('administration', 'Day'),
            'time' => Yii::t('administration', 'Time'),
            'auto_update' => Yii::t('administration', 'Auto Update'),
        ];
    }
}
