<?php

namespace app\modules\users\models\DAL;

use Yii;

/**
 * This is the model class for table "users_compilations".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $type_id
 * @property int|null $submit_type_id
 * @property string|null $title
 * @property int|null $year
 * @property string|null $place
 * @property int|null $page_number
 * @property string|null $descriptions
 * @property int|null $points
 *
 * @property Users $user
 * @property UsersCompilationsListTypes $type
 * @property UsersCompilationsListSubmitTypes $submitType
 */
class UsersCompilations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_compilations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'type_id', 'submit_type_id', 'year', 'page_number', 'points'], 'integer'],
            [['title', 'place', 'descriptions'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersCompilationsListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['submit_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersCompilationsListSubmitTypes::className(), 'targetAttribute' => ['submit_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('users', 'ID'),
            'user_id' => Yii::t('users', 'User ID'),
            'type_id' => Yii::t('users', 'Type ID'),
            'submit_type_id' => Yii::t('users', 'Submit Type ID'),
            'title' => Yii::t('users', 'Title'),
            'year' => Yii::t('users', 'Year'),
            'place' => Yii::t('users', 'Place'),
            'page_number' => Yii::t('users', 'Page Number'),
            'descriptions' => Yii::t('users', 'Descriptions'),
            'points' => Yii::t('users', 'Points'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(UsersCompilationsListTypes::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubmitType()
    {
        return $this->hasOne(UsersCompilationsListSubmitTypes::className(), ['id' => 'submit_type_id']);
    }
}
