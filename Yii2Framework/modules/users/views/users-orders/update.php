<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersOrders */

$this->title = Yii::t('users', 'Update Users Orders: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('users', 'Update');
?>
<div class="users-orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
