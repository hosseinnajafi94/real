<?php
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\notifications\models\VML\NotificationsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('notifications', 'Notifications');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notifications-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],
                'title',
                'datetime:jdatetime',
                'read:bool',
                //'description:ntext',
                //'icon',
                //'type_id',
                //'user_id',
                ['class' => app\config\widgets\ActionColumn::class, 'template' => '{view}'],
            ],
        ]) ?>
    </div>
</div>