<?php
use yii\bootstrap4\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsPositionsVML */
//$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Positions'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
?>
<div class="organizations-positions-view">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('organizations', 'Organizations Positions') ?></h4>
            </div>
            <p><?= $model->name ?></p>
        </div>
        <div class="card-block">
            <p class="border-bottom mb-3">
                <?= Html::a(Yii::t('app', 'Return'), ['/organizations/organizations/view', 'id' => $model->organization_id], ['class' => 'btn btn-sm btn-warning']) ?>
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
                        <label class="control-label col-md-4"><?= $model->getAttributeLabel('persons') ?>:</label>
                        <div class="col-md-8"><?= $model->persons ? $model->persons : '---' ?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label col-md-4"><?= $model->getAttributeLabel('job_code') ?>:</label>
                        <div class="col-md-8"><?= $model->job_code ? $model->job_code : '---' ?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label col-md-4"><?= $model->getAttributeLabel('hiring_enable') ?>:</label>
                        <div class="col-md-8"><i class="fa fa-<?= $model->hiring_enable ? 'check text-success' : 'times text-danger' ?>"></i></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label col-md-12"><?= $model->getAttributeLabel('description') ?>:</label>
                        <div class="col-md-12"><?= $model->description ? $model->description : '---' ?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label col-md-4"><?= $model->getAttributeLabel('form_id') ?>:</label>
                        <div class="col-md-8"><?= $model->model->form ? $model->model->form->title : '---' ?></div>
                    </div>
                </div>
            </div>
            <div class="row border-bottom mb-3">
                <div class="col-md-12">
                    <div class="row form-group">
                        <label class="control-label col-md-12"><?= $model->getAttributeLabel('extra_description') ?>:</label>
                        <div class="col-md-12"><?= $model->extra_description ? $model->extra_description : '---' ?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label col-md-4"><?= $model->getAttributeLabel('degree_id') ?>:</label>
                        <div class="col-md-8"><?= $model->model->degree ? $model->model->degree->title : '---' ?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label col-md-4"><?= $model->getAttributeLabel('experience') ?>:</label>
                        <div class="col-md-8"><?= $model->experience ? $model->experience : '---' ?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label col-md-4"><?= $model->getAttributeLabel('gender_id') ?>:</label>
                        <div class="col-md-8"><?= $model->model->gender ? $model->model->gender->title : '---' ?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label col-md-4"><?= $model->getAttributeLabel('resume_deadline') ?>:</label>
                        <div class="col-md-8"><?= $model->resume_deadline ? $model->resume_deadline : '---' ?></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row form-group">
                        <label class="control-label col-md-12"><?= $model->getAttributeLabel('skills') ?>:</label>
                        <div class="col-md-12"><?= $model->skills ? $model->skills : '---' ?></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="control-label col-md-4"><?= $model->getAttributeLabel('position_skills') ?>:</label>
                        <div class="col-md-8">
                            <?php
                            $items = [];
                            /* @var $rows app\modules\organizations\models\DAL\OrganizationsPositionsSkills[] */
                            $rows  = $model->model->getOrganizationsPositionsSkills()->all();
                            foreach ($rows as $row) {
                                $items[] = $row->skill->title;
                            }
                            echo $items ? implode('<br/>', $items) : '---';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="control-label col-md-4"><?= $model->getAttributeLabel('view_in_portal') ?>:</label>
                        <div class="col-md-8">
                            <?php
                            $items2 = [];
                            /* @var $rows2 app\modules\organizations\models\DAL\OrganizationsPositionsColumns[] */
                            $rows2  = $model->model->getOrganizationsPositionsColumns()->all();
                            foreach ($rows2 as $row2) {
                                $items2[] = $row2->column->title;
                            }
                            echo $items2 ? implode('<br/>', $items2) : '---';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>