<?php

namespace app\modules\administration\models\DAL;

use Yii;

/**
 * This is the model class for table "sys_events_list_statuses".
 *
 * @property int $id
 * @property string $title
 *
 * @property SysEvents[] $sysEvents
 */
class SysEventsListStatuses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_events_list_statuses';
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
            'id' => Yii::t('administration', 'ID'),
            'title' => Yii::t('administration', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSysEvents()
    {
        return $this->hasMany(SysEvents::className(), ['status_id' => 'id']);
    }
}
