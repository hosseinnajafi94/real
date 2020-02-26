<?php
namespace app\modules\users\controllers;
use Yii;
use app\modules\users\models\DAL\UsersLoans;
use app\modules\users\models\VML\UsersLoansSearchVML;
use app\config\widgets\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class UsersLoansController extends Controller {
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
        $searchModel  = new UsersLoansSearchVML();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }
    public function actionCreate() {
        $model = new UsersLoans();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $types      = \app\modules\users\models\DAL\UsersLoanListTypes::find()->all();
        $positions  = \app\modules\organizations\models\DAL\OrganizationsPositions::find()->all();
        $users      = \app\modules\users\models\DAL\Users::find()->all();
        $groups     = \app\modules\users\models\DAL\UsersListHiringGroups::find()->all();
        $loan_types = \app\modules\users\models\DAL\UsersLoanListLoanTypes::find()->all();
        return $this->render('create', [
                    'model'      => $model,
                    'types'      => $types,
                    'positions'  => $positions,
                    'users'      => $users,
                    'groups'     => $groups,
                    'loan_types' => $loan_types,
        ]);
    }
    public function actionUpdate($id) {
        $model      = $this->findModel($id);
        $types      = \app\modules\users\models\DAL\UsersLoanListTypes::find()->all();
        $positions  = \app\modules\organizations\models\DAL\OrganizationsPositions::find()->all();
        $users      = \app\modules\users\models\DAL\Users::find()->all();
        $groups     = \app\modules\users\models\DAL\UsersListHiringGroups::find()->all();
        $loan_types = \app\modules\users\models\DAL\UsersLoanListLoanTypes::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model'      => $model,
                    'types'      => $types,
                    'positions'  => $positions,
                    'users'      => $users,
                    'groups'     => $groups,
                    'loan_types' => $loan_types,
        ]);
    }
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    protected function findModel($id) {
        if (($model = UsersLoans::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('users', 'The requested page does not exist.'));
    }
}