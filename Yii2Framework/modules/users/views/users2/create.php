<?php
/* @var $this yii\web\View */
/* @var $model \app\modules\users\models\VML\UsersVML */
$this->title = Yii::t('users', 'Users') . ' / ' . Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>
<div class="users-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>