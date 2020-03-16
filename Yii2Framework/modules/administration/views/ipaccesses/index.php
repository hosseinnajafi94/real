<?php
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\administration\models\VML\IpaccessesSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('administration', 'Ipaccesses');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ipaccesses-index card">
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
                'title',
                    ['class' => app\config\widgets\ActionColumn::class],
            ],
        ]);
        ?>


    </div>
</div>
