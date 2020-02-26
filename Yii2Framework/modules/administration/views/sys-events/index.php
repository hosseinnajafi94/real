<?php
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\administration\models\VML\SysEventsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('administration', 'Sys Events');
?>
<div class="sys-events-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
        <p></p>
    </div>
    <div class="card-block">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                    ['class' => app\config\widgets\SerialColumn::class],
                'status_id',
                'user_id',
                'ip',
                'title',
            ],
        ]);
        ?>
    </div>
</div>