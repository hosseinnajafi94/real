<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_resume_list_type".
 *
 * @property int $id
 * @property string $title
 *
 * @property UsersResume[] $usersResumes
 */
class UsersResumeListType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_resume_list_type';
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
    public function getUsersResumes()
    {
        return $this->hasMany(UsersResume::className(), ['type_id' => 'id']);
    }
}
