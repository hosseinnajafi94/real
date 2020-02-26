<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\users\models\VML\UsersPermissionsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('users', 'Users Permissions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-permissions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('users', 'Create Users Permissions'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'module_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
