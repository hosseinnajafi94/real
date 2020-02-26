<?php
use yii\bootstrap4\Html;
use app\config\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\SerialColumn;
use app\config\widgets\ActionColumn;
use app\config\widgets\CheckboxColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\administration\models\VML\UsersListGroupsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('administration', 'Users Groups');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-groups-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
        <p></p>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </p>
        <div class="table-responsive">
            <?php Pjax::begin(['id' => 'pjax']) ?>
            <?= GridView::widget([
                'id'     => 'grid',
                'layout' => '
                    {items}
                    <div class="pull-right" style="margin-left: 15px;">
                        <label class="m-0">تعداد نمایش: </label>
                        ' . Html::dropDownList(
                            'per-page',
                            $dataProvider->pagination->pageSize,
                            [10 => 10, 20 => 20, 50 => 50, 100 => 100],
                            ['id'=>'per-page', 'class' => 'form-control form-control-sm', 'style' => 'width: auto;display: inline-block;']
                        ) . '
                    </div>
                    {summary}
                    ' . Html::a('حذف', ['delete-all'], ['class' => 'btn btn-sm btn-danger pull-left deleteAll disabled', 'style' => 'margin: 0;margin-right: 5px;', 'data' => ['pjax' => 0]]) . '
                    {pager}
                    <div class="clearfix"></div>
                ',
                'filterSelector' => '#per-page',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => SerialColumn::class],
                    'name',
                    [
                        'attribute' => 'admin_id',
                        'filter'    => Html::activeDropDownList($searchModel, 'admin_id', $users, ['class' => 'form-control form-control-sm', 'prompt' => '']),
                        'pattern'   => '{fname} {lname}'
                    ],
                    ['class' => CheckboxColumn::class],
                    ['class' => ActionColumn::class],
                ],
            ]) ?>
            <?php Pjax::end() ?>
        </div>
    </div>
</div>
<?php
$this->registerJs("
$(document).on('change', '#grid [name=\"selection[]\"]', function () {
    $('.deleteAll').removeClass('disabled');
    var items = $('#grid [name=\"selection[]\"]:checked');
    if (items.length === 0) {
        $('.deleteAll').addClass('disabled');
    }
});
$(document).on('click', '.deleteAll', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    var ids = $('#grid').yiiGridView('getSelectedRows');
    if (confirm('" . Yii::t('app', 'Are you sure?') . "')) {
        ajaxget(url, {ids}, function () {
            $.pjax.reload({async: false, container: '#pjax'});
        });
    }
});
");