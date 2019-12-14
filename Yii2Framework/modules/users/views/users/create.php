<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\VML\UsersVML */
//$this->title = Yii::t('users', 'Create Users');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>