<?php

namespace app\modules\users\models\DAL;

use Yii;
use app\modules\tcoding\models\DAL\ListDegree;

/**
 * This is the model class for table "users_educations".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $type_id
 * @property int|null $degree_id
 * @property string|null $field
 * @property string|null $university
 * @property int|null $gpa
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $evidence
 * @property string|null $description
 * @property int|null $points
 *
 * @property Users $user
 * @property UsersEducationsListTypes $type
 * @property ListDegree $degree
 */
class UsersEducations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_educations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'type_id', 'degree_id', 'gpa', 'evidence', 'points'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['field', 'university', 'description'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersEducationsListTypes::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['degree_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListDegree::className(), 'targetAttribute' => ['degree_id' => 'id']],
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
            'degree_id' => Yii::t('users', 'Degree ID'),
            'field' => Yii::t('users', 'Field'),
            'university' => Yii::t('users', 'University'),
            'gpa' => Yii::t('users', 'Gpa'),
            'start_date' => Yii::t('users', 'Educations Start Date'),
            'end_date' => Yii::t('users', 'Educations End Date'),
            'evidence' => Yii::t('users', 'Evidence'),
            'description' => Yii::t('users', 'Description'),
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
        return $this->hasOne(UsersEducationsListTypes::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDegree()
    {
        return $this->hasOne(ListDegree::className(), ['id' => 'degree_id']);
    }
}
