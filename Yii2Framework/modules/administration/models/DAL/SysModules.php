<?php

namespace app\modules\administration\models\DAL;

use Yii;

/**
 * This is the model class for table "sys_modules".
 *
 * @property int $id
 * @property string $name
 * @property int $version
 * @property string $created_at
 * @property string $update_at
 * @property int $new_version
 */
class SysModules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_modules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'version', 'created_at', 'update_at', 'new_version'], 'required'],
            [['version', 'new_version'], 'integer'],
            [['created_at', 'update_at'], 'safe'],
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
            'name' => Yii::t('administration', 'Name'),
            'version' => Yii::t('administration', 'Version'),
            'created_at' => Yii::t('administration', 'Created At'),
            'update_at' => Yii::t('administration', 'Update At'),
            'new_version' => Yii::t('administration', 'New Version'),
        ];
    }
}
