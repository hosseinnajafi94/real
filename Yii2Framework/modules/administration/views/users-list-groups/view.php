<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use app\config\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\ActiveForm;
use app\config\widgets\DetailView;
use app\config\widgets\SerialColumn;
use app\config\widgets\ActionColumn;
use app\config\widgets\CheckboxColumn;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\UsersListGroups */
$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('administration', 'Users Groups'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
?>
<div class="users-groups-view card">
    <div class="card-header d-none">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block p-1">
        <ul class="nav nav-tabs hidden-print">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#page1">جزئیات</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page2">دسترسی ها</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page3">کاربران</a></li>
            <li class="nav-item d-none"><a class="nav-link" data-toggle="tab" href="#page4">کاربران با دسترسی دیدن</a></li>
            <li class="nav-item d-none"><a class="nav-link" data-toggle="tab" href="#page5">امنیت</a></li>
        </ul>
        <div class="tab-content p-0 pt-1">
            <div class="tab-pane active show" id="page1">
                <p>
                    <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
                    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?=
                    Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-sm btn-danger',
                        'data'  => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method'  => 'post',
                        ],
                    ])
                    ?>
                </p>
                <?=
                DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        'name',
                            [
                            'attribute' => 'admin_id',
                            'pattern'   => '{fname} {lname}'
                        ],
                    ],
                ])
                ?>
            </div>
            <div class="tab-pane" id="page2">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), null, ['class' => 'btn btn-sm btn-success add-permission']) ?>
                </p>
                <?php Pjax::begin(['id' => 'pjax2']) ?>
                <?=
                GridView::widget([
                    'id'             => 'grid2',
                    'layout'         => '
                        {items}
                        <div class="pull-right" style="margin-left: 15px;">
                            <label class="m-0">تعداد نمایش: </label>
                            ' . Html::activeDropDownList($searchModel2, 'perpage', [10 => 10, 20 => 20, 50 => 50, 100 => 100], [
                        'id'    => 'per-page2',
                        'class' => 'form-control form-control-sm',
                        'style' => 'width: auto;display: inline-block;'
                    ]) . '
                        </div>
                        {summary}
                        ' . Html::a('حذف', ['delete-all2'], ['class' => 'btn btn-sm btn-danger pull-left deleteAll disabled', 'style' => 'margin: 0;margin-right: 5px;', 'data' => ['pjax' => 0]]) . '
                        {pager}
                        <div class="clearfix"></div>
                    ',
                    'filterSelector' => '#per-page2',
                    'dataProvider'   => $dataProvider2,
                    'filterModel'    => $searchModel2,
                    'columns'        => [
                        ['class' => SerialColumn::class],
                        [
                            'attribute' => 'module_id',
                            'pattern'   => '{name}'
                        ],
                        ['class' => CheckboxColumn::class],
                        [
                            'class'    => ActionColumn::class,
                            'template' => '{delete}',
                            'buttons' => [
                                'delete' => function ($url, $model) {
                                    return Html::a('<i class="fa fa-times"></i>', ['delete2', 'id' => $model->id], ['class' => 'delete2', 'data' => ['pjax' => 0]]);
                                }
                            ]
                        ],
                    ],
                ])
                ?>
                <?php Pjax::end() ?>
            </div>
            <div class="tab-pane" id="page3">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), null, ['class' => 'btn btn-sm btn-success add-user']) ?>
                </p>
                <?php Pjax::begin(['id' => 'pjax3']) ?>
                <?= GridView::widget([
                    'id'             => 'grid3',
                    'layout'         => '
                        {items}
                        <div class="pull-right" style="margin-left: 15px;">
                            <label class="m-0">تعداد نمایش: </label>
                            ' . 
                            Html::activeDropDownList($searchModel3, 'perpage', [10 => 10, 20 => 20, 50 => 50, 100 => 100], [
                                'id'    => 'per-page3',
                                'class' => 'form-control form-control-sm',
                                'style' => 'width: auto;display: inline-block;'
                            ]) .
                            '
                        </div>
                        {summary}
                        ' . Html::a('حذف', ['delete-all3'], ['class' => 'btn btn-sm btn-danger pull-left deleteAll disabled', 'style' => 'margin: 0;margin-right: 5px;', 'data' => ['pjax' => 0]]) . '
                        {pager}
                        <div class="clearfix"></div>
                    ',
                    'filterSelector' => '#per-page3',
                    'dataProvider'   => $dataProvider3,
                    'filterModel'    => $searchModel3,
                    'columns'        => [
                        ['class' => SerialColumn::class],
                        [
                            'attribute' => 'user_id',
                            'pattern'   => '{fname} {lname}'
                        ],
                        ['class' => CheckboxColumn::class],
                        [
                            'class'    => ActionColumn::class,
                            'template' => '{delete}',
                            'buttons' => [
                                'delete' => function ($url, $model) {
                                    return Html::a('<i class="fa fa-times"></i>', ['delete3', 'id' => $model->id], ['class' => 'delete3', 'data' => ['pjax' => 0]]);
                                }
                            ]
                        ],
                    ],
                ]) ?>
                <?php Pjax::end() ?>
            </div>
        </div>
    </div>
</div>
<?php
if (true) {
    ob_start();
    $form2 = ActiveForm::begin(['id' => 'form2', 'action' => ['create2']]);
    Modal::begin([
        'id' => 'modal2',
        'title' => 'افزودن ماژول',
        'footer' => Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success'])
    ]);
    echo Html::activeHiddenInput($model2, 'group_id');
    echo $form2->field($model2, 'module_id')->select2($modules);
    Modal::end();
    ActiveForm::end();
    $this->params['modals'][] = ob_get_clean();
}
if (true) {
    ob_start();
    $form3 = ActiveForm::begin(['id' => 'form3', 'action' => ['create3']]);
    Modal::begin([
        'id' => 'modal3',
        'title' => 'افزودن کاربر',
        'footer' => Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success'])
    ]);
    echo Html::activeHiddenInput($model3, 'group_id');
    echo $form3->field($model3, 'user_id')->select2($users);
    Modal::end();
    ActiveForm::end();
    $this->params['modals'][] = ob_get_clean();
}

$this->registerCss("
.modal-body, .modal-header, .modal-footer {
  padding: 5px 15px !important;
}
");
$this->registerJs("
$(document).on('click', '.add-permission', function (e) {
    e.preventDefault();
    $('#modal2').modal('show');
});
$(document).on('click', '.add-user', function (e) {
    e.preventDefault();
    $('#modal3').modal('show');
});
$(document).on('submit', '#form2', function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var data = new FormData(this);
    ajaxpost(url, data, function (result) {
        var isValid = validResult(result);
        if (isValid) {
            $('#modal2').modal('hide');
            $.pjax.reload({async: false, container: '#pjax2'});
        }
    }, undefined, undefined, undefined, true);
});
$(document).on('submit', '#form3', function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var data = new FormData(this);
    ajaxpost(url, data, function (result) {
        var isValid = validResult(result);
        if (isValid) {
            $('#modal3').modal('hide');
            $.pjax.reload({async: false, container: '#pjax3'});
        }
    }, undefined, undefined, undefined, true);
});
$(document).on('change', '#grid2 [name=\"selection[]\"]', function () {
    $('#grid2 .deleteAll').removeClass('disabled');
    var items = $('#grid2 [name=\"selection[]\"]:checked');
    if (items.length === 0) {
        $('#grid2 .deleteAll').addClass('disabled');
    }
});
$(document).on('change', '#grid3 [name=\"selection[]\"]', function () {
    $('#grid3 .deleteAll').removeClass('disabled');
    var items = $('#grid3 [name=\"selection[]\"]:checked');
    if (items.length === 0) {
        $('#grid3 .deleteAll').addClass('disabled');
    }
});
$(document).on('click', '#grid2 .deleteAll', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    var ids = $('#grid2').yiiGridView('getSelectedRows');
    if (confirm('" . Yii::t('app', 'Are you sure?') . "')) {
        ajaxget(url, {ids}, function () {
            $.pjax.reload({async: false, container: '#pjax2'});
        });
    }
});
$(document).on('click', '#grid3 .deleteAll', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    var ids = $('#grid3').yiiGridView('getSelectedRows');
    if (confirm('" . Yii::t('app', 'Are you sure?') . "')) {
        ajaxget(url, {ids}, function () {
            $.pjax.reload({async: false, container: '#pjax3'});
        });
    }
});
$(document).on('click', '.delete2', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    if (confirm('" . Yii::t('app', 'Are you sure?') . "')) {
        ajaxget(url, {}, function () {
            $.pjax.reload({async: false, container: '#pjax2'});
        });
    }
});
$(document).on('click', '.delete3', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    if (confirm('" . Yii::t('app', 'Are you sure?') . "')) {
        ajaxget(url, {}, function () {
            $.pjax.reload({async: false, container: '#pjax3'});
        });
    }
});
");
