<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\ActionColumn;
/* @var $data \app\modules\organizations\models\VML\OrganizationsVML */
/* @var $model \app\modules\organizations\models\DAL\Organizations */
/* @var $searchModel \app\modules\organizations\models\VML\OrganizationsPositionsSearchVML */
/* @var $dataProvider \yii\data\ActiveDataProvider */
$model = $data->model;
?>
<div class="view_page3">
    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['/organizations/organizations-positions/create', 'org_id' => $model->id], ['class' => 'btn btn-sm btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?=
    GridView::widget([
        'layout'         => '
                            {items}
                            <div class="pull-right" style="margin-left: 15px;">
                                <label>تعداد نمایش: </label>
                                ' . Html::activeDropDownList($searchModel, 'myPageSize', [10 => 10, 20 => 20, 50 => 50, 100 => 100], ['id' => 'myPageSize3', 'class' => 'form-control form-control-sm', 'style' => 'width: auto;display: inline-block;']) . '
                            </div>
                            {summary}
                            {pager}
                        ',
        'filterSelector' => '#myPageSize3',
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
            //'persons',
            //'hiring_enable:boolean',
            //'job_code',
            //'description:ntext',
            //'form_id',
            //'extra_description:ntext',
            //'degree_id',
            //'experience',
            //'gender_id',
            //'resume_deadline',
            //'skills:ntext',
            [
                'class'      => ActionColumn::class,
                'urlCreator' => function ($action, $model) {
                    if ($action === 'view') {
                        return Url::to(['/organizations/organizations-positions/view', 'id' => $model->id]);
                    }
                    if ($action === 'update') {
                        return Url::to(['/organizations/organizations-positions/update', 'id' => $model->id]);
                    }
                    if ($action === 'delete') {
                        return Url::to(['/organizations/organizations-positions/delete', 'id' => $model->id]);
                    }
                },
            ],
        ],
    ])
    ?>
    <?php Pjax::end() ?>
</div>