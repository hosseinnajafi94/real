<?php
use yii\bootstrap4\Html;
use app\config\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\ActionColumn;
use app\config\widgets\SerialColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\organizations\models\VML\OrganizationsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('organizations', 'Organizations');
?>
<div class="organizations-index">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= $this->title ?></h4>
            </div>
            <p></p>
        </div>
        <div class="card-block">
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
                        'name',
                        'register_number',
                        [
                            'class' => ActionColumn::class,
                            'template' => '{years}',
                            'buttons' => [
                                'years' => function ($url) {
                                    return Html::a('<i class="fa fa-list"></i>', $url, ['title' => 'دوره مالی', 'data' => ['pjax' => 0]]);
                                }
                            ]
                        ],
                    ],
                ]); ?>
            </div>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>