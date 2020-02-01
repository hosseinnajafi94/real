<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use app\config\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\SerialColumn;
use app\config\widgets\CheckboxColumn;
use app\config\widgets\ActionColumn;
use app\modules\accounting\models\DAL\AccountingListSymbols;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\accounting\models\VML\AccountingListSymbolsSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('accounting', 'Accounting List Symbols');
?>
<div class="accounting-accounting-list-symbols-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </p>
        <?php Pjax::begin(['id' => 'pjax']); ?>
        <div class="table-responsive">
            <?= GridView::widget([
                'id'             => 'grid',
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
                'dataProvider'   => $dataProvider,
                'filterModel'    => $searchModel,
                'columns'        => [
                    ['class' => SerialColumn::class],
                    'title',
                    'short_title',
                    'code_id',
                    'decimal_count',
                    'fee_decimal_count',
                    'is_active:boolean',
                    'auto_update:boolean',
                    ['class' => CheckboxColumn::class],
                    [
                        'class'          => ActionColumn::class,
                        'template'       => '{up} {down} {view} {update} {delete}',
                        'visibleButtons' => [
                            'up' => function ($model) {
                                $prev = AccountingListSymbols::find()->where("sort < $model->sort")->orderBy(['sort' => SORT_DESC])->limit(1)->one();
                                return $prev != null;
                            },
                            'down'           => function ($model) {
                                $next = AccountingListSymbols::find()->where("sort > $model->sort")->orderBy(['sort' => SORT_ASC])->limit(1)->one();
                                return $next != null;
                            }
                        ]
                    ],
                ],
            ]) ?>
        </div>
        <a class="btn btn-sm btn-danger mb-0 pull-left disabled deleteAll" data-url="<?= Url::to(['delete-all']) ?>" data-message="<?= Yii::t('app', 'Are you sure?') ?>">حذف</a>
        <?php Pjax::end(); ?>
    </div>
</div>
<?php
$this->registerJs("
    $(document).on('change', '.grid-view tbody input:checkbox', function () {
        $('.deleteAll').removeClass('disabled');
        if ($('.grid-view tbody input:checkbox:checked').length === 0) {
            $('.deleteAll').addClass('disabled');
        }
    });
    $(document).on('click', '.deleteAll', function () {
        var url     = $(this).data('url');
        var message = $(this).data('message');
        var ids     = $('#grid').yiiGridView('getSelectedRows');
        if (ids.length > 0 && confirm(message)) {
            ajaxget(url, {ids}, function () {
                $.pjax.reload({container:'#pjax'});
            });
        }
    });
");
?>