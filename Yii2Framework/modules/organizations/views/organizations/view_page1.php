<?php
use yii\bootstrap4\Html;
use app\config\components\functions;
/* @var $data app\modules\organizations\models\VML\OrganizationsVML */
/* @var $model app\modules\organizations\models\DAL\Organizations */
$model = $data->model;
?>
<div class="view_page1">
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