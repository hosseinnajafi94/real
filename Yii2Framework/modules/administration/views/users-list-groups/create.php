<?php
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\UsersListGroups */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('administration', 'Users Groups'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-groups-create">
    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
    ]) ?>
</div>