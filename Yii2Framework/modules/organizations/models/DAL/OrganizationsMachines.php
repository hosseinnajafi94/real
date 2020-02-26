<?php

namespace app\modules\organizations\models\DAL;

use Yii;
use app\modules\tcoding\models\DAL\ListCalendarType;
use app\modules\tcoding\models\DAL\ListMonth;
use app\modules\tcoding\models\DAL\ListMonthDay;
use app\modules\tcoding\models\DAL\ListTimezone;
use app\modules\tcoding\models\DAL\ListDaylightState;

/**
 * This is the model class for table "organizations_machines".
 *
 * @property int $id
 * @property int $org_id
 * @property string $title
 * @property int $machine_id
 * @property string $ip
 * @property int $port
 * @property int $calendar_type_id
 * @property int $timezone_id
 * @property int $model_id
 * @property int $daylight_id
 * @property int|null $form_month_id
 * @property int|null $form_day_id
 * @property int|null $to_month_id
 * @property int|null $to_day_id
 * @property bool $enable_cal_login
 * @property bool $default_type_sync
 *
 * @property ListCalendarType $calendarType
 * @property ListTimezone $timezone
 * @property ListDaylightState $daylight
 * @property ListMonth $formMonth
 * @property ListMonthDay $formDay
 * @property ListMonth $toMonth
 * @property ListMonthDay $toDay
 * @property OrganizationsMachinesListModels $model
 * @property Organizations $org
 * @property OrganizationsMachinesTimes[] $organizationsMachinesTimes
 */
class OrganizationsMachines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations_machines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['org_id', 'title', 'machine_id', 'ip', 'port', 'calendar_type_id', 'timezone_id', 'model_id', 'daylight_id'], 'required'],
            [['org_id', 'machine_id', 'port', 'calendar_type_id', 'timezone_id', 'model_id', 'daylight_id', 'form_month_id', 'form_day_id', 'to_month_id', 'to_day_id'], 'integer'],
            [['enable_cal_login', 'default_type_sync'], 'boolean'],
            [['title'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 15],
            [['calendar_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListCalendarType::className(), 'targetAttribute' => ['calendar_type_id' => 'id']],
            [['timezone_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListTimezone::className(), 'targetAttribute' => ['timezone_id' => 'id']],
            [['daylight_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListDaylightState::className(), 'targetAttribute' => ['daylight_id' => 'id']],
            [['form_month_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListMonth::className(), 'targetAttribute' => ['form_month_id' => 'id']],
            [['form_day_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListMonthDay::className(), 'targetAttribute' => ['form_day_id' => 'id']],
            [['to_month_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListMonth::className(), 'targetAttribute' => ['to_month_id' => 'id']],
            [['to_day_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListMonthDay::className(), 'targetAttribute' => ['to_day_id' => 'id']],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganizationsMachinesListModels::className(), 'targetAttribute' => ['model_id' => 'id']],
            [['org_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['org_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('organizations', 'ID'),
            'org_id' => Yii::t('organizations', 'Org ID'),
            'title' => Yii::t('organizations', 'Title'),
            'machine_id' => Yii::t('organizations', 'Machine ID'),
            'ip' => Yii::t('organizations', 'Ip'),
            'port' => Yii::t('organizations', 'Port'),
            'calendar_type_id' => Yii::t('organizations', 'Calendar Type ID'),
            'timezone_id' => Yii::t('organizations', 'Timezone ID'),
            'model_id' => Yii::t('organizations', 'Model ID'),
            'daylight_id' => Yii::t('organizations', 'Daylight ID'),
            'form_month_id' => Yii::t('organizations', 'Form Month ID'),
            'form_day_id' => Yii::t('organizations', 'Form Day ID'),
            'to_month_id' => Yii::t('organizations', 'To Month ID'),
            'to_day_id' => Yii::t('organizations', 'To Day ID'),
            'enable_cal_login' => Yii::t('organizations', 'Enable Cal Login'),
            'default_type_sync' => Yii::t('organizations', 'Default Type Sync'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarType()
    {
        return $this->hasOne(ListCalendarType::className(), ['id' => 'calendar_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimezone()
    {
        return $this->hasOne(ListTimezone::className(), ['id' => 'timezone_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDaylight()
    {
        return $this->hasOne(ListDaylightState::className(), ['id' => 'daylight_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormMonth()
    {
        return $this->hasOne(ListMonth::className(), ['id' => 'form_month_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormDay()
    {
        return $this->hasOne(ListMonthDay::className(), ['id' => 'form_day_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToMonth()
    {
        return $this->hasOne(ListMonth::className(), ['id' => 'to_month_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToDay()
    {
        return $this->hasOne(ListMonthDay::className(), ['id' => 'to_day_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(OrganizationsMachinesListModels::className(), ['id' => 'model_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'org_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationsMachinesTimes()
    {
        return $this->hasMany(OrganizationsMachinesTimes::className(), ['machine_id' => 'id']);
    }
}
