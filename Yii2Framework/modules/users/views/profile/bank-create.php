<?php
use app\modules\users\models\SRL\UsersSRL;
/* @var $this yii\web\View */
/* @var $model \app\modules\users\models\VML\UsersBanksVML */
$fullname = UsersSRL::getUserFullname($model->model->user);
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('users', 'Users Banks');
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>
<div class="users-profile-banks-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>