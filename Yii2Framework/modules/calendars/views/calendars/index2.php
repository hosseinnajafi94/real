<?php
use yii\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\ActionColumn;
/* @var $this \yii\web\View */
/* @var $data \yii\data\ActiveDataProvider */
/* @var $search \app\modules\calendars\models\VML\CalendarsSearchVML */
Pjax::begin();

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
        ['class' => 'yii\grid\SerialColumn'],
        'title',
        ['class' => ActionColumn::class],
    ],
]);

Pjax::end();
