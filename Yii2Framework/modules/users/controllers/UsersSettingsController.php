<?php

namespace app\modules\users\controllers;

use Yii;
use app\modules\users\models\DAL\UsersSettings;
use app\modules\users\models\VML\UsersSettingsSearchVML;
use app\config\widgets\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class UsersSettingsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
 public function actionIndex()
    {
        $searchModel = new UsersSettingsSearchVML();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionCreate()
    {
        $model = new UsersSettings();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
$types= \app\modules\users\models\DAL\UsersSettingsListTypes::find()->all();
        return $this->render('create', [
            'model' => $model,
            'types' => $types,
        ]);
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
$types= \app\modules\users\models\DAL\UsersSettingsListTypes::find()->all();

        return $this->render('update', [
            'model' => $model,
            'types' => $types,
        ]);
    }
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    protected function findModel($id)
    {
        if (($model = UsersSettings::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('users', 'The requested page does not exist.'));
    }
}
