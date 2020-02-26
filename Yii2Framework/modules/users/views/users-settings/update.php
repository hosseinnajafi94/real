<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersSettings */
$this->title = Yii::t('app', 'Update', [
    'name' => $model->id,
]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users Settings'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('users', 'Update');
?>
<div class="users-settings-update">
    <?= $this->render('_form', [
        'model' => $model,
         'types' => $types,
    ]) ?>
</div>