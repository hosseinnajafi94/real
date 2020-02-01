<?php
namespace app\modules\accounting\controllers;
use Yii;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\accounting\models\DAL\AccountingSettingsListOthers;
class AccountingSettingsListOthersController extends Controller {
    public function actionCreate() {
        $model = new AccountingSettingsListOthers();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->asJson(['saved' => true]);
        }
        return $this->asJson(['saved' => false, 'messages' => $model->getErrors()]);
    }
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->asJson(['saved' => true]);
        }
        return $this->asJson(['saved' => false, 'messages' => $model->getErrors()]);
    }
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->asJson(['saved' => true]);
    }
    public function actionDeleteAll(array $ids = []) {
        AccountingSettingsListOthers::deleteAll(['id' => $ids]);
        return $this->asJson(['saved' => true]);
    }
    protected function findModel($id) {
        $model = AccountingSettingsListOthers::findOne($id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        return $model;
    }
}