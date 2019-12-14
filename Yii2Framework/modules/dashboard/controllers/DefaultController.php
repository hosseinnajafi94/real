<?php
namespace app\modules\dashboard\controllers;
use yii\filters\AccessControl;
use app\config\widgets\Controller;
class DefaultController extends Controller {
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['index'],
                        'roles'   => ['Dashboard'],
                        'verbs'   => ['GET']
                    ],
                ],
            ],
        ];
    }
    public function actionIndex() {
        return $this->renderView();
    }
}