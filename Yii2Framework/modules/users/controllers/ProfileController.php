<?php
namespace app\modules\users\controllers;
use Yii;
use yii\filters\AccessControl;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\users\models\SRL\UsersSRL;
use app\modules\users\models\VML\ProfileVML;
use app\modules\users\models\VML\AddmoneyVML;
use app\modules\users\models\VML\ChangePasswordVML;
use app\modules\users\models\SRL\UsersBanksSRL;
use app\modules\users\models\SRL\UsersAccountsSRL;
use app\modules\users\models\DAL\ViewUsersAccounts;
class ProfileController extends Controller {
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        ['allow' => true, 'actions' => ['index', 'account'], 'roles' => ['Profile'], 'verbs' => ['GET']],
                        ['allow' => true, 'actions' => ['update', 'change-password', 'addmoney'], 'roles' => ['Profile'], 'verbs' => ['GET', 'POST']],
                        ['allow' => true, 'actions' => ['bank-view'], 'roles' => ['Profile'], 'verbs' => ['GET']],
                    //'bank-delete', 
                    ['allow' => true, 'actions' => ['bank-default'], 'roles' => ['Profile'], 'verbs' => ['POST']],
                        ['allow' => true, 'actions' => ['bank-create', 'bank-update'], 'roles' => ['Profile'], 'verbs' => ['GET', 'POST']],
                ],
            ],
        ];
    }
    public function actionIndex() {
        $model = UsersSRL::findModel(Yii::$app->user->id);
        if ($model == null) {
            return functions::httpNotFound();
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
    public function actionUpdate() {
        $model = ProfileVML::find(Yii::$app->user->id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        if ($model->save(Yii::$app->request->post())) {
            functions::setSuccessFlash();
            return $this->redirect(['index']);
        }
        $model->loadItems();
        return $this->renderView($model);
    }
    public function actionChangePassword() {
        $model = ChangePasswordVML::find(Yii::$app->user->id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        if ($model->save(Yii::$app->request->post())) {
            functions::setSuccessFlash();
            return $this->redirect(['index']);
        }
        return $this->renderView($model);
    }
    public function actionAddmoney() {
        $model = AddmoneyVML::find(Yii::$app->user->id);
        if ($model == null) {
            return functions::httpNotFound();
        }
        if ($model->save(Yii::$app->request->post())) {
            return $this->redirect(['/users/users-payments/send', 'id' => $model->id]);
        }
        return $this->renderView($model);
    }
    public function actionBankView(int $id) {
        $model = UsersBanksSRL::findModel(['id' => $id, 'user_id' => Yii::$app->user->id]);
        if ($model == null) {
            return functions::httpNotFound();
        }
        return $this->renderView($model);
    }
    public function actionBankCreate() {
        $model = UsersBanksSRL::newViewModel(['id' => Yii::$app->user->id]);
        if ($model == null) {
            return functions::httpNotFound();
        }
        if ($model->save(Yii::$app->request->post())) {
            functions::setSuccessFlash();
            return $this->redirect(['index']);
        }
        $model->loadItems();
        return $this->renderView($model);
    }
    public function actionBankUpdate(int $id) {
        $model = UsersBanksSRL::findViewModel(['id' => $id, 'user_id' => Yii::$app->user->id]);
        if ($model == null) {
            return functions::httpNotFound();
        }
        if ($model->save(Yii::$app->request->post())) {
            functions::setSuccessFlash();
            return $this->redirect(['index']);
        }
        $model->loadItems();
        return $this->renderView($model);
    }
    public function actionBankDefault(int $id) {
        $saved = UsersBanksSRL::setDefault(['id' => $id, 'user_id' => Yii::$app->user->id, 'default' => false]);
        if ($saved == null) {
            return functions::httpNotFound();
        }
        functions::setFlash($saved);
        return $this->redirect(['index']);
    }
    public function actionAccount(int $id) {
        $model = UsersAccountsSRL::findModel(['id' => $id, 'user_id' => Yii::$app->user->id]);
        if ($model == null) {
            return functions::httpNotFound();
        }
        return $this->renderView($model);
    }
//    public function actionBankDelete(int $id) {
//        $deleted = UsersBanksSRL::delete(['id' => $id, 'user_id' => Yii::$app->user->id]);
//        if ($deleted == null) {
//            return functions::httpNotFound();
//        }
//        functions::setFlash($deleted);
//        return $this->redirect(['index']);
//    }
}