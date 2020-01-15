<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\VML\UsersVML */
$this->title = Yii::t('app', 'Update');
//$this->title = Yii::t('users', 'Update Users: {name}', [
//    'name' => $model->id,
//]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('users', 'Update');
?>
<div class="users-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>