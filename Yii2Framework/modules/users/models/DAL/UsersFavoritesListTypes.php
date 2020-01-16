<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_favorites_list_types".
 *
 * @property int $id
 * @property string $title
 *
 * @property UsersFavorites[] $usersFavorites
 */
class UsersFavoritesListTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_favorites_list_types';
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
            'id' => Yii::t('users', 'ID'),
            'title' => Yii::t('users', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersFavorites()
    {
        return $this->hasMany(UsersFavorites::className(), ['type_id' => 'id']);
    }
}
