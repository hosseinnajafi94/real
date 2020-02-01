<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use app\config\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\ActiveForm;
use app\config\widgets\SerialColumn;
use app\config\widgets\ActionColumn;
use app\config\widgets\CheckboxColumn;
/* @var $this yii\web\View */
/* @var $model app\modules\accounting\models\DAL\AccountingFormats */
/* @var $searchModel1 app\modules\accounting\models\VML\AccountingFormatsSearchModel */
/* @var $dataProvider1 yii\data\ActiveDataProvider */
/* @var $searchModel2 app\modules\accounting\models\VML\AccountingFormatsSearchModel */
/* @var $dataProvider2 yii\data\ActiveDataProvider */
/* @var $searchModel3 app\modules\accounting\models\VML\AccountingFormatsSearchModel */
/* @var $dataProvider3 yii\data\ActiveDataProvider */
/* @var $searchModel4 app\modules\accounting\models\VML\AccountingFormatsSearchModel */
/* @var $dataProvider4 yii\data\ActiveDataProvider */
/* @var $searchModel5 app\modules\accounting\models\VML\AccountingFormatsSearchModel */
/* @var $dataProvider5 yii\data\ActiveDataProvider */
/* @var $searchModel6 app\modules\accounting\models\VML\AccountingFormatsSearchModel */
/* @var $dataProvider6 yii\data\ActiveDataProvider */
/* @var $items array */
$this->title = Yii::t('accounting', 'Accounting Formats');
?>
<div class="accounting-accounting-formats-index card">
    <div class="card-block p-1">
        <ul class="nav nav-tabs hidden-print">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#page1">حساب ها</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page2">اشخاص</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page3">شناور</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page4">مراکز هزینه</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page5">مراکز درآمد</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page6">پروژه ها</a></li>
        </ul>
        <div class="tab-content p-0 pt-1">
            <div class="tab-pane active show" id="page1">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success create', 'data' => ['type' => 1]]) ?>
                </p>
                <?php Pjax::begin(['id' => 'pjax1']); ?>
                <div class="table-responsive">
                    <?= GridView::widget([
                        'id'             => 'grid1',
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
                        'dataProvider'   => $dataProvider1,
                        'filterModel'    => $searchModel1,
                        'columns'        => [
                            ['class' => SerialColumn::class],
                            'format_title',
                            'length',
                            [
                                'attribute' => 'format_id',
                                'pattern'   => '{title}',
                                'filter'    => Html::activeDropDownList($searchModel1, 'format_id', $items['format_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            [
                                'attribute' => 'order_id',
                                'pattern'   => '{title}',
                                'filter'    => Html::activeDropDownList($searchModel1, 'order_id', $items['order_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            [
                                'attribute' => 'account_name_id',
                                'label'     => $searchModel1->getAttributeLabel('account_name_id'),
                                'value'     => function ($model) {
                                    return $model->accountName ? $model->accountName->title : null;
                                },
                                'filter' => Html::activeDropDownList($searchModel1, 'account_name_id', $items['account_name_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            ['class' => CheckboxColumn::class],
                            [
                                'class'    => ActionColumn::class,
                                'template' => '{update} {ajax-delete}',
                                'buttons'  => [
                                    'update' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-pencil"></i>', $url, [
                                            'data' => [
                                                'pjax'         => 0,
                                                'id'              => $model->id,
                                                'type_id'         => $model->type_id,
                                                'format_title'    => $model->format_title,
                                                'length'          => $model->length,
                                                'format_id'       => $model->format_id,
                                                'order_id'        => $model->order_id,
                                                'account_name_id' => $model->account_name_id,
                                            ],
                                            'class' => 'update'
                                        ]);
                                    }
                                ]
                            ],
                        ],
                    ]) ?>
                </div>
                <a class="btn btn-sm btn-danger mb-0 pull-left disabled deleteAll1" data-url="<?= Url::to(['delete-all']) ?>" data-message="<?= Yii::t('app', 'Are you sure?') ?>">حذف</a>
                <?php Pjax::end(); ?>
            </div>
            <div class="tab-pane" id="page2">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success create', 'data' => ['type' => 2]]) ?>
                </p>
                <?php Pjax::begin(['id' => 'pjax2']); ?>
                <div class="table-responsive">
                    <?= GridView::widget([
                        'id'             => 'grid2',
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
                        'dataProvider'   => $dataProvider2,
                        'filterModel'    => $searchModel2,
                        'columns'        => [
                            ['class' => SerialColumn::class],
                            'format_title',
                            'length',
                            [
                                'attribute' => 'format_id',
                                'pattern'   => '{title}',
                                'filter'    => Html::activeDropDownList($searchModel2, 'format_id', $items['format_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            [
                                'attribute' => 'order_id',
                                'pattern'   => '{title}',
                                'filter'    => Html::activeDropDownList($searchModel2, 'order_id', $items['order_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            [
                                'attribute' => 'account_name_id',
                                'label'     => $searchModel2->getAttributeLabel('account_name_id'),
                                'value'     => function ($model) {
                                    return $model->accountName ? $model->accountName->title : null;
                                },
                                'filter' => Html::activeDropDownList($searchModel2, 'account_name_id', $items['account_name_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            ['class' => CheckboxColumn::class],
                            [
                                'class'    => ActionColumn::class,
                                'template' => '{update} {ajax-delete}',
                                'buttons'  => [
                                    'update' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-pencil"></i>', $url, [
                                            'data' => [
                                                'pjax'         => 0,
                                                'id'              => $model->id,
                                                'type_id'         => $model->type_id,
                                                'format_title'    => $model->format_title,
                                                'length'          => $model->length,
                                                'format_id'       => $model->format_id,
                                                'order_id'        => $model->order_id,
                                                'account_name_id' => $model->account_name_id,
                                            ],
                                            'class' => 'update'
                                        ]);
                                    }
                                ]
                            ],
                        ],
                    ]) ?>
                </div>
                <a class="btn btn-sm btn-danger mb-0 pull-left disabled deleteAll2" data-url="<?= Url::to(['delete-all']) ?>" data-message="<?= Yii::t('app', 'Are you sure?') ?>">حذف</a>
                <?php Pjax::end(); ?>
            </div>
            <div class="tab-pane" id="page3">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success create', 'data' => ['type' => 3]]) ?>
                </p>
                <?php Pjax::begin(['id' => 'pjax3']); ?>
                <div class="table-responsive">
                    <?= GridView::widget([
                        'id'             => 'grid3',
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
                        'dataProvider'   => $dataProvider3,
                        'filterModel'    => $searchModel3,
                        'columns'        => [
                            ['class' => SerialColumn::class],
                            'format_title',
                            'length',
                            [
                                'attribute' => 'format_id',
                                'pattern'   => '{title}',
                                'filter'    => Html::activeDropDownList($searchModel3, 'format_id', $items['format_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            [
                                'attribute' => 'order_id',
                                'pattern'   => '{title}',
                                'filter'    => Html::activeDropDownList($searchModel3, 'order_id', $items['order_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            ['class' => CheckboxColumn::class],
                            [
                                'class'    => ActionColumn::class,
                                'template' => '{update} {ajax-delete}',
                                'buttons'  => [
                                    'update' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-pencil"></i>', $url, [
                                            'data' => [
                                                'pjax'         => 0,
                                                'id'              => $model->id,
                                                'type_id'         => $model->type_id,
                                                'format_title'    => $model->format_title,
                                                'length'          => $model->length,
                                                'format_id'       => $model->format_id,
                                                'order_id'        => $model->order_id,
                                                'account_name_id' => $model->account_name_id,
                                            ],
                                            'class' => 'update'
                                        ]);
                                    }
                                ]
                            ],
                        ],
                    ]) ?>
                </div>
                <a class="btn btn-sm btn-danger mb-0 pull-left disabled deleteAll3" data-url="<?= Url::to(['delete-all']) ?>" data-message="<?= Yii::t('app', 'Are you sure?') ?>">حذف</a>
                <?php Pjax::end(); ?>
            </div>
            <div class="tab-pane" id="page4">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success create', 'data' => ['type' => 4]]) ?>
                </p>
                <?php Pjax::begin(['id' => 'pjax4']); ?>
                <div class="table-responsive">
                    <?= GridView::widget([
                        'id'             => 'grid4',
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
                        'dataProvider'   => $dataProvider4,
                        'filterModel'    => $searchModel4,
                        'columns'        => [
                            ['class' => SerialColumn::class],
                            'format_title',
                            'length',
                            [
                                'attribute' => 'format_id',
                                'pattern'   => '{title}',
                                'filter'    => Html::activeDropDownList($searchModel4, 'format_id', $items['format_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            [
                                'attribute' => 'order_id',
                                'pattern'   => '{title}',
                                'filter'    => Html::activeDropDownList($searchModel4, 'order_id', $items['order_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            [
                                'attribute' => 'account_name_id',
                                'label'     => $searchModel4->getAttributeLabel('account_name_id'),
                                'value'     => function ($model) {
                                    return $model->accountName ? $model->accountName->title : null;
                                },
                                'filter' => Html::activeDropDownList($searchModel4, 'account_name_id', $items['account_name_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            ['class' => CheckboxColumn::class],
                            [
                                'class'    => ActionColumn::class,
                                'template' => '{update} {ajax-delete}',
                                'buttons'  => [
                                    'update' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-pencil"></i>', $url, [
                                            'data' => [
                                                'pjax'         => 0,
                                                'id'              => $model->id,
                                                'type_id'         => $model->type_id,
                                                'format_title'    => $model->format_title,
                                                'length'          => $model->length,
                                                'format_id'       => $model->format_id,
                                                'order_id'        => $model->order_id,
                                                'account_name_id' => $model->account_name_id,
                                            ],
                                            'class' => 'update'
                                        ]);
                                    }
                                ]
                            ],
                        ],
                    ]) ?>
                </div>
                <a class="btn btn-sm btn-danger mb-0 pull-left disabled deleteAll4" data-url="<?= Url::to(['delete-all']) ?>" data-message="<?= Yii::t('app', 'Are you sure?') ?>">حذف</a>
                <?php Pjax::end(); ?>
            </div>
            <div class="tab-pane" id="page5">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success create', 'data' => ['type' => 5]]) ?>
                </p>
                <?php Pjax::begin(['id' => 'pjax5']); ?>
                <div class="table-responsive">
                    <?= GridView::widget([
                        'id'             => 'grid5',
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
                        'dataProvider'   => $dataProvider5,
                        'filterModel'    => $searchModel5,
                        'columns'        => [
                            ['class' => SerialColumn::class],
                            'format_title',
                            'length',
                            [
                                'attribute' => 'format_id',
                                'pattern'   => '{title}',
                                'filter'    => Html::activeDropDownList($searchModel5, 'format_id', $items['format_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            [
                                'attribute' => 'order_id',
                                'pattern'   => '{title}',
                                'filter'    => Html::activeDropDownList($searchModel5, 'order_id', $items['order_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            [
                                'attribute' => 'account_name_id',
                                'label'     => $searchModel5->getAttributeLabel('account_name_id'),
                                'value'     => function ($model) {
                                    return $model->accountName ? $model->accountName->title : null;
                                },
                                'filter' => Html::activeDropDownList($searchModel5, 'account_name_id', $items['account_name_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            ['class' => CheckboxColumn::class],
                            [
                                'class'    => ActionColumn::class,
                                'template' => '{update} {ajax-delete}',
                                'buttons'  => [
                                    'update' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-pencil"></i>', $url, [
                                            'data' => [
                                                'pjax'         => 0,
                                                'id'              => $model->id,
                                                'type_id'         => $model->type_id,
                                                'format_title'    => $model->format_title,
                                                'length'          => $model->length,
                                                'format_id'       => $model->format_id,
                                                'order_id'        => $model->order_id,
                                                'account_name_id' => $model->account_name_id,
                                            ],
                                            'class' => 'update'
                                        ]);
                                    }
                                ]
                            ],
                        ],
                    ]) ?>
                </div>
                <a class="btn btn-sm btn-danger mb-0 pull-left disabled deleteAll5" data-url="<?= Url::to(['delete-all']) ?>" data-message="<?= Yii::t('app', 'Are you sure?') ?>">حذف</a>
                <?php Pjax::end(); ?>
            </div>
            <div class="tab-pane" id="page6">
                <p>
                    <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success create', 'data' => ['type' => 6]]) ?>
                </p>
                <?php Pjax::begin(['id' => 'pjax6']); ?>
                <div class="table-responsive">
                    <?= GridView::widget([
                        'id'             => 'grid6',
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
                        'dataProvider'   => $dataProvider6,
                        'filterModel'    => $searchModel6,
                        'columns'        => [
                            ['class' => SerialColumn::class],
                            'format_title',
                            'length',
                            [
                                'attribute' => 'format_id',
                                'pattern'   => '{title}',
                                'filter'    => Html::activeDropDownList($searchModel6, 'format_id', $items['format_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            [
                                'attribute' => 'order_id',
                                'pattern'   => '{title}',
                                'filter'    => Html::activeDropDownList($searchModel6, 'order_id', $items['order_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            [
                                'attribute' => 'account_name_id',
                                'label'     => $searchModel6->getAttributeLabel('account_name_id'),
                                'value'     => function ($model) {
                                    return $model->accountName ? $model->accountName->title : null;
                                },
                                'filter' => Html::activeDropDownList($searchModel6, 'account_name_id', $items['account_name_id'], ['class' => 'form-control form-control-sm', 'prompt' => '']),
                            ],
                            ['class' => CheckboxColumn::class],
                            [
                                'class'    => ActionColumn::class,
                                'template' => '{update} {ajax-delete}',
                                'buttons'  => [
                                    'update' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-pencil"></i>', $url, [
                                            'data' => [
                                                'pjax'         => 0,
                                                'id'              => $model->id,
                                                'type_id'         => $model->type_id,
                                                'format_title'    => $model->format_title,
                                                'length'          => $model->length,
                                                'format_id'       => $model->format_id,
                                                'order_id'        => $model->order_id,
                                                'account_name_id' => $model->account_name_id,
                                            ],
                                            'class' => 'update'
                                        ]);
                                    }
                                ]
                            ],
                        ],
                    ]) ?>
                </div>
                <a class="btn btn-sm btn-danger mb-0 pull-left disabled deleteAll6" data-url="<?= Url::to(['delete-all']) ?>" data-message="<?= Yii::t('app', 'Are you sure?') ?>">حذف</a>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
<div>
    <?php ob_start(); ?>
    <?php
    Modal::begin([
        'id'      => 'modal',
        'options' => ['class' => ''],
        'title'   => Yii::t('app', 'Create'),
        'footer'  => ''
        . ' ' . Html::a(Yii::t('app', 'Return'), null, ['class' => 'btn btn-sm btn-warning', 'id' => 'return'])
        . ' ' . Html::a(Yii::t('app', 'Save'), null, ['class' => 'btn btn-sm btn-success', 'id' => 'save'])
    ]);
    ?>
    <?php $form = ActiveForm::begin(['id' => 'form', 'action' => ['create']]); ?>
    <?= Html::activeHiddenInput($model, 'type_id') ?>
    <?= $form->field($model, 'format_title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'length')->select2([1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6]) ?>
    <?= $form->field($model, 'format_id')->select2($items['format_id']) ?>
    <?= $form->field($model, 'order_id')->select2($items['order_id']) ?>
    <?= $form->field($model, 'account_name_id')->select2($items['account_name_id']) ?>
    <?php ActiveForm::end(); ?>
    <?php Modal::end(); ?>
    <?php $this->params['modals'][] = ob_get_clean(); ?>
</div>
<?php
$this->registerJs("
    $(document).on('click', '#return', function (e) {
        e.preventDefault();
        $('#modal').modal('hide');
    });
    $(document).on('click', '#save', function (e) {
        e.preventDefault();
        $('#form').trigger('submit');
    });
    $(document).on('submit', '#form', function (e) {
        e.preventDefault();
        var url  = $(this).attr('action');
        var data = new FormData(this);
        ajaxpost(url, data, function (result) {
            var isValid = validResult(result);
            if (isValid) {
                var type_id = $('#accountingformats-type_id').val();
                $('#modal').modal('hide');
                $.pjax.reload({container: '#pjax' + type_id});
            }
        }, undefined, undefined, undefined, true);
    });
    $(document).on('click', '.create', function (e) {
        e.preventDefault();
        var type = parseInt($(this).data('type'));
        $('#form').attr('action', $(this).attr('href'));
        $('#accountingformats-type_id').val(type);
        var text = $('#grid' + type + ' [data-sort=\"account_name_id\"]').text();
        $('#form label[for=\"accountingformats-account_name_id\"]').text(text);
        $('.field-accountingformats-account_name_id').show();
        if (type === 3) {
            $('.field-accountingformats-account_name_id').hide();
        }
        $('#modal').modal('show');
    });
    $(document).on('click', '.update', function (e) {
        e.preventDefault();
        var type = $(this).data('type_id');
        
        var text = $('#grid' + type + ' [data-sort=\"account_name_id\"]').text();
        $('#form label[for=\"accountingformats-account_name_id\"]').text(text);
        $('.field-accountingformats-account_name_id').show();
        if (type === 3) {
            $('.field-accountingformats-account_name_id').hide();
        }
        
        $('#form').attr('action', $(this).attr('href'));
        $('#accountingformats-type_id').val(type);
        $('#accountingformats-format_title').val($(this).data('format_title')).trigger('change');
        $('#accountingformats-length').val($(this).data('length')).trigger('change');
        $('#accountingformats-format_id').val($(this).data('format_id')).trigger('change');
        $('#accountingformats-order_id').val($(this).data('order_id')).trigger('change');
        $('#accountingformats-account_name_id').val($(this).data('account_name_id')).trigger('change');
        $('#modal').modal('show');
    });
    $(document).on('hide.bs.modal', '#modal', function () {
        $('#form').get(0).reset();
        $('#accountingformats-type_id').val('');
        $('#accountingformats-length').trigger('change');
        $('#accountingformats-format_id').trigger('change');
        $('#accountingformats-order_id').trigger('change');
        $('#accountingformats-account_name_id').trigger('change');
    });
    
    // 1
    $(document).on('change', '#grid1 tbody input:checkbox', function () {
        $('.deleteAll1').removeClass('disabled');
        if ($('#grid1 tbody input:checkbox:checked').length === 0) {
            $('.deleteAll1').addClass('disabled');
        }
    });
    $(document).on('click', '#grid1 .delete', function (e) {
        e.preventDefault();
        var url     = $(this).attr('href');
        var message = $(this).data('message');
        if (confirm(message)) {
            ajaxget(url, {}, function () {
                $.pjax.reload({container: '#pjax1'});
            });
        }
    });
    $(document).on('click', '.deleteAll1', function (e) {
        e.preventDefault();
        var url     = $(this).data('url');
        var message = $(this).data('message');
        var ids     = $('#grid1').yiiGridView('getSelectedRows');
        if (ids.length > 0 && confirm(message)) {
            ajaxget(url, {ids}, function () {
                $.pjax.reload({container: '#pjax1'});
            });
        }
    });
    // 2
    $(document).on('change', '#grid2 tbody input:checkbox', function () {
        $('.deleteAll2').removeClass('disabled');
        if ($('#grid2 tbody input:checkbox:checked').length === 0) {
            $('.deleteAll2').addClass('disabled');
        }
    });
    $(document).on('click', '#grid2 .delete', function (e) {
        e.preventDefault();
        var url     = $(this).attr('href');
        var message = $(this).data('message');
        if (confirm(message)) {
            ajaxget(url, {}, function () {
                $.pjax.reload({container: '#pjax2'});
            });
        }
    });
    $(document).on('click', '.deleteAll2', function (e) {
        e.preventDefault();
        var url     = $(this).data('url');
        var message = $(this).data('message');
        var ids     = $('#grid2').yiiGridView('getSelectedRows');
        if (ids.length > 0 && confirm(message)) {
            ajaxget(url, {ids}, function () {
                $.pjax.reload({container: '#pjax2'});
            });
        }
    });
    // 3
    $(document).on('change', '#grid3 tbody input:checkbox', function () {
        $('.deleteAll3').removeClass('disabled');
        if ($('#grid3 tbody input:checkbox:checked').length === 0) {
            $('.deleteAll3').addClass('disabled');
        }
    });
    $(document).on('click', '#grid3 .delete', function (e) {
        e.preventDefault();
        var url     = $(this).attr('href');
        var message = $(this).data('message');
        if (confirm(message)) {
            ajaxget(url, {}, function () {
                $.pjax.reload({container: '#pjax3'});
            });
        }
    });
    $(document).on('click', '.deleteAll3', function (e) {
        e.preventDefault();
        var url     = $(this).data('url');
        var message = $(this).data('message');
        var ids     = $('#grid3').yiiGridView('getSelectedRows');
        if (ids.length > 0 && confirm(message)) {
            ajaxget(url, {ids}, function () {
                $.pjax.reload({container: '#pjax3'});
            });
        }
    });
    // 4
    $(document).on('change', '#grid4 tbody input:checkbox', function () {
        $('.deleteAll4').removeClass('disabled');
        if ($('#grid4 tbody input:checkbox:checked').length === 0) {
            $('.deleteAll4').addClass('disabled');
        }
    });
    $(document).on('click', '#grid4 .delete', function (e) {
        e.preventDefault();
        var url     = $(this).attr('href');
        var message = $(this).data('message');
        if (confirm(message)) {
            ajaxget(url, {}, function () {
                $.pjax.reload({container: '#pjax4'});
            });
        }
    });
    $(document).on('click', '.deleteAll4', function (e) {
        e.preventDefault();
        var url     = $(this).data('url');
        var message = $(this).data('message');
        var ids     = $('#grid4').yiiGridView('getSelectedRows');
        if (ids.length > 0 && confirm(message)) {
            ajaxget(url, {ids}, function () {
                $.pjax.reload({container: '#pjax4'});
            });
        }
    });
    // 5
    $(document).on('change', '#grid5 tbody input:checkbox', function () {
        $('.deleteAll5').removeClass('disabled');
        if ($('#grid5 tbody input:checkbox:checked').length === 0) {
            $('.deleteAll5').addClass('disabled');
        }
    });
    $(document).on('click', '#grid5 .delete', function (e) {
        e.preventDefault();
        var url     = $(this).attr('href');
        var message = $(this).data('message');
        if (confirm(message)) {
            ajaxget(url, {}, function () {
                $.pjax.reload({container: '#pjax5'});
            });
        }
    });
    $(document).on('click', '.deleteAll5', function (e) {
        e.preventDefault();
        var url     = $(this).data('url');
        var message = $(this).data('message');
        var ids     = $('#grid5').yiiGridView('getSelectedRows');
        if (ids.length > 0 && confirm(message)) {
            ajaxget(url, {ids}, function () {
                $.pjax.reload({container: '#pjax5'});
            });
        }
    });
    // 6
    $(document).on('change', '#grid6 tbody input:checkbox', function () {
        $('.deleteAll6').removeClass('disabled');
        if ($('#grid6 tbody input:checkbox:checked').length === 0) {
            $('.deleteAll6').addClass('disabled');
        }
    });
    $(document).on('click', '#grid6 .delete', function (e) {
        e.preventDefault();
        var url     = $(this).attr('href');
        var message = $(this).data('message');
        if (confirm(message)) {
            ajaxget(url, {}, function () {
                $.pjax.reload({container: '#pjax6'});
            });
        }
    });
    $(document).on('click', '.deleteAll6', function (e) {
        e.preventDefault();
        var url     = $(this).data('url');
        var message = $(this).data('message');
        var ids     = $('#grid6').yiiGridView('getSelectedRows');
        if (ids.length > 0 && confirm(message)) {
            ajaxget(url, {ids}, function () {
                $.pjax.reload({container: '#pjax6'});
            });
        }
    });
");