<?php
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
use app\config\widgets\SerialColumn;
use app\config\widgets\ActionColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\administration\models\VML\DosipSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('administration', 'Ipaccesses');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="administration-access-index card">
    <div class="card-block p-1">
        <ul class="nav nav-tabs hidden-print">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#page1"><?= Yii::t('administration', 'Ipaccesses') ?></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page2"><?= Yii::t('administration', 'Geoips') ?></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page3"><?= Yii::t('administration', 'Dosips') ?></a></li>
        </ul>
        <div class="tab-content p-0 pt-1">
            <div class="tab-pane active show" id="page1">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider1,
                    'filterModel'  => $searchModel1,
                    'columns'      => [
                        ['class' => SerialColumn::class],
                        'title',
                        ['class' => ActionColumn::class],
                    ],
                ]) ?>
            </div>
            <div class="tab-pane" id="page2">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider2,
                    'filterModel'  => $searchModel2,
                    'columns'      => [
                        ['class' => SerialColumn::class],
                        'country_id',
                        ['class' => ActionColumn::class],
                    ],
                ]) ?>
            </div>
            <div class="tab-pane" id="page3">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider3,
                    'filterModel'  => $searchModel3,
                    'columns'      => [
                        ['class' => SerialColumn::class],
                        [
                            'attribute' => 'type_id',
                            'value'     => function ($model) {
                                return $model->type_id == 1 ? 'لیست سفید' : 'لیست سیاه';
                            }
                        ],
                        'ip',
                        'sub_net',
                        ['class' => ActionColumn::class],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
