<?php
namespace app\modules\ticketing\controllers;
use Yii;
use yii\filters\AccessControl;
use app\config\widgets\Controller;
use app\config\components\functions;
use app\modules\ticketing\models\SRL\TicketsSRL;
use app\modules\users\models\SRL\UsersSRL;
class TicketsController extends Controller {
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'allow'   => true,
                        'actions' => ['index'],
                        'roles'   => ['Ticketing'],
                        'verbs'   => ['GET']
                    ],
                        [
                        'allow'         => true,
                        'actions'       => ['delete'],
                        'roles'         => ['Ticketing'],
                        'verbs'         => ['POST'],
                        'matchCallback' => function () {
                            $user = UsersSRL::findModel(Yii::$app->user->id);
                            return $user->group->id == 1;
                        }
                    ],
                        [
                        'allow'   => true,
                        'actions' => ['create', 'view'],
                        'roles'   => ['Ticketing'],
                        'verbs'   => ['GET', 'POST']
                    ],
                ],
            ],
        ];
    }
    public function actionIndex() {
        $model = TicketsSRL::index();
        return $this->renderView($model);
    }
    public function actionView($id) {
        $model = TicketsSRL::findModel($id);
        if ($model == null) {
            functions::httpNotFound();
        }
        if ($model->sender_id != Yii::$app->user->id && $model->status_id == 1) {
            $model->status_id = 2;
            $model->save();
        }
        $answer = TicketsSRL::answerViewModel($model);
        if (TicketsSRL::answer($answer, Yii::$app->request->post())) {
            functions::setSuccessFlash();
            return $this->refresh();
        }
        return $this->renderView([
                    'model'  => $model,
                    'answer' => $answer
        ]);
    }
    public function actionCreate() {

        if (Yii::$app->request->isAjax) {
            $data = ['done' => false, 'name' => null, 'address' => null];
            $file = \yii\web\UploadedFile::getInstanceByName('file');
            if ($file) {
                $filename = uniqid(time(), true) . '.' . $file->extension;
                $file->saveAs("uploads/tickets/$filename");
                $data['done'] = true;
                $data['name'] = $filename;
                $data['address'] = Yii::getAlias("@web/uploads/tickets/$filename");
            }
            return $this->asJson($data);
        }

        $model = TicketsSRL::newViewModel();
        if (TicketsSRL::insert($model, Yii::$app->request->post())) {
            functions::setSuccessFlash();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        TicketsSRL::loadItems($model);
        return $this->renderView($model);
    }
    public function actionDelete($id) {
        $deleted = TicketsSRL::delete($id);
        if ($deleted == null) {
            return functions::httpNotFound();
        }
        else if ($deleted == true) {
            functions::setSuccessFlash();
        }
        else {
            functions::setFailFlash();
        }
        return $this->goBack();
    }
}