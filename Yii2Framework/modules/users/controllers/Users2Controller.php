<?php
namespace app\modules\users\controllers;
use Yii;
use yii\filters\AccessControl;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\users\models\SRL\UsersSRL;
use app\modules\users\models\SRL\UsersAccountsSRL;
use app\modules\users\models\DAL\ViewUsersAccounts;
use app\modules\users\models\SRL\UsersBanksSRL;
class UsersController extends Controller {
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        ['allow' => true, 'actions' => ['index', 'view'], 'roles' => ['Users'], 'verbs' => ['GET']],
                        ['allow' => true, 'actions' => ['delete', 'confirm-cardmelli', 'confirm-avatar'], 'roles' => ['Users'], 'verbs' => ['POST']],
                        ['allow' => true, 'actions' => ['create', 'update'], 'roles' => ['Users'], 'verbs' => ['GET', 'POST']],
                ],
            ],
        ];
    }
    public function actionIndex() {
        list($searchModel, $dataProvider) = UsersSRL::searchModel();
        return $this->renderView([
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id) {
        $model = UsersSRL::findModel($id);
        if ($model == null) {
            functions::httpNotFound();
        }
        $banks           = UsersBanksSRL::getModels(['user_id' => $model->id], ['id' => SORT_DESC]);
        $accounts        = UsersAccountsSRL::getModels(['user_id' => $model->id], ['id' => SORT_DESC]);
        $viewUserAccount = ViewUsersAccounts::findOne(['user_id' => $model->id]);
        return $this->renderView([
                    'model'           => $model,
                    'banks'           => $banks,
                    'accounts'        => $accounts,
                    'viewUserAccount' => $viewUserAccount,
        ]);
    }
    public function actionCreate() {
        $model = UsersSRL::newViewModel();
        if ($model->save(Yii::$app->request->post())) {
            functions::setSuccessFlash();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->loadItems();
        return $this->renderView($model);
    }
    public function actionUpdate($id) {
        $model = UsersSRL::findViewModel($id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        if ($model->save(Yii::$app->request->post())) {
            functions::setSuccessFlash();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->loadItems();
        return $this->renderView($model);
    }
    public function actionDelete($id) {
        $model = UsersSRL::findModel($id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        $saved = UsersSRL::delete($model);
        functions::setFlash($saved);
        return $this->redirect(['index']);
    }
    public function actionConfirmCardmelli($id) {
        $model = UsersSRL::findModel($id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        $saved = UsersSRL::confirmCardmelli($model);
        functions::setFlash($saved);
        return $this->redirect(['view', 'id' => $model->id]);
    }
    public function actionConfirmAvatar($id) {
        $model = UsersSRL::findModel($id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        $saved = UsersSRL::confirmAvatar($model);
        functions::setFlash($saved);
        return $this->redirect(['view', 'id' => $model->id]);
    }
}