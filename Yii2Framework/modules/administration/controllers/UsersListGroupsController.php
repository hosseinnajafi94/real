<?php
namespace app\modules\administration\controllers;
use Yii;
use yii\filters\VerbFilter;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\users\models\SRL\UsersSRL;
use app\modules\administration\models\DAL\UsersListGroups;
use app\modules\administration\models\VML\UsersListGroupsSearchVML;
use app\modules\administration\models\VML\UsersListGroupsPermissionsSearchVML;
use app\modules\administration\models\DAL\UsersListGroupsPermissions;
use app\modules\users\models\VML\UsersGroupsSearchVML;
use app\modules\users\models\DAL\UsersGroups;
class UsersListGroupsController extends Controller {
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
        $searchModel  = new UsersListGroupsSearchVML();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $users        = UsersSRL::getItems();
        return $this->renderView([
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
                    'users'        => $users,
        ]);
    }
    public function actionView($id) {
        $model = $this->findModel($id);

        $model2        = new UsersListGroupsPermissions(['group_id' => $model->id]);
        $modules       = \app\config\widgets\ArrayHelper::map(\app\modules\administration\models\DAL\SysModules::find()->all(), 'id', 'name');
        $searchModel2  = new UsersListGroupsPermissionsSearchVML();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams, $model->id);

        $model3        = new UsersGroups(['group_id' => $model->id]);
        $users         = UsersSRL::getItems();
        $searchModel3  = new UsersGroupsSearchVML();
        $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams, $model->id);

        return $this->renderView([
                    'model'         => $model,
                    'model2'        => $model2,
                    'modules'       => $modules,
                    'searchModel2'  => $searchModel2,
                    'dataProvider2' => $dataProvider2,
                    'model3'        => $model3,
                    'users'         => $users,
                    'searchModel3'  => $searchModel3,
                    'dataProvider3' => $dataProvider3,
        ]);
    }
    public function actionCreate() {
        $model = new UsersListGroups();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $users = UsersSRL::getItems();
        return $this->renderView([
                    'model' => $model,
                    'users' => $users,
        ]);
    }
    public function actionCreate2() {
        $model = new UsersListGroupsPermissions();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->asJson(['saved' => true]);
        }
        return $this->asJson(['saved' => false, 'messages' => $model->getErrors()]);
    }
    public function actionCreate3() {
        $model = new UsersGroups();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->asJson(['saved' => true]);
        }
        return $this->asJson(['saved' => false, 'messages' => $model->getErrors()]);
    }
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $users = UsersSRL::getItems();
        return $this->renderView([
                    'model' => $model,
                    'users' => $users,
        ]);
    }
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    public function actionDelete2($id) {
        UsersListGroupsPermissions::deleteAll(['id' => $id]);
        return $this->asJson(['saved' => true]);
    }
    public function actionDelete3($id) {
        UsersGroups::deleteAll(['id' => $id]);
        return $this->asJson(['saved' => true]);
    }
    public function actionDeleteAll(array $ids = []) {
        UsersListGroups::deleteAll(['id' => $ids]);
        return $this->asJson(['saved' => true]);
    }
    public function actionDeleteAll2(array $ids = []) {
        UsersListGroupsPermissions::deleteAll(['id' => $ids]);
        return $this->asJson(['saved' => true]);
    }
    public function actionDeleteAll3(array $ids = []) {
        UsersGroups::deleteAll(['id' => $ids]);
        return $this->asJson(['saved' => true]);
    }
    protected function findModel($id) {
        $model = UsersListGroups::findOne($id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        return $model;
    }
}