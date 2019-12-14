<?php
use yii\helpers\Html;
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel \app\modules\users\models\VML\UsersSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
//$this->params['breadcrumbs'][] = Yii::t('users', 'Users');
$this->title = Yii::t('users', 'Users');
?>
<div class="users-users-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
        <p></p>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </p>
        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel'  => $searchModel,
                'columns'      => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'code',
                    'fname',
                    'lname',
                    'birthday',
                    'mobile',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]) ?>
        </div>
    </div>
</div>