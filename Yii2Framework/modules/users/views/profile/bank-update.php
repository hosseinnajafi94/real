<?php
use app\modules\users\models\SRL\UsersSRL;
/* @var $this yii\web\View */
/* @var $model \app\modules\users\models\VML\UsersBanksVML */
$fullname = UsersSRL::getUserFullname($model->model->user);
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('users', 'Users Banks');
$this->params['breadcrumbs'][] = ['label' => $model->model->bank->title, 'url' => ['bank-view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="users-profile-banks-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>