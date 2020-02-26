<?php
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\administration\models\VML\SysLogsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="sys-logs-index card">
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
                'user_id',
                'title',
                'datetime',
            ],
        ]);
        ?>
    </div>
</div>