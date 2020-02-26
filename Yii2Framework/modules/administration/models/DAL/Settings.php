<?php

namespace app\modules\administration\models\DAL;

use Yii;
use app\modules\tcoding\models\DAL\ListSecurityTypes;
use app\modules\tcoding\models\DAL\ListReplaceLetters;
use app\modules\tcoding\models\DAL\ListLanguages;
use app\modules\tcoding\models\DAL\ListLanguageTypes;
use app\modules\tcoding\models\DAL\ListNumberFormats;
use app\modules\tcoding\models\DAL\ListCalendarType;
use app\modules\tcoding\models\DAL\ListDateFormatTypes;
use app\modules\tcoding\models\DAL\ListTimezone;
use app\modules\tcoding\models\DAL\ListWeekDays;
use app\modules\tcoding\models\DAL\ListDaylightState;
use app\modules\tcoding\models\DAL\ListMonth;
use app\modules\tcoding\models\DAL\ListMonthDay;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string|null $logo
 * @property string|null $background
 * @property string|null $theme
 * @property bool|null $enable_remember_me
 * @property string|null $title
 * @property int|null $upload_max_size
 * @property int|null $comment_restrict_editable
 * @property int|null $event_remain
 * @property int|null $notify_remain
 * @property int|null $session_remain
 * @property int|null $journal_remain
 * @property int|null $report_remain
 * @property int|null $restart_after
 * @property string|null $admin_email
 * @property string|null $smtp_server
 * @property int|null $smtp_port
 * @property int|null $security_type_id
 * @property string|null $smtp_email
 * @property string|null $smtp_user_name
 * @property string|null $smtp_password
 * @property int|null $replace_letter_id
 * @property int|null $language_id
 * @property bool|null $rtl
 * @property int|null $language_type_id
 * @property int|null $number_format_id
 * @property int|null $calendar_type_id
 * @property int|null $date_format_type_id
 * @property int|null $time_zone_id
 * @property int|null $first_day_in_week_id
 * @property int|null $daylight_state_id
 * @property int|null $dl_from_month_id
 * @property int|null $dl_from_day_id
 * @property int|null $dl_to_month_id
 * @property int|null $dl_to_day_id
 *
 * @property ListSecurityTypes $securityType
 * @property ListReplaceLetters $replaceLetter
 * @property ListLanguages $language
 * @property ListLanguageTypes $languageType
 * @property ListNumberFormats $numberFormat
 * @property ListCalendarType $calendarType
 * @property ListDateFormatTypes $dateFormatType
 * @property ListTimezone $timeZone
 * @property ListWeekDays $firstDayInWeek
 * @property ListDaylightState $daylightState
 * @property ListMonth $dlFromMonth
 * @property ListMonthDay $dlFromDay
 * @property ListMonth $dlToMonth
 * @property ListMonthDay $dlToDay
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enable_remember_me', 'rtl'], 'boolean'],
            [['upload_max_size', 'comment_restrict_editable', 'event_remain', 'notify_remain', 'session_remain', 'journal_remain', 'report_remain', 'restart_after', 'smtp_port', 'security_type_id', 'replace_letter_id', 'language_id', 'language_type_id', 'number_format_id', 'calendar_type_id', 'date_format_type_id', 'time_zone_id', 'first_day_in_week_id', 'daylight_state_id', 'dl_from_month_id', 'dl_from_day_id', 'dl_to_month_id', 'dl_to_day_id'], 'integer'],
            [['logo', 'background', 'theme', 'title', 'admin_email', 'smtp_server', 'smtp_email', 'smtp_user_name', 'smtp_password'], 'string', 'max' => 255],
            [['security_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListSecurityTypes::className(), 'targetAttribute' => ['security_type_id' => 'id']],
            [['replace_letter_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListReplaceLetters::className(), 'targetAttribute' => ['replace_letter_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListLanguages::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['language_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListLanguageTypes::className(), 'targetAttribute' => ['language_type_id' => 'id']],
            [['number_format_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListNumberFormats::className(), 'targetAttribute' => ['number_format_id' => 'id']],
            [['calendar_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListCalendarType::className(), 'targetAttribute' => ['calendar_type_id' => 'id']],
            [['date_format_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListDateFormatTypes::className(), 'targetAttribute' => ['date_format_type_id' => 'id']],
            [['time_zone_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListTimezone::className(), 'targetAttribute' => ['time_zone_id' => 'id']],
            [['first_day_in_week_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListWeekDays::className(), 'targetAttribute' => ['first_day_in_week_id' => 'id']],
            [['daylight_state_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListDaylightState::className(), 'targetAttribute' => ['daylight_state_id' => 'id']],
            [['dl_from_month_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListMonth::className(), 'targetAttribute' => ['dl_from_month_id' => 'id']],
            [['dl_from_day_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListMonthDay::className(), 'targetAttribute' => ['dl_from_day_id' => 'id']],
            [['dl_to_month_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListMonth::className(), 'targetAttribute' => ['dl_to_month_id' => 'id']],
            [['dl_to_day_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListMonthDay::className(), 'targetAttribute' => ['dl_to_day_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('administration', 'ID'),
            'logo' => Yii::t('administration', 'Logo'),
            'background' => Yii::t('administration', 'Background'),
            'theme' => Yii::t('administration', 'Theme'),
            'enable_remember_me' => Yii::t('administration', 'Enable Remember Me'),
            'title' => Yii::t('administration', 'Title'),
            'upload_max_size' => Yii::t('administration', 'Upload Max Size'),
            'comment_restrict_editable' => Yii::t('administration', 'Comment Restrict Editable'),
            'event_remain' => Yii::t('administration', 'Event Remain'),
            'notify_remain' => Yii::t('administration', 'Notify Remain'),
            'session_remain' => Yii::t('administration', 'Session Remain'),
            'journal_remain' => Yii::t('administration', 'Journal Remain'),
            'report_remain' => Yii::t('administration', 'Report Remain'),
            'restart_after' => Yii::t('administration', 'Restart After'),
            'admin_email' => Yii::t('administration', 'Admin Email'),
            'smtp_server' => Yii::t('administration', 'Smtp Server'),
            'smtp_port' => Yii::t('administration', 'Smtp Port'),
            'security_type_id' => Yii::t('administration', 'Security Type ID'),
            'smtp_email' => Yii::t('administration', 'Smtp Email'),
            'smtp_user_name' => Yii::t('administration', 'Smtp User Name'),
            'smtp_password' => Yii::t('administration', 'Smtp Password'),
            'replace_letter_id' => Yii::t('administration', 'Replace Letter ID'),
            'language_id' => Yii::t('administration', 'Language ID'),
            'rtl' => Yii::t('administration', 'Rtl'),
            'language_type_id' => Yii::t('administration', 'Language Type ID'),
            'number_format_id' => Yii::t('administration', 'Number Format ID'),
            'calendar_type_id' => Yii::t('administration', 'Calendar Type ID'),
            'date_format_type_id' => Yii::t('administration', 'Date Format Type ID'),
            'time_zone_id' => Yii::t('administration', 'Time Zone ID'),
            'first_day_in_week_id' => Yii::t('administration', 'First Day In Week ID'),
            'daylight_state_id' => Yii::t('administration', 'Daylight State ID'),
            'dl_from_month_id' => Yii::t('administration', 'Dl From Month ID'),
            'dl_from_day_id' => Yii::t('administration', 'Dl From Day ID'),
            'dl_to_month_id' => Yii::t('administration', 'Dl To Month ID'),
            'dl_to_day_id' => Yii::t('administration', 'Dl To Day ID'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeHints()
    {
        return [
            'upload_max_size'           => 'حداکثر 200MB',
            'comment_restrict_editable' => 'حداقل 1 روز',
            'event_remain'              => 'حداقل 1 روز',
            'notify_remain'             => 'حداقل 10 روز',
            'session_remain'            => 'حداقل 5 دقیقه',
            'journal_remain'            => 'حداقل 20 روز',
            'report_remain'             => 'حداقل 30 روز',
            'restart_after'             => 'حداقل 10 دقیقه',
            ''                          => '',
            ''                          => '',
            ''                          => '',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecurityType()
    {
        return $this->hasOne(ListSecurityTypes::className(), ['id' => 'security_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReplaceLetter()
    {
        return $this->hasOne(ListReplaceLetters::className(), ['id' => 'replace_letter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(ListLanguages::className(), ['id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguageType()
    {
        return $this->hasOne(ListLanguageTypes::className(), ['id' => 'language_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNumberFormat()
    {
        return $this->hasOne(ListNumberFormats::className(), ['id' => 'number_format_id']);
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
    public function getDateFormatType()
    {
        return $this->hasOne(ListDateFormatTypes::className(), ['id' => 'date_format_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimeZone()
    {
        return $this->hasOne(ListTimezone::className(), ['id' => 'time_zone_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirstDayInWeek()
    {
        return $this->hasOne(ListWeekDays::className(), ['id' => 'first_day_in_week_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDaylightState()
    {
        return $this->hasOne(ListDaylightState::className(), ['id' => 'daylight_state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDlFromMonth()
    {
        return $this->hasOne(ListMonth::className(), ['id' => 'dl_from_month_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDlFromDay()
    {
        return $this->hasOne(ListMonthDay::className(), ['id' => 'dl_from_day_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDlToMonth()
    {
        return $this->hasOne(ListMonth::className(), ['id' => 'dl_to_month_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDlToDay()
    {
        return $this->hasOne(ListMonthDay::className(), ['id' => 'dl_to_day_id']);
    }
}
