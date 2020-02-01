<?php

namespace app\modules\accounting\models\DAL;

use Yii;

/**
 * This is the model class for table "accounting_projects".
 *
 * @property int $id
 * @property string $code
 * @property string $title
 * @property bool $is_active
 * @property string|null $descriptions
 * @property bool $voucher_allow
 * @property int|null $form_id
 */
class AccountingProjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounting_projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'title'], 'required'],
            [['is_active', 'voucher_allow'], 'boolean'],
            [['descriptions'], 'string'],
            [['form_id'], 'integer'],
            [['code', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('accounting', 'ID'),
            'code' => Yii::t('accounting', 'Code'),
            'title' => Yii::t('accounting', 'Project Title'),
            'is_active' => Yii::t('accounting', 'Is Active'),
            'descriptions' => Yii::t('accounting', 'Descriptions'),
            'voucher_allow' => Yii::t('accounting', 'Voucher Allow'),
            'form_id' => Yii::t('accounting', 'Form ID'),
        ];
    }
}
