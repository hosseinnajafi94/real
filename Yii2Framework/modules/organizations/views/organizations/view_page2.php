<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\ActionColumn;
use app\assets\AdminAsset;
/* @var $data \app\modules\organizations\models\VML\OrganizationsVML */
/* @var $model \app\modules\organizations\models\DAL\Organizations */
/* @var $searchModel \app\modules\organizations\models\VML\OrganizationsUnitsSearchVML */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $units array */
$model = $data->model;
$urlCreate = Url::to(['/organizations/organizations-units/create', 'org_id' => $model->id, 'parent_id' => '000']);
$urlView = Url::to(['/organizations/organizations-units/view', 'id' => '000']);
$urlUpdate = Url::to(['/organizations/organizations-units/update', 'id' => '000']);
$urlDelete = Url::to(['/organizations/organizations-units/delete', 'id' => '000']);
$this->registerCssFile('@web/themes/custom/libs/jstree/themes/default/style.min.css', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/libs/jstree/jstree.min.js', ['depends' => AdminAsset::class]);
$this->registerJs("
$('#jstree').jstree({
    'plugins' : ['search', 'types', 'contextmenu'], // , 'sort'
    'types' : {
        'default' : {
            'icon' : 'fa fa-sitemap'
        }
    },
    contextmenu: {
        items: function () {
            return {
                'create': {
                    icon: 'fa fa-plus text-success',
                    label : 'افزودن رده',
                    action: function (data) {
                        var inst = $.jstree.reference(data.reference);
                        var obj = inst.get_node(data.reference);
                        window.location = '$urlCreate'.replace('000', obj.id);
                    }
                },
                'view': {
                    icon: 'fa fa-eye text-info',
                    label : 'جزئیات',
                    action: function (data) {
                        var inst = $.jstree.reference(data.reference);
                        var obj = inst.get_node(data.reference);
                        window.location = '$urlView'.replace('000', obj.id);
                    }
                },
                'update': {
                    icon: 'fa fa-pencil text-primary',
                    label : 'ویرایش',
                    action: function (data) {
                        var inst = $.jstree.reference(data.reference);
                        var obj = inst.get_node(data.reference);
                        window.location = '$urlUpdate'.replace('000', obj.id);
                    }
                },
                'delete': {
                    icon: 'fa fa-times text-danger',
                    label : 'حذف',
                    action: function (data) {
                        var inst = $.jstree.reference(data.reference);
                        var obj = inst.get_node(data.reference);
                        $('<a></a>')
                            .attr('data-method', 'post')
                            .attr('data-confirm', '" . Yii::t('app', 'Are you sure you want to delete this item?') . "')
                            .attr('href', '$urlDelete'.replace('000', obj.id))
                            .appendTo('body')
                            .trigger('click')
                            .remove();
                    }
                }
            };
        }
    },
    'core' : {
        'data' : " . json_encode($units) . "
    }
}).on('loaded.jstree', function() {
    $(this).jstree('open_all');
});
$('#input').on('input', function(e) {
    e.preventDefault();
    $('#jstree').jstree(true).search($(this).val());
});
");
?>
<div class="view_page2">
    <p>
        <?= Html::a(Yii::t('app', 'افزودن بخش'), ['/organizations/organizations-units/create', 'org_id' => $model->id], ['class' => 'btn btn-sm btn-success']) ?>
        <br/>
        <small>برای افزودن رده، ابتدا بر روی بخش مورد نظر راست کلیک کرده، و از لیست باز شده، گزینه افزودن رده را انتخاب نمایید.</small>
    </p>
    <br/>
    <label>جستجو:</label>
    <div class="row">
        <div class="col-md-4">
            <input class="form-control form-control-sm" id="input"/>
        </div>
    </div>
    <br/>
    <div id="jstree"></div>
    <div class="d-none">
        <br/>
        <?php Pjax::begin(); ?>
        <?=
        GridView::widget([
            'layout'         => '
                                {items}
                                <div class="pull-right" style="margin-left: 15px;">
                                    <label>تعداد نمایش: </label>
                                    ' . Html::activeDropDownList($searchModel, 'myPageSize', [10 => 10, 20 => 20, 50 => 50, 100 => 100], ['id' => 'myPageSize2', 'class' => 'form-control form-control-sm', 'style' => 'width: auto;display: inline-block;']) . '
                                </div>
                                {summary}
                                {pager}
                            ',
            'filterSelector' => '#myPageSize2',
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
                    ['class' => 'yii\grid\SerialColumn'],
                'name',
                //'manager_id',
                //'province_id',
                //'city_id',
                //'acl_id',
                //'acl_category_id',
                //'work_place_status_id',
                //'ws_code',
                //'tfn',
                //'insurance_acc_id',
                //'tax_acc_id',
                //'darsad1',
                //'darsad2',
                //'description:ntext',
                [
                    'class'      => ActionColumn::class,
                    'urlCreator' => function ($action, $model) {
                        if ($action === 'view') {
                            return Url::to(['/organizations/organizations-units/view', 'id' => $model->id]);
                        }
                        if ($action === 'update') {
                            return Url::to(['/organizations/organizations-units/update', 'id' => $model->id]);
                        }
                        if ($action === 'delete') {
                            return Url::to(['/organizations/organizations-units/delete', 'id' => $model->id]);
                        }
                    },
                ],
            ],
        ]);
        ?>
        <?php Pjax::end(); ?>
    </div>
</div>