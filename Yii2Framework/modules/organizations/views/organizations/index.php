<?php
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\organizations\models\VML\OrganizationsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('organizations', 'Organizations');
//$this->params['breadcrumbs'][] = $this->title;
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
            <p>
                <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
            </p>
            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <?= GridView::widget([
                'layout' => '
                    {items}
                    <div class="pull-right" style="margin-left: 15px;">
                        <label>تعداد نمایش: </label>
                        ' . Html::activeDropDownList($searchModel, 'myPageSize', [10 => 10, 20 => 20, 50 => 50, 100 => 100],['id'=>'myPageSize', 'class' => 'form-control form-control-sm', 'style' => 'width: auto;display: inline-block;']).'
                    </div>
                    {summary}
                    {pager}
                ',
                'filterSelector' => '#myPageSize',
                'summaryOptions' => [
                    'class' => 'summary pull-right'
                ],
                'pager' => [
                    'options' => [
                        'class' => 'pagination pagination-sm pull-left',
                        'style' => 'margin-left: 2px;'
                    ],
                    'linkContainerOptions' => [
                        'class' => 'page-item'
                    ],
                    'linkOptions' => [
                        'class' => 'page-link'
                    ],
                    'disabledListItemSubTagOptions' => [
                        'class' => 'page-link disabled'
                    ]
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    'name',
                    //'manager_id',
                    'register_id',
                    'register_number',
                    //'date_start:jdate',
                    //'activity_subject',
                    //'parent_id',
                    'ws_code',
                    //'tfn',
                    //'code',
                    //'license',
                    //'phone',
                    //'fax',
                    //'email:email',
                    //'post',
                    //'province_id',
                    //'city_id',
                    //'address',
                    //'detail',
                    ['class' => app\config\widgets\ActionColumn::class],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>