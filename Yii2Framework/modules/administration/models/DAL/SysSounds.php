<?php

namespace app\modules\administration\models\DAL;

use Yii;

/**
 * This is the model class for table "sys_sounds".
 *
 * @property int $id
 * @property int $module_id
 * @property string $title
 * @property string $file
 */
class SysSounds extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_sounds';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['module_id', 'title', 'file'], 'required'],
            [['module_id'], 'integer'],
            [['title', 'file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('administration', 'ID'),
            'module_id' => Yii::t('administration', 'Module ID'),
            'title' => Yii::t('administration', 'Title'),
            'file' => Yii::t('administration', 'File'),
        ];
    }
}
