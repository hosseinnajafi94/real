<?php

namespace app\modules\calendars\models\VML;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImportVML extends Model {

    public $file;
    public $model;

    public function rules() {
        return [
                [['file'], 'required'],
                [['file'], 'file', 'extensions' => 'xlsx'],
        ];
    }

    public function attributeLabels() {
        return [
            'file' => Yii::t('calendars', 'File'),
        ];
    }

    public function attributeHints() {
        return [
            'file' => Yii::t('calendars', 'Extensions: {exts}', ['exts' => 'xlsx'])
        ];
    }

    public function save($post) {
        if (!$this->load($post)) {
            return false;
        }
        $this->file = UploadedFile::getInstance($this, 'file');
        if (!$this->validate()) {
            return false;
        }
        $filename = uniqid(time(), true) . '.' . $this->file->extension;
        $this->file->saveAs("uploads/calendars/$filename");
        try {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("uploads/calendars/$filename");
            $sheets = $spreadsheet->getAllSheets();
            foreach ($sheets as $sheet) {
                $title = $sheet->getTitle();
                $rows = $sheet->toArray();
                for ($index = 1, $count = count($rows); $index < $count; $index++) {
                    $row = $rows[$index];
                    switch ($title) {
                        case 'Calendars':
                            $model = new \app\modules\calendars\models\DAL\Calendars();
                            //$model->id = $row[0];
                            $model->user_id = (int) $row[1];
                            $model->title = (string) $row[2];
                            $model->favcolor = (string) $row[3];
                            $model->type_id = (int) $row[4];
                            $model->status_id = (int) $row[5];
                            $model->location = (string) $row[6];
                            $model->start_time = (string) $row[7];
                            $model->end_time = (string) $row[8];
                            $model->description = (string) $row[9];
                            $model->has_reception = (int) $row[10];
                            $model->catering_id = (int) $row[11];
                            $model->save();
                            break;
                        case 'Users':
                            $model = new \app\modules\calendars\models\DAL\CalendarsUsers();
                            $model->calendar_id = (int) $row[1];
                            $model->user_id = (int) $row[2];
                            $model->save();
                            break;
                        case 'Alarms':
                            $model = new \app\modules\calendars\models\DAL\CalendarsAlarms();
                            $model->calendar_id = (int) $row[1];
                            $model->time_id = (int) $row[2];
                            $model->period_id = (int) $row[3];
                            $model->alarm_type_id = (int) $row[4];
                            $model->message = (string) $row[5];
                            $model->save();
                            break;
                        case 'Events':
                            $model = new \app\modules\calendars\models\DAL\CalendarsEvents();
                            $model->calendar_id = (int) $row[1];
                            $model->datetime = (string) $row[2];
                            $model->done = (int) $row[3];
                            $model->save();
                            break;
                        case 'For Info':
                            $model = new \app\modules\calendars\models\DAL\CalendarsForInformation();
                            $model->calendar_id = (int) $row[1];
                            $model->user_id = (int) $row[2];
                            $model->save();
                            break;
                        case 'Types':
                            $model = new \app\modules\calendars\models\DAL\CalendarsListType();
                            $model->title = (int) $row[1];
                            $model->save();
                            break;
                        case 'Requirements':
                            $model = new \app\modules\calendars\models\DAL\CalendarsRequirements();
                            $model->calendar_id = (int) $row[1];
                            $model->requirement_id = (int) $row[2];
                            $model->save();
                            break;
                    }
                }
            }
            return true;
        } catch (\Exception $exc) {
            $exc->getCode();
            return false;
        }
    }

}
