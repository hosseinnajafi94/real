<?php
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\administration\models\VML\DosipSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('administration', 'Dosips');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosip-index card">
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
                    ['class' => \app\config\widgets\SerialColumn::class],
                    [
                    'attribute' => 'type_id',
                    'value'     => function ($model) {
                        return $model->type_id == 1 ? 'لیست سفید' : 'لیست سیاه';
                    }
                ],
                'ip',
                'sub_net',
                    ['class' => app\config\widgets\ActionColumn::class],
            ],
        ]);
        ?>
    </div>
</div>
