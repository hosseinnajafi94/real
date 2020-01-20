<?php
namespace app\modules\calendars\controllers;
use Yii;
use yii\web\NotFoundHttpException;
use app\config\widgets\Controller;
use app\modules\calendars\models\DAL\CalendarsListRequirements;
class RequirementsController extends Controller {
    public function actionCreate() {
        $model = new CalendarsListRequirements();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Yii::$app->request->isAjax) {
                return $this->asJson(['saved' => true]);
            }
            return $this->redirect(['/calendars/calendars/index']);
        }
        if (Yii::$app->request->isAjax) {
            return $this->asJson(['saved' => false, 'messages' => $model->getErrors()]);
        }
        return $this->renderView($model);
    }
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->asJson(['saved' => true]);
    }
    public function actionDeleteAll(array $ids = []) {
        CalendarsListRequirements::deleteAll(['id' => $ids]);
        return $this->asJson(['saved' => true]);
    }
    protected function findModel($id) {
        if (($model = CalendarsListRequirements::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('notifications', 'The requested page does not exist.'));
    }
}