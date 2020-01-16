<?php
use yii\bootstrap4\Html;
use yii\widgets\Pjax;
use app\config\widgets\GridView;
use yii\grid\ActionColumn;
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
        ['class' => 'yii\grid\CheckboxColumn'],
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
echo Html::a('حذف', null, ['class' => 'btn btn-sm btn-danger list4DeleteAll pull-left disabled']);
Pjax::end();

$this->registerCss("
    #list4 thead th {padding: 5px 13px !important;}
");
$this->registerJs("
    $(document).on('change', '#list4 [name=\"selection[]\"]', function () {
        $('.list4DeleteAll').removeClass('disabled');
        var items = $('#list4 [name=\"selection[]\"]:checked');
        if (items.length === 0) {
            $('.list4DeleteAll').addClass('disabled');
        }
    });
    $(document).on('click', '.list4DeleteAll', function (e) {
        var ids = $('#list4 .grid-view').yiiGridView('getSelectedRows');
        if (confirm('" . Yii::t('app', 'Are you sure?') . "')) {
            ajaxget('" . yii\helpers\Url::to(['/calendars/requirements/delete-all']) . "', {ids}, function () {
                $.pjax.reload({container: '#list4', async: false});
            });
        }
    });
");