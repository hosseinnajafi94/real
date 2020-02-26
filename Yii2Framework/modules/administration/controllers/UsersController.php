<?php
namespace app\modules\administration\controllers;
use Yii;
use app\config\widgets\Controller;
use app\config\widgets\ArrayHelper;
use app\config\components\functions;
use app\modules\users\models\DAL\Users;
use app\modules\administration\models\DAL\SysModules;
use app\modules\administration\models\DAL\UsersListGroups;
use app\modules\administration\models\VML\UsersSearchVML;
use app\modules\users\models\VML\UsersPermissionsSearchVML;
use app\modules\users\models\DAL\UsersPermissions;
use app\modules\users\models\DAL\UsersGroups;
use app\modules\users\models\VML\UsersGroupsSearchVML;
use app\modules\users\models\DAL\UsersListStatuses;
use app\modules\tcoding\models\DAL\ListGenders;
use app\modules\users\models\DAL\UsersListLanguages;
use app\modules\tcoding\models\DAL\ListCalendarType;
use app\modules\users\models\DAL\UsersListDateType;
use app\modules\users\models\DAL\UsersListFirstDayInWeek;
use app\modules\users\models\DAL\UsersListNumberFormat;
use app\modules\tcoding\models\DAL\ListTimezone;
use app\modules\tcoding\models\DAL\ListDaylightState;
use app\modules\tcoding\models\DAL\ListMonth;
use app\modules\tcoding\models\DAL\ListMonthDay;
use app\modules\users\models\DAL\UsersListModeUseSip;
use app\modules\geo\models\SRL\GeoProvincesSRL;
use app\modules\geo\models\SRL\GeoCitiesSRL;
class UsersController extends Controller {
    public function actionIndex() {
        $searchModel  = new UsersSearchVML();
        $dataProvider = $searchModel->searchAdmin(Yii::$app->request->queryParams);
        return $this->renderView([
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id) {
        $model = Users::findOne($id);
        if ($model === null) {
            return functions::httpNotFound();
        }

        $model3        = new UsersPermissions(['user_id' => $model->id]);
        $modules       = ArrayHelper::map(SysModules::find()->all(), 'id', 'name');
        $searchModel3  = new UsersPermissionsSearchVML();
        $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams, $model->id);

        $model4        = new UsersGroups(['user_id' => $model->id]);
        $groups        = ArrayHelper::map(UsersListGroups::find()->all(), 'id', 'name');
        $searchModel4  = new UsersGroupsSearchVML();
        $dataProvider4 = $searchModel4->search2(Yii::$app->request->queryParams, $model->id);

        return $this->renderView([
                    'model'         => $model,
                    'model3'        => $model3,
                    'modules'       => $modules,
                    'searchModel3'  => $searchModel3,
                    'dataProvider3' => $dataProvider3,
                    'model4'        => $model4,
                    'groups'        => $groups,
                    'searchModel4'  => $searchModel4,
                    'dataProvider4' => $dataProvider4,
        ]);
    }
    public function actionCreate() {
        $model = new Users([
            'in_admin'     => true,
            'in_personeli' => false,
            'auth_key'     => Yii::$app->security->generateRandomString(),
            'avatar'       => 'default.png'
        ]);
        if ($model->load(Yii::$app->request->post())) {
            $oldPass = null;
            if ($model->password_hash) {
                $oldPass              = $model->password_hash;
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
            }
            $model->birthday = functions::togdate($model->birthday);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            $model->password_hash = $oldPass;
            $model->birthday      = functions::tojdate($model->birthday);
        }
        $items                         = [];
        $items['status_id']            = ArrayHelper::map(UsersListStatuses::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['gender_id']            = ArrayHelper::map(ListGenders::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['language_id']          = ArrayHelper::map(UsersListLanguages::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['calendar_type_id']     = ArrayHelper::map(ListCalendarType::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['date_type_id']         = ArrayHelper::map(UsersListDateType::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['first_day_in_week_id'] = ArrayHelper::map(UsersListFirstDayInWeek::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['number_format_id']     = ArrayHelper::map(UsersListNumberFormat::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['timezone_id']          = ArrayHelper::map(ListTimezone::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['daylight_state_id']    = ArrayHelper::map(ListDaylightState::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['from_month_id']        = ArrayHelper::map(ListMonth::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['from_day_id']          = ArrayHelper::map(ListMonthDay::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['to_month_id']          = ArrayHelper::map(ListMonth::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['to_day_id']            = ArrayHelper::map(ListMonthDay::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['mode_use_sip_id']      = ArrayHelper::map(UsersListModeUseSip::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['province_id']          = GeoProvincesSRL::getItems();
        $items['city_id']              = GeoCitiesSRL::getItems(['province_id' => $model->province_id]);
        return $this->renderView([
                    'model' => $model,
                    'items' => $items
        ]);
    }
    public function actionUpdate($id) {
        $model = Users::findOne($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        $oldPass = $model->password_hash;
        if ($model->load(Yii::$app->request->post())) {
            if ($model->password_hash) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
            }
            else {
                $model->password_hash = $oldPass;
            }
            $model->birthday = functions::togdate($model->birthday);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        $model->birthday               = functions::tojdate($model->birthday);
        $model->password_hash          = null;
        $items                         = [];
        $items['status_id']            = ArrayHelper::map(UsersListStatuses::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['gender_id']            = ArrayHelper::map(ListGenders::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['language_id']          = ArrayHelper::map(UsersListLanguages::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['calendar_type_id']     = ArrayHelper::map(ListCalendarType::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['date_type_id']         = ArrayHelper::map(UsersListDateType::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['first_day_in_week_id'] = ArrayHelper::map(UsersListFirstDayInWeek::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['number_format_id']     = ArrayHelper::map(UsersListNumberFormat::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['timezone_id']          = ArrayHelper::map(ListTimezone::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['daylight_state_id']    = ArrayHelper::map(ListDaylightState::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['from_month_id']        = ArrayHelper::map(ListMonth::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['from_day_id']          = ArrayHelper::map(ListMonthDay::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['to_month_id']          = ArrayHelper::map(ListMonth::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['to_day_id']            = ArrayHelper::map(ListMonthDay::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['mode_use_sip_id']      = ArrayHelper::map(UsersListModeUseSip::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $items['province_id']          = GeoProvincesSRL::getItems();
        $items['city_id']              = GeoCitiesSRL::getItems(['province_id' => $model->province_id]);
        return $this->renderView([
                    'model' => $model,
                    'items' => $items
        ]);
    }
    public function actionDelete($id) {
        Users::deleteAll(['id' => $id]);
        return $this->redirect(['index']);
    }
    public function actionDeleteAll(array $ids = []) {
        Users::deleteAll(['id' => $ids]);
        return $this->asJson(['saved' => true]);
    }
    public function actionCreate3() {
        $model = new UsersPermissions();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->asJson(['saved' => true]);
        }
        return $this->asJson(['saved' => false, 'messages' => $model->getErrors()]);
    }
    public function actionCreate4() {
        $model = new UsersGroups();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->asJson(['saved' => true]);
        }
        return $this->asJson(['saved' => false, 'messages' => $model->getErrors()]);
    }
    public function actionDelete3($id) {
        UsersPermissions::deleteAll(['id' => $id]);
        return $this->asJson(['saved' => true]);
    }
    public function actionDelete4($id) {
        UsersGroups::deleteAll(['id' => $id]);
        return $this->asJson(['saved' => true]);
    }
    public function actionDeleteAll3(array $ids = []) {
        UsersPermissions::deleteAll(['id' => $ids]);
        return $this->asJson(['saved' => true]);
    }
    public function actionDeleteAll4(array $ids = []) {
        UsersGroups::deleteAll(['id' => $ids]);
        return $this->asJson(['saved' => true]);
    }
}