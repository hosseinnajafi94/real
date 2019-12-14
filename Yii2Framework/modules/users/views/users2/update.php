<?php
use app\modules\users\models\SRL\UsersSRL;
/* @var $this yii\web\View */
/* @var $model \app\modules\users\models\VML\UsersVML */
$this->title = Yii::t('users', 'Users') . ' / ' . $model->id . ' / ' . Yii::t('app', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => UsersSRL::getUserFullname($model->model), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="users-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>