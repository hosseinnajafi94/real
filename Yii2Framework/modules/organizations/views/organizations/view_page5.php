<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\ActionColumn;
/* @var $data \app\modules\organizations\models\VML\OrganizationsVML */
/* @var $model \app\modules\organizations\models\DAL\Organizations */
/* @var $searchModel \app\modules\organizations\models\VML\OrganizationsPlanningSearchVML */
/* @var $dataProvider \yii\data\ActiveDataProvider */
$model = $data->model;
$title = 'چشم انداز';
$url = ['/organizations/organizations-planning/create', 'org_id' => $model->id];
if (!is_null($searchModel->parent)) {
    $type_id = $searchModel->parent->type_id;
    $url['parent_id'] = $searchModel->parent_id;
    if ($type_id === 1) {
        $title = 'ماموریت';
    }
    else if ($type_id === 2) {
        $title = 'استراتژی';
    }
    else if ($type_id === 3) {
        $title = '';
    }
}
?>
<div class="view_page5">
    <?php Pjax::begin(); ?>
    <p>
        <?= $title != '' ? Html::a(Yii::t('app', 'Create') . ' ' . $title, $url, ['class' => 'btn btn-sm btn-success', 'data' => ['pjax' => 0]]) : '' ?>
        <?php
        if ($searchModel->parent_id !== null) {
            echo Html::a(Yii::t('app', 'Return'), '?', ['class'=> 'btn btn-sm btn-warning']);
        }
        ?>
    </p>
    <?= GridView::widget([
        'layout'         => '
            {items}
            <div class="pull-right" style="margin-left: 15px;">
                <label>تعداد نمایش: </label>
                ' . Html::activeDropDownList($searchModel, 'myPageSize', [10 => 10, 20 => 20, 50 => 50, 100 => 100], ['id' => 'myPageSize5', 'class' => 'form-control form-control-sm', 'style' => 'width: auto;display: inline-block;']) . '
            </div>
            {summary}
            {pager}
        ',
        'filterSelector' => '#myPageSize5',
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
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->type_id != 3) {
                        return Html::a($model->title, '?OrganizationsPlanningSearchVML[parent_id]=' . $model->id);
                    }
                    return $model->title;
                }
            ],
            [
                'class'      => ActionColumn::class,
                'template'   => '{view} {update} {delete}', //{child} 
                'urlCreator' => function ($action, $model) {
                    if ($action === 'view') {
                        return Url::to(['/organizations/organizations-planning/view', 'id' => $model->id]);
                    }
                    if ($action === 'update') {
                        return Url::to(['/organizations/organizations-planning/update', 'id' => $model->id]);
                    }
                    if ($action === 'delete') {
                        return Url::to(['/organizations/organizations-planning/delete', 'id' => $model->id]);
                    }
//                    if ($action === 'child') {
//                        return Url::to(['/organizations/organizations-planning/create', 'org_id' => $model->organization_id, 'parent_id' => $model->id]);
//                    }
               },
//               'buttons' => [
//                   'child' => function ($url, $model) {
//                       if ($model->type_id === 1 || $model->type_id === 2) {
//                            return '
//                                <a href="'.$url.'" title="افزودن '.($model->type_id == 1 ? 'ماموریت' : 'استراتژی').'" data-pjax="0">
//                                    <span class="fa fa-plus"></span>
//                                </a>
//                            ';
//                       }
//                   }
//               ]
            ],
        ],
    ]) ?>
    <?php Pjax::end() ?>
</div>