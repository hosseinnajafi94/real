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
/* @var $model app\modules\users\models\DAL\Users */
$this->title = $model->fname . ' ' . $model->lname;
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
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#page1">اطلاعات خصوصی</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page2">اطلاعات تماسی</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page3">دسترسی ها</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page4">گروه ها</a></li>
            <li class="nav-item d-none"><a class="nav-link" data-toggle="tab" href="#page5">کاربران مرتبط</a></li>
            <li class="nav-item d-none"><a class="nav-link" data-toggle="tab" href="#page6">کاربران با دسترسی دیدن</a></li>
            <li class="nav-item d-none"><a class="nav-link" data-toggle="tab" href="#page7">امنیت</a></li>
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
                <?= DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        'fname',
                        'lname',
                        'codemelli',
                        'birthday:jdate',
                        [
                            'attribute' => 'status_id',
                            'pattern'   => '{title}'
                        ],
                        [
                            'attribute' => 'gender_id',
                            'pattern'   => '{title}'
                        ],
                        'email',
                        'mobile',
                        'username',
                        [
                            'attribute' => 'language_id',
                            'pattern'   => '{title}'
                        ],
                        'rtl:bool',
                        [
                            'attribute' => 'calendar_type_id',
                            'value'   => function ($model) {
                                return $model->calendarType ? $model->calendarType->title : null;
                            }
                        ],
                        [
                            'attribute' => 'date_type_id',
                            'value'   => function ($model) {
                                return $model->dateType ? $model->dateType->title : null;
                            }
                        ],
                        [
                            'attribute' => 'first_day_in_week_id',
                            'value'   => function ($model) {
                                return $model->firstDayInWeek ? $model->firstDayInWeek->title : null;
                            }
                        ],
                        [
                            'attribute' => 'number_format_id',
                            'value'   => function ($model) {
                                return $model->numberFormat ? $model->numberFormat->title : null;
                            }
                        ],
                        [
                            'attribute' => 'timezone_id',
                            'value'   => function ($model) {
                                return $model->timezone ? $model->timezone->title : null;
                            }
                        ],
                        [
                            'attribute' => 'daylight_state_id',
                            'value'   => function ($model) {
                                return $model->daylightState ? $model->daylightState->title : null;
                            }
                        ],
                        [
                            'attribute' => 'from_month_id',
                            'value'   => function ($model) {
                                return $model->fromMonth ? $model->fromMonth->title : null;
                            }
                        ],
                        [
                            'attribute' => 'from_day_id',
                            'value'   => function ($model) {
                                return $model->fromDay ? $model->fromDay->title : null;
                            }
                        ],
                        [
                            'attribute' => 'to_month_id',
                            'value'   => function ($model) {
                                return $model->toMonth ? $model->toMonth->title : null;
                            }
                        ],
                        [
                            'attribute' => 'to_day_id',
                            'value'   => function ($model) {
                                return $model->toDay ? $model->toDay->title : null;
                            }
                        ],
                        'use_sip:bool',
                        [
                            'attribute' => 'mode_use_sip_id',
                            'value'   => function ($model) {
                                return $model->modeUseSip ? $model->modeUseSip->title : null;
                            }
                        ],
                        'show_lang:bool',
                    ],
                ]) ?>
            </div>
            <div class="tab-pane" id="page2">
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
                <?= DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        'nationality',
                        [
                            'attribute' => 'province_id',
                            'pattern'   => '{title}'
                        ],
                        [
                            'attribute' => 'city_id',
                            'pattern'   => '{title}'
                        ],
                        'address',
                        'mobile',
                        'phone',
                        'email',
                    ],
                ]) ?>
            </div>
            <div class="tab-pane" id="page3">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), null, ['class' => 'btn btn-sm btn-success add-permission']) ?>
                </p>
                <?php Pjax::begin(['id' => 'pjax3']) ?>
                <?=
                GridView::widget([
                    'id'             => 'grid3',
                    'layout'         => '
                        {items}
                        <div class="pull-right" style="margin-left: 15px;">
                            <label class="m-0">تعداد نمایش: </label>
                            ' . Html::activeDropDownList($searchModel3, 'perpage', [10 => 10, 20 => 20, 50 => 50, 100 => 100], [
                        'id'    => 'per-page3',
                        'class' => 'form-control form-control-sm',
                        'style' => 'width: auto;display: inline-block;'
                    ]) . '
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
                            'attribute' => 'module_id',
                            'pattern' => '{name}'
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
                ])
                ?>
                <?php Pjax::end() ?>
            </div>
            <div class="tab-pane" id="page4">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), null, ['class' => 'btn btn-sm btn-success add-user']) ?>
                </p>
                <?php Pjax::begin(['id' => 'pjax4']) ?>
                <?= GridView::widget([
                    'id'             => 'grid4',
                    'layout'         => '
                        {items}
                        <div class="pull-right" style="margin-left: 15px;">
                            <label class="m-0">تعداد نمایش: </label>
                            ' . 
                            Html::activeDropDownList($searchModel4, 'perpage', [10 => 10, 20 => 20, 50 => 50, 100 => 100], [
                                'id'    => 'per-page4',
                                'class' => 'form-control form-control-sm',
                                'style' => 'width: auto;display: inline-block;'
                            ]) .
                            '
                        </div>
                        {summary}
                        ' . Html::a('حذف', ['delete-all4'], ['class' => 'btn btn-sm btn-danger pull-left deleteAll disabled', 'style' => 'margin: 0;margin-right: 5px;', 'data' => ['pjax' => 0]]) . '
                        {pager}
                        <div class="clearfix"></div>
                    ',
                    'filterSelector' => '#per-page4',
                    'dataProvider'   => $dataProvider4,
                    'filterModel'    => $searchModel4,
                    'columns'        => [
                        ['class' => SerialColumn::class],
                        [
                            'attribute' => 'group_id',
                            'pattern' => '{name}'
                        ],
                        ['class' => CheckboxColumn::class],
                        [
                            'class'    => ActionColumn::class,
                            'template' => '{delete}',
                            'buttons' => [
                                'delete' => function ($url, $model) {
                                    return Html::a('<i class="fa fa-times"></i>', ['delete4', 'id' => $model->id], ['class' => 'delete4', 'data' => ['pjax' => 0]]);
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
    $form3 = ActiveForm::begin(['id' => 'form3', 'action' => ['create3']]);
    Modal::begin([
        'id' => 'modal3',
        'title' => 'افزودن ماژول',
        'footer' => Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success'])
    ]);
    echo Html::activeHiddenInput($model3, 'user_id');
    echo $form3->field($model3, 'module_id')->select2($modules);
    Modal::end();
    ActiveForm::end();
    $this->params['modals'][] = ob_get_clean();
}
if (true) {
    ob_start();
    $form4 = ActiveForm::begin(['id' => 'form4', 'action' => ['create4']]);
    Modal::begin([
        'id' => 'modal4',
        'title' => 'افزودن گروه',
        'footer' => Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success'])
    ]);
    echo Html::activeHiddenInput($model4, 'user_id');
    echo $form4->field($model4, 'group_id')->select2($groups);
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
    $('#modal3').modal('show');
});
$(document).on('click', '.add-user', function (e) {
    e.preventDefault();
    $('#modal4').modal('show');
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
$(document).on('submit', '#form4', function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var data = new FormData(this);
    ajaxpost(url, data, function (result) {
        var isValid = validResult(result);
        if (isValid) {
            $('#modal4').modal('hide');
            $.pjax.reload({async: false, container: '#pjax4'});
        }
    }, undefined, undefined, undefined, true);
});
$(document).on('change', '#grid3 [name=\"selection[]\"]', function () {
    $('#grid3 .deleteAll').removeClass('disabled');
    var items = $('#grid3 [name=\"selection[]\"]:checked');
    if (items.length === 0) {
        $('#grid3 .deleteAll').addClass('disabled');
    }
});
$(document).on('change', '#grid4 [name=\"selection[]\"]', function () {
    $('#grid4 .deleteAll').removeClass('disabled');
    var items = $('#grid4 [name=\"selection[]\"]:checked');
    if (items.length === 0) {
        $('#grid4 .deleteAll').addClass('disabled');
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
$(document).on('click', '#grid4 .deleteAll', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    var ids = $('#grid4').yiiGridView('getSelectedRows');
    if (confirm('" . Yii::t('app', 'Are you sure?') . "')) {
        ajaxget(url, {ids}, function () {
            $.pjax.reload({async: false, container: '#pjax4'});
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
$(document).on('click', '.delete4', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    if (confirm('" . Yii::t('app', 'Are you sure?') . "')) {
        ajaxget(url, {}, function () {
            $.pjax.reload({async: false, container: '#pjax4'});
        });
    }
});
");
