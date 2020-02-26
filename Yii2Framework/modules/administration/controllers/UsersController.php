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
class UsersController extends Controller {
    public function actionIndex() {
        $searchModel  = new UsersSearchVML();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
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
        $model = new Users();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->renderView($model);
    }
    public function actionUpdate($id) {
        $model = Users::findOne($id);
        if ($model === null) {
            return functions::httpNotFound();
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->renderView($model);
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