<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use app\config\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\ActionColumn;
use app\config\widgets\SerialColumn;
use app\config\widgets\CheckboxColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\organizations\models\VML\OrganizationsListYearsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('organizations', 'دوره مالی');
?>
<div class="accounting-organizations-years card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
        <p></p>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
            <?= Html::a(Yii::t('app', 'Create'), ['create', 'id' => $id], ['class' => 'btn btn-sm btn-success']) ?>
        </p>
        <?php Pjax::begin(['id' => 'pjax']); ?>
        <div class="table-responsive">
            <?= GridView::widget([
                'id' => 'grid',
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
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => SerialColumn::class],
                    'title',
                    [
                        'attribute' => 'type_id',
                        'filter' => Html::activeDropDownList($searchModel, 'type_id', $types, ['class' => 'form-control form-control-sm', 'prompt' => '']),
                        'pattern' => '{title}'
                    ],
                    'start_date:jdate',
                    'end_date:jdate',
                    'sanad:boolean',
                    ['class' => CheckboxColumn::class],
                    ['class' => ActionColumn::class, 'template' => '{update} {delete}'],
                ],
            ]); ?>
        </div>
        <a class="btn btn-sm btn-danger mb-0 pull-left disabled deleteAll" data-url="<?= Url::to(['delete-all']) ?>" data-message="<?= Yii::t('app', 'Are you sure?') ?>">حذف</a>
        <script>
            if (typeof $ !== 'undefined') {
                $('[name="OrganizationsListYearsSearchVML[start_date]"]').MdPersianDateTimePicker({
                    targetTextSelector: '[name="OrganizationsListYearsSearchVML[start_date]"]',
                    isGregorian: false,
                    yearOffset: 60,
                    placement: 'right',
                    englishNumber: true,
                }).on('hide.bs.popover', function (e) {
                    var start_date = parseInt($('[name="OrganizationsListYearsSearchVML[start_date]"]').val().toString().replace(/\//g, ''));
                    var end_date = parseInt($('[name="OrganizationsListYearsSearchVML[end_date]"]').val().toString().replace(/\//g, ''));
                    if (!isNaN(end_date)) {
                        if (start_date > end_date) {
                            alert('تاریخ شروع نمی تواند بزرگتر از تاریخ پایان باشد.');
                        }
                    }
                });
                $('[name="OrganizationsListYearsSearchVML[end_date]"]').MdPersianDateTimePicker({
                    targetTextSelector: '[name="OrganizationsListYearsSearchVML[end_date]"]',
                    isGregorian: false,
                    yearOffset: 60,
                    placement: 'right',
                    englishNumber: true,
                }).on('hide.bs.popover', function (e) {
                    var start_date = parseInt($('[name="OrganizationsListYearsSearchVML[start_date]"]').val().toString().replace(/\//g, ''));
                    var end_date = parseInt($('[name="OrganizationsListYearsSearchVML[end_date]"]').val().toString().replace(/\//g, ''));
                    if (!isNaN(end_date)) {
                        if (start_date > end_date) {
                            alert(' تاریخ پایان نمی تواند کوچکتر از تاریخ شروع باشد.');
                        }
                    }
                });
            }
        </script>
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
    $('[name=\"OrganizationsListYearsSearchVML[start_date]\"]').MdPersianDateTimePicker({
        targetTextSelector: '[name=\"OrganizationsListYearsSearchVML[start_date]\"]',
        isGregorian: false,
        yearOffset: 60,
        placement: 'right',
        englishNumber: true,
    }).on('hide.bs.popover', function (e) {
        var start_date = parseInt($('[name=\"OrganizationsListYearsSearchVML[start_date]\"]').val().toString().replace(/\//g, ''));
        var end_date = parseInt($('[name=\"OrganizationsListYearsSearchVML[end_date]\"]').val().toString().replace(/\//g, ''));
        if (!isNaN(end_date)) {
            if (start_date > end_date) {
                alert('تاریخ شروع نمی تواند بزرگتر از تاریخ پایان باشد.');
            }
        }
    });
    $('[name=\"OrganizationsListYearsSearchVML[end_date]\"]').MdPersianDateTimePicker({
        targetTextSelector: '[name=\"OrganizationsListYearsSearchVML[end_date]\"]',
        isGregorian: false,
        yearOffset: 60,
        placement: 'right',
        englishNumber: true,
    }).on('hide.bs.popover', function (e) {
        var start_date = parseInt($('[name=\"OrganizationsListYearsSearchVML[start_date]\"]').val().toString().replace(/\//g, ''));
        var end_date = parseInt($('[name=\"OrganizationsListYearsSearchVML[end_date]\"]').val().toString().replace(/\//g, ''));
        if (!isNaN(end_date)) {
            if (start_date > end_date) {
                alert(' تاریخ پایان نمی تواند کوچکتر از تاریخ شروع باشد.');
            }
        }
    });
");