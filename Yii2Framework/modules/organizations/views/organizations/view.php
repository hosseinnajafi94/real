<?php
/* @var $this yii\web\View */
/* @var $model \app\modules\organizations\models\VML\OrganizationsVML */
/* @var $searchModel2 \app\modules\organizations\models\VML\OrganizationsUnitsSearchVML */
/* @var $dataProvider2 \yii\data\ActiveDataProvider */
/* @var $searchModel3 \app\modules\organizations\models\VML\OrganizationsPositionsSearchVML */
/* @var $dataProvider3 \yii\data\ActiveDataProvider */
/* @var $searchModel4 \app\modules\organizations\models\VML\OrganizationsPositionsListSkillsSearchVML */
/* @var $dataProvider4 \yii\data\ActiveDataProvider */
/* @var $searchModel5 \app\modules\organizations\models\VML\OrganizationsPlanningSearchVML */
/* @var $dataProvider5 \yii\data\ActiveDataProvider */
/* @var $units array */
$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
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
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page2"><?= Yii::t('organizations', 'Organizations Units') ?></a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page3"><?= Yii::t('organizations', 'Organizations Positions') ?></a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page4"><?= Yii::t('organizations', 'Organizations Positions List Skills') ?></a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page5"><?= Yii::t('organizations', 'برنامه ریزی') ?></a></li>
            </ul>
            <div class="tab-content px-1">
                <div class="tab-pane active show" id="page1">
                    <?= $this->render('view_page1', [
                        'data' => $model
                    ]) ?>
                </div>
                <div class="tab-pane" id="page2">
                    <?= $this->render('view_page2', [
                        'data' => $model,
                        'searchModel' => $searchModel2,
                        'dataProvider' => $dataProvider2,
                        'units' => $units,
                    ]) ?>
                </div>
                <div class="tab-pane" id="page3">
                    <?= $this->render('view_page3', [
                        'data' => $model,
                        'searchModel' => $searchModel3,
                        'dataProvider' => $dataProvider3,
                    ]) ?>
                </div>
                <div class="tab-pane" id="page4">
                    <?= $this->render('view_page4', [
                        'data' => $model,
                        'searchModel' => $searchModel4,
                        'dataProvider' => $dataProvider4,
                    ]) ?>
                </div>
                <div class="tab-pane" id="page5">
                    <?= $this->render('view_page5', [
                        'data' => $model,
                        'searchModel' => $searchModel5,
                        'dataProvider' => $dataProvider5,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>