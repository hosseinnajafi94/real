<?php

namespace app\modules\ticketing\models\DAL;

use Yii;

/**
 * This is the model class for table "tickets_categories".
 *
 * @property int $id
 * @property string $title
 *
 * @property Tickets[] $tickets
 */
class TicketsCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets_categories';
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
            'id' => Yii::t('ticketing', 'ID'),
            'title' => Yii::t('ticketing', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::className(), ['category_id' => 'id']);
    }
}
