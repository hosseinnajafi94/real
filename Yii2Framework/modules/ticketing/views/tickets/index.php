<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\config\widgets\GridView;
use app\modules\users\models\SRL\UsersSRL;
/* @var $this yii\web\View */
/* @var $model array */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel \app\modules\ticketing\models\VML\TicketsSearchVML */
list($dataProvider, $searchModel) = $model;

Url::remember();
//$this->params['breadcrumbs'][] = Yii::t('ticketing', 'Tickets');
$user                          = UsersSRL::findModel(Yii::$app->user->id);
$isAdmin                       = $user->group_id == 1;
?>
<div class="tickets-index">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('ticketing', 'Tickets') ?></h4>
            </div>
            <p></p>
        </div>
        <div class="card-block">
            <p>
                <?= Html::a(Yii::t('ticketing', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
            </p>
            <div class="table-responsive">
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
                    'rowOptions' => function ($model) {
                        if ($model->sender_id == Yii::$app->user->id) {
                            if ($model->status_id === 3) {
                                return ['class' => 'success'];
                            }
                        }
                        else {
                            if ($model->status_id === 1) {
                                return ['class' => 'danger'];
                            }
                            else if ($model->status_id === 2) {
                                return ['class' => 'warning'];
                            }
                        }
                    },
                    'columns' => [
                        'id',
                        [
                            'attribute' => 'title',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a($model->title, ['/ticketing/tickets/view', 'id' => $model->id]);
                            }
                        ],
                        [
                            'attribute' => 'sender_id',
                            'pattern' => '{fname} {lname}',
                            'filter' => ''
                            //'url' => $isAdmin ? ['/users/users/view', 'id' => '{id}'] : null
                        ],
                        [
                            'attribute' => 'support_id',
                            'pattern' => '{title}',
                            'filter' => $searchModel->supports
                        ],
                        [
                            'attribute' => 'category_id',
                            'pattern' => '{title}',
                            'filter' => $searchModel->categories
                        ],
                        [
                            'attribute' => 'status_id',
                            'pattern' => '{title}',
                            'filter' => $searchModel->statuses
                        ],
                        [
                            'attribute' => 'datetime',
                            'format' => 'jdatetime',
                            'filter' => ''
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view} {delete}',
                            'buttons' => [
                                'view' => function ($url) {
                                    return Html::a('<i class="fa fa-fw fa-eye"></i>', $url);
                                },
                                'delete' => function ($url, $model) use ($isAdmin) {
                                    return $isAdmin && $model->status_id != 4 ? Html::a('<i class="fa fa-fw fa-close"></i>', $url, ['title' => Yii::t('ticketing', 'Close'), 'data' => ['confirm' => Yii::t('ticketing', 'Are you sure you want to delete this item?'), 'method' => 'post']]) : '';
                                }
                            ]
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>