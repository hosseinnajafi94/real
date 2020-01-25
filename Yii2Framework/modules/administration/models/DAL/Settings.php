<?php

namespace app\modules\administration\models\DAL;

use Yii;

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
 * @property int|null $dl_from_day
 * @property int|null $dl_to_month
 * @property int|null $dl_to_day
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
            [['upload_max_size', 'comment_restrict_editable', 'event_remain', 'notify_remain', 'session_remain', 'journal_remain', 'report_remain', 'restart_after', 'smtp_port', 'security_type_id', 'replace_letter_id', 'language_id', 'language_type_id', 'number_format_id', 'calendar_type_id', 'date_format_type_id', 'time_zone_id', 'first_day_in_week_id', 'daylight_state_id', 'dl_from_month_id', 'dl_from_day', 'dl_to_month', 'dl_to_day'], 'integer'],
            [['logo', 'background', 'theme', 'title', 'admin_email', 'smtp_server', 'smtp_email', 'smtp_user_name', 'smtp_password'], 'string', 'max' => 255],
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
            'dl_from_day' => Yii::t('administration', 'Dl From Day'),
            'dl_to_month' => Yii::t('administration', 'Dl To Month'),
            'dl_to_day' => Yii::t('administration', 'Dl To Day'),
        ];
    }
}
