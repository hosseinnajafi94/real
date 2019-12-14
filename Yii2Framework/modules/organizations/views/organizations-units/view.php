<?php
use yii\bootstrap4\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsUnitsVML */
//$this->title                   = $model->name;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Units'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
$model = $model->model;
?>
<div class="organizations-units-view">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('organizations', 'Organizations Units') ?></h4>
            </div>
            <p><?= $model->name ?></p>
        </div>
        <div class="card-block">
            <p class="border-bottom mb-3">
                <?= Html::a(Yii::t('app', 'Return'), ['/organizations/organizations/view', 'id' => $model->organization_id], ['class' => 'btn btn-sm btn-warning']) ?>
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post']]) ?>
            </p>
            <div class="row form-group">
                <label class="control-label col-md-4"><?= $model->getAttributeLabel('name') ?>:</label>
                <div class="col-md-8"><?= $model->name ? $model->name : '---' ?></div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-4"><?= $model->getAttributeLabel('manager_id') ?>:</label>
                <div class="col-md-8"><?= $model->manager ? $model->manager->fname . ' ' . $model->manager->lname : '---' ?></div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-4"><?= $model->getAttributeLabel('province_id') ?>:</label>
                <div class="col-md-8"><?= $model->province ? $model->province->title : '---' ?></div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-4"><?= $model->getAttributeLabel('city_id') ?>:</label>
                <div class="col-md-8"><?= $model->city ? $model->city->title : '---' ?></div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-4"><?= $model->getAttributeLabel('acl_id') ?>:</label>
                <div class="col-md-8"><?= $model->acl ? $model->acl->title : '---' ?></div>
            </div>
            <?php
            if ($model->acl_id == 2) {
                ?>
                <div class="row form-group">
                    <label class="control-label col-md-4"><?= $model->getAttributeLabel('acl_category_id') ?>:</label>
                    <div class="col-md-8"><?= $model->aclCategory ? $model->aclCategory->title : '---' ?></div>
                </div>
                <?php
            }
            ?>
            <div class="row form-group">
                <label class="control-label col-md-4"><?= $model->getAttributeLabel('work_place_status_id') ?>:</label>
                <div class="col-md-8"><?= $model->workPlaceStatus ? $model->workPlaceStatus->title : '---' ?></div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-4"><?= $model->getAttributeLabel('ws_code') ?>:</label>
                <div class="col-md-8"><?= $model->ws_code ? $model->ws_code : '---' ?></div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-4"><?= $model->getAttributeLabel('tfn') ?>:</label>
                <div class="col-md-8"><?= $model->tfn ? $model->tfn : '---' ?></div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-4"><?= $model->getAttributeLabel('insurance_acc_id') ?>:</label>
                <div class="col-md-8"><?= $model->insuranceAcc ? $model->insuranceAcc->title : '---' ?></div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-4"><?= $model->getAttributeLabel('tax_acc_id') ?>:</label>
                <div class="col-md-8"><?= $model->taxAcc ? $model->taxAcc->title : '---' ?></div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-4"><?= $model->getAttributeLabel('darsad1') ?>:</label>
                <div class="col-md-8"><?= $model->darsad1 ? $model->darsad1 : '---' ?></div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-4"><?= $model->getAttributeLabel('darsad2') ?>:</label>
                <div class="col-md-8"><?= $model->darsad2 ? $model->darsad2 : '---' ?></div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-4"><?= $model->getAttributeLabel('unit_description') ?>:</label>
                <div class="col-md-8"><?= $model->unit_description ? $model->unit_description : '---' ?></div>
            </div>
        </div>
    </div>
</div>
