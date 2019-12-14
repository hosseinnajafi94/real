<?php
use app\config\components\functions;
use yii\helpers\Url;
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsVML */
//$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
$model    = $model->model;
?>
<div class="organizations-view">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('organizations', 'Organizations') ?></h4>
            </div>
            <p><?= $model->name ?></p>
        </div>
        <div class="card-block">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#page1">جزئیات</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page4">چارت</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page2">مشاغل</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page3">مهارت ها</a></li>
            </ul>
            <div class="tab-content px-1">
                <div class="tab-pane active show" id="page1">
                    <p>
                        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
                        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post']]) ?>
                    </p>
                    <div class="row border-bottom mb-3">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('name') ?>:</label>
                                <div class="col-md-8"><?= $model->name ? $model->name : '---' ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <?php $manager  = $model->manager; ?>
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('manager_id') ?>:</label>
                                <div class="col-md-8"><?= $manager ? $manager->fname . ' ' . $manager->lname : '---' ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('register_id') ?>:</label>
                                <div class="col-md-8"><?= $model->register_id ? $model->register_id : '---' ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('register_number') ?>:</label>
                                <div class="col-md-8"><?= $model->register_number ? $model->register_number : '---' ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('date_start') ?>:</label>
                                <div class="col-md-8"><?= $model->date_start ? functions::tojdate($model->date_start) : '---' ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('activity_subject') ?>:</label>
                                <div class="col-md-8"><?= $model->activity_subject ? $model->activity_subject : '---' ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <?php $parent   = $model->parent; ?>
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('parent_id') ?>:</label>
                                <div class="col-md-8"><?= $parent ? $parent->name : '---' ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('ws_code') ?>:</label>
                                <div class="col-md-8"><?= $model->ws_code ? $model->ws_code : '---' ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('tfn') ?>:</label>
                                <div class="col-md-8"><?= $model->tfn ? $model->tfn : '---' ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('code') ?>:</label>
                                <div class="col-md-8"><?= $model->code ? $model->code : '---' ?></div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('license') ?>:</label>
                                <div class="col-md-8"><?= $model->license ? $model->license : '---' ?></div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('phone') ?>:</label>
                                <div class="col-md-8"><?= $model->phone ? $model->phone : '---' ?></div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('fax') ?>:</label>
                                <div class="col-md-8"><?= $model->fax ? $model->fax : '---' ?></div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('email') ?>:</label>
                                <div class="col-md-8"><?= $model->email ? $model->email : '---' ?></div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('post') ?>:</label>
                                <div class="col-md-8"><?= $model->post ? $model->post : '---' ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('logo') ?>:</label>
                                <div class="col-md-8">
                                    <img src="<?= Yii::getAlias('@web/uploads/organizations/' . $model->logo) ?>" style="max-width: 300px;width: 100%;max-height: 200px;"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <?php $province = $model->province; ?>
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('province_id') ?>:</label>
                                <div class="col-md-8"><?= $province ? $province->title : '---' ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <?php $city     = $model->city; ?>
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('city_id') ?>:</label>
                                <div class="col-md-8"><?= $city ? $city->title : '---' ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('address') ?>:</label>
                                <div class="col-md-8"><?= $model->address ? $model->address : '---' ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label col-md-4"><?= $model->getAttributeLabel('detail') ?>:</label>
                                <div class="col-md-8"><?= $model->detail ? $model->detail : '---' ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="page2">
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
                                ' . Html::activeDropDownList($searchModel1, 'myPageSize', [10 => 10, 20 => 20, 50 => 50, 100 => 100], ['id' => 'myPageSize1', 'class' => 'form-control form-control-sm', 'style' => 'width: auto;display: inline-block;']) . '
                            </div>
                            {summary}
                            {pager}
                        ',
                        'filterSelector' => '#myPageSize1',
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
                                'class'      => app\config\widgets\ActionColumn::class,
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
                <div class="tab-pane" id="page3">
                    <h3 class="text-center">در دست اقدام</h3>
                </div>
                <div class="tab-pane" id="page4">
                    <p>
                        <?= Html::a(Yii::t('app', 'Create'), ['/organizations/organizations-units/create', 'org_id' => $model->id], ['class' => 'btn btn-sm btn-success']) ?>
                    </p>
                    <?php Pjax::begin(); ?>
                    <?=
                    GridView::widget([
                        'layout'         => '
                            {items}
                            <div class="pull-right" style="margin-left: 15px;">
                                <label>تعداد نمایش: </label>
                                ' . Html::activeDropDownList($searchModel2, 'myPageSize', [10 => 10, 20 => 20, 50 => 50, 100 => 100], ['id' => 'myPageSize2', 'class' => 'form-control form-control-sm', 'style' => 'width: auto;display: inline-block;']) . '
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
                        'dataProvider'   => $dataProvider2,
                        'filterModel'    => $searchModel2,
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
                                'class'      => app\config\widgets\ActionColumn::class,
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
        </div>
    </div>
</div>