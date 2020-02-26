<?php
namespace app\modules\administration\controllers;
use Yii;
use yii\web\UploadedFile;
use app\config\widgets\Controller;
use app\config\widgets\ArrayHelper;
use app\modules\administration\models\DAL\Settings;
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
class SettingsController extends Controller {
    private function upload($model, $attribute, $defaultValue = null) {
        $file = UploadedFile::getInstance($model, $attribute);
        if ($file) {
            $filename = uniqid(time(), true) . '.' . $file->extension;
            $file->saveAs('uploads/settings/' . $attribute . '/' . $filename);
            return $filename;
        }
        return $defaultValue;
    }
    public function actionIndex() {
        $model         = Settings::findOne(1);
        $oldBackground = $model->background;
        $oldLogo       = $model->logo;
        if ($model->load(Yii::$app->request->post())) {
            $model->background = $this->upload($model, 'background', $oldBackground);
            $model->logo       = $this->upload($model, 'logo', $oldLogo);
            if ($model->save()) {
                return $this->refresh();
            }
        }
        $list                         = [];
        $list['security_type_id']     = ArrayHelper::map(ListSecurityTypes::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $list['replace_letter_id']    = ArrayHelper::map(ListReplaceLetters::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $list['language_id']          = ArrayHelper::map(ListLanguages::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $list['language_type_id']     = ArrayHelper::map(ListLanguageTypes::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $list['number_format_id']     = ArrayHelper::map(ListNumberFormats::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $list['calendar_type_id']     = ArrayHelper::map(ListCalendarType::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $list['date_format_type_id']  = ArrayHelper::map(ListDateFormatTypes::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $list['time_zone_id']         = ArrayHelper::map(ListTimezone::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $list['first_day_in_week_id'] = ArrayHelper::map(ListWeekDays::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $list['daylight_state_id']    = ArrayHelper::map(ListDaylightState::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $list['dl_from_month_id']     = ArrayHelper::map(ListMonth::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $list['dl_from_day_id']          = ArrayHelper::map(ListMonthDay::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        return $this->renderView([
            'model' => $model,
            'list'  => $list
        ]);
    }
}