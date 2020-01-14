<?php
use yii\bootstrap4\Html;
use yii\widgets\Pjax;
use app\config\widgets\GridView;
use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
/* @var $this \yii\web\View */
/* @var $data \yii\data\ActiveDataProvider */
/* @var $search \app\modules\calendars\models\VML\CalendarsSearchVML */
Pjax::begin([
    'id' => 'list2'
]);

echo GridView::widget([
    'layout'         => '
        {items}
        {summary}
        {pager}
    ',
    'summaryOptions' => ['class' => 'summary pull-right'],
    'pager'          => [
        'options'                       => ['class' => 'pagination pagination-sm pull-left', 'style' => 'margin-left: 2px;'],
        'linkContainerOptions'          => ['class' => 'page-item'],
        'linkOptions'                   => ['class' => 'page-link'],
        'disabledListItemSubTagOptions' => ['class' => 'page-link disabled']
    ],
    'dataProvider'   => $data,
    'filterModel'    => $search,
    'columns'        => [
        ['class' => 'yii\grid\SerialColumn', 'header' => 'ردیف'],
        'title',
        [
            'class' => ActionColumn::class,
            'buttons' => [
                'delete' => function ($url) {
                    return Html::a('<i class="fa fa-times"></i>', $url, ['class' => 'ajaxDelete', 'data' => ['pjax' => 0, 'container' => 'list2', 'confirm2' => Yii::t('app', 'Are you sure?')]]);
                },
                'update' => function ($url, $model) {
                    return '<a href="' . $url . '" title="بروز رسانی" data-pjax="0"><span class="fa fa-pencil"></span></a>';
                },
                'view' => function ($url) {
                    return '<a href="' . $url . '" class="view" title="جزئیات" data-pjax="0"><span class="fa fa-eye"></span></a>';
                },
            ],
        ],
    ],
]);

Pjax::end();
