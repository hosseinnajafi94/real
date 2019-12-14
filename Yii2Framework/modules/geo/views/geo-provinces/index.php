<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel \app\modules\geo\models\VML\GeoProvincesSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = Yii::t('geo', 'Provinces');
?>
<div class="geo-geo-provinces-index box">
    <div class="box-header"><?= Yii::t('geo', 'Provinces') ?></div>
    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success view with-btn modalsm nolayout']) ?>
    </p>
    <div class="table-responsive">
        <?php Pjax::begin() ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'title',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => [
                        'view' => function ($url) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['class' => 'view', 'title' => Yii::t('app', 'Details'), 'data' => ['pjax' => 0]]);
                        },
                        'update' => function ($url) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['class' => 'view with-btn modalsm nolayout', 'title' => Yii::t('app', 'Update'), 'data' => ['pjax' => 0]]);
                        },
                    ]
                ],
            ],
        ]) ?>
        <?php Pjax::end() ?>
    </div>
</div>