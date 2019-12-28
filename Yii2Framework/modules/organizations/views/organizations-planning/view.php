<?php
use yii\bootstrap4\Html;
use app\config\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsPlanning */

//$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Plannings'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
?>
<div class="organizations-planning-view">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('organizations', 'برنامه ریزی') ?></h4>
            </div>
            <p><?= $model->title ?></p>
        </div>
        <div class="card-block">
            <p class="border-bottom mb-3">
                <?= Html::a(Yii::t('app', 'Return'), ['/organizations/organizations/view', 'id' => $model->organization_id], ['class' => 'btn btn-sm btn-warning']) ?>
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post']]) ?>
            </p>
            <?=
            DetailView::widget([
                'model'      => $model->model,
                'attributes' => [
                    //'id',
                    //[
                    //    'attribute' => 'organization_id',
                    //    'pattern' => '{name}'
                    //],
                    //'type_id',
                    //'parent_id',
                    'title',
                    'description:raw',
                    [
                        'attribute' => 'created_by',
                        'pattern' => '# {id} {fname} {lname}'
                    ],
                    'created_at:jdatetime',
                    [
                        'attribute' => 'updated_by',
                        'pattern' => '# {id} {fname} {lname}'
                    ],
                    'updated_at:jdatetime',
                ],
            ])
            ?>
        </div>
    </div>
</div>
