<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersPermissions */

$this->title = Yii::t('users', 'Create Users Permissions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users Permissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-permissions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
