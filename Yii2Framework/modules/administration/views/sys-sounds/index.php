<?php
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\administration\models\VML\SysSoundsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('administration', 'Sys Sounds');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sys-sounds-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => app\config\widgets\SerialColumn::class],
//            'id',
            'module_id',
            'title',
            'file',
            ['class' => app\config\widgets\ActionColumn::class],
        ],
    ]); ?>
</div>