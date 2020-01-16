<?php
namespace app\modules\users\controllers;
use Yii;
use yii\filters\VerbFilter;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\users\models\VML\UsersSearchVML;
use app\modules\users\models\VML\UsersVML;
use app\modules\users\models\VML\UsersFamiliesSearchModel;
use app\modules\users\models\VML\UsersReagentsSearchModel;
use app\modules\users\models\VML\UsersEducationsSearchModel;
use app\modules\users\models\VML\UsersResumeSearchModel;
use app\modules\users\models\VML\UsersHonorsSearchModel;
use app\modules\users\models\VML\UsersCompilationsSearchModel;
use app\modules\users\models\VML\UsersFavoritesSearchModel;
use app\modules\users\models\VML\UsersDescriptionsSearchModel;
class UsersController extends Controller {
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
        $searchModel  = new UsersSearchVML();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->renderView([
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id) {
        $model = UsersVML::find($id);
        if ($model === null) {
            return functions::httpNotFound();
        }

        $searchModel5     = new UsersFamiliesSearchModel();
        $dataProvider5    = $searchModel5->search(Yii::$app->request->queryParams);
        $searchModel6     = new UsersReagentsSearchModel();
        $dataProvider6    = $searchModel6->search(Yii::$app->request->queryParams);
        $searchModel7     = new UsersEducationsSearchModel();
        $dataProvider7    = $searchModel7->search(Yii::$app->request->queryParams);
        $searchModel8     = new UsersResumeSearchModel();
        $dataProvider8    = $searchModel8->search(Yii::$app->request->queryParams);
        $searchModel9     = new UsersHonorsSearchModel();
        $dataProvider9    = $searchModel9->search(Yii::$app->request->queryParams);
        $searchModel10    = new UsersCompilationsSearchModel();
        $dataProvider10   = $searchModel10->search(Yii::$app->request->queryParams);
        $searchModel11    = new UsersFavoritesSearchModel();
        $dataProvider11   = $searchModel11->search(Yii::$app->request->queryParams);
        $searchModel12    = new UsersDescriptionsSearchModel();
        $dataProvider12   = $searchModel12->search(1, Yii::$app->request->queryParams);
        $searchModel13    = new UsersDescriptionsSearchModel();
        $dataProvider13   = $searchModel13->search(2, Yii::$app->request->queryParams);
        $searchModel13_2  = new UsersDescriptionsSearchModel();
        $dataProvider13_2 = $searchModel13_2->search(3, Yii::$app->request->queryParams);

        return $this->renderView([
                    'model'            => $model,
                    'searchModel5'     => $searchModel5,
                    'dataProvider5'    => $dataProvider5,
                    'searchModel6'     => $searchModel6,
                    'dataProvider6'    => $dataProvider6,
                    'searchModel7'     => $searchModel7,
                    'dataProvider7'    => $dataProvider7,
                    'searchModel8'     => $searchModel8,
                    'dataProvider8'    => $dataProvider8,
                    'searchModel9'     => $searchModel9,
                    'dataProvider9'    => $dataProvider9,
                    'searchModel10'    => $searchModel10,
                    'dataProvider10'   => $dataProvider10,
                    'searchModel11'    => $searchModel11,
                    'dataProvider11'   => $dataProvider11,
                    'searchModel12'    => $searchModel12,
                    'dataProvider12'   => $dataProvider12,
                    'searchModel13'    => $searchModel13,
                    'dataProvider13'   => $dataProvider13,
                    'searchModel13_2'  => $searchModel13_2,
                    'dataProvider13_2' => $dataProvider13_2,
        ]);
    }
    public function actionCreate() {
        $model = UsersVML::newInstance();
        if ($model->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->loaditems();
        return $this->renderView($model);
    }
    public function actionUpdate($id) {
        $model = UsersVML::find($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        if ($model->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->loaditems();
        return $this->renderView($model);
    }
    public function actionComplete($id) {
        $model = UsersVML::find($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        if ($model->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->loaditems();
        return $this->renderView($model);
    }
    public function actionUser($id) {
        $model = UsersVML::find($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        if ($model->save(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->loaditems();
        return $this->renderView($model);
    }
    public function actionDelete($id) {
        $data = UsersVML::find($id);
        if ($data === null) {
            return functions::httpNotFound();
        }
        $data->model->delete();
        return $this->redirect(['index']);
    }
}