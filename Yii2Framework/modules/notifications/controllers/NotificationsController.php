<?php
namespace app\modules\notifications\controllers;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\config\widgets\Controller;
use app\modules\notifications\models\DAL\Notifications;
use app\modules\notifications\models\VML\NotificationsSearchVML;
class NotificationsController extends Controller {
    public function behaviors() {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex() {
        $searchModel  = new NotificationsSearchVML();
        $dataProvider = $searchModel->search(Yii::$app->user->id, Yii::$app->request->queryParams);
        return $this->render('index', [
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id) {
        $model = $this->findModel(Yii::$app->user->id, $id);
        if ($model->type_id === 1 && $model->read === 0) {
            $model->read = 1;
            $model->save();
        }
        return $this->renderView($model);
    }
    protected function findModel($user_id, $id) {
        $model = Notifications::find()
                ->where(['id' => $id, 'type_id' => 1, 'read' => 0, 'user_id' => $user_id])
                ->orWhere(['id' => $id, 'type_id' => 2, 'read' => 0])
                ->one();
        if ($model === null) {
            throw new NotFoundHttpException(Yii::t('notifications', 'The requested page does not exist.'));
        }
        return $model;
    }
}