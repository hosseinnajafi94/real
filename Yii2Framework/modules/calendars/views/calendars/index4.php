<?php
use yii\bootstrap4\Html;
use yii\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\ActionColumn;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $data \yii\data\ActiveDataProvider */
/* @var $search \app\modules\calendars\models\VML\CalendarsSearchVML */
?>
<p>
    <?= Html::a(Yii::t('app', 'Create'), ['/calendars/requirements/create'], ['class' => 'btn btn-sm mb-1 btn-success']) ?>
</p>
<?php
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
        [
            'class' => ActionColumn::class,
            'template' => '{delete}',
            'urlCreator' => function ($action, $model) {
                if ($action === 'delete') {
                    return Url::to(['/calendars/requirements/delete', 'id' => $model->id]);
                }
            },
        ],
    ],
]);
Pjax::end();