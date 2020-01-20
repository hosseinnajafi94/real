<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersOrders */

$this->title = Yii::t('users', 'Create Users Orders');
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
