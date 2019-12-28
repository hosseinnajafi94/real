<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\ActionColumn;
/* @var $data \app\modules\organizations\models\VML\OrganizationsVML */
/* @var $model \app\modules\organizations\models\DAL\Organizations */
/* @var $searchModel \app\modules\organizations\models\VML\OrganizationsPositionsListSkillsSearchVML */
/* @var $dataProvider \yii\data\ActiveDataProvider */
$model = $data->model;
?>
<div class="view_page4">
    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['/organizations/organizations-positions-list-skills/create', 'org_id' => $model->id], ['class' => 'btn btn-sm btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?=
    GridView::widget([
        'layout'         => '
                            {items}
                            <div class="pull-right" style="margin-left: 15px;">
                                <label>تعداد نمایش: </label>
                                ' . Html::activeDropDownList($searchModel, 'myPageSize', [10 => 10, 20 => 20, 50 => 50, 100 => 100], ['id' => 'myPageSize4', 'class' => 'form-control form-control-sm', 'style' => 'width: auto;display: inline-block;']) . '
                            </div>
                            {summary}
                            {pager}
                        ',
        'filterSelector' => '#myPageSize4',
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
            'title',
                [
                'class'      => ActionColumn::class,
                'template'   => '{update} {delete}',
                'urlCreator' => function ($action, $model) {
                    if ($action === 'update') {
                        return Url::to(['/organizations/organizations-positions-list-skills/update', 'id' => $model->id]);
                    }
                    if ($action === 'delete') {
                        return Url::to(['/organizations/organizations-positions-list-skills/delete', 'id' => $model->id]);
                    }
                },
            ],
        ],
    ]);
    ?>
    <?php Pjax::end() ?>
</div>