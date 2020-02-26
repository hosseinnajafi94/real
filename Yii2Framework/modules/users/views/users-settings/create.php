<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersSettings */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users Settings'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-settings-create">
    <?= $this->render('_form', [
        'model' => $model,
         'types' => $types,
    ]) ?>
</div>
