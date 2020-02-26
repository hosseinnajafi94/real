<?php
namespace app\modules\administration\controllers;
use Yii;
use app\modules\administration\models\DAL\SysModulesSettings;
use app\config\widgets\Controller;
use yii\web\NotFoundHttpException;
class SysModulesSettingsController extends Controller {
    public function actionIndex() {
        $model = $this->findModel(1);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->refresh();
        }

        return $this->render('index', [
                    'model' => $model,
        ]);
    }
    protected function findModel($id) {
        if (($model = SysModulesSettings::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('administration', 'The requested page does not exist.'));
    }
}