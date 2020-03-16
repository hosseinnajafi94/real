<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\administration\models\VML\IpaccessesItemsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('administration', 'Ipaccesses Items');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ipaccesses-items-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <p>
<?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                    ['class' => 'yii\grid\SerialColumn'],
                'parent_id',
                'id_range',
                'description',
                'datetime',
                //'created_by',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
    </div>
</div>
