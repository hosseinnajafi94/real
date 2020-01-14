<?php
use yii\bootstrap4\Html;
use yii\widgets\Pjax;
use app\config\widgets\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $data \yii\data\ActiveDataProvider */
/* @var $search \app\modules\calendars\models\VML\CalendarsSearchVML */
?>
<p>
    <?= Html::a(Yii::t('app', 'Create'), ['/calendars/requirements/create'], ['class' => 'btn btn-sm mb-1 btn-success']) ?>
</p>
<?php
Pjax::begin([
    'id' => 'list4'
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
            'template' => '{delete}',
            'buttons' => [
                'delete' => function ($url, $model) {
                    return Html::a('<i class="fa fa-times"></i>', ['/calendars/requirements/delete', 'id' => $model->id], ['class' => 'ajaxDelete', 'data' => ['pjax' => 0, 'container' => 'list4', 'confirm2' => Yii::t('app', 'Are you sure?')]]);
                },
            ],
        ],
    ],
]);
Pjax::end();