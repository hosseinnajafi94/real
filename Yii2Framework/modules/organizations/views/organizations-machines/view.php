<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsMachines */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Machines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="organizations-machines-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('organizations', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('organizations', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('organizations', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'org_id',
            'title',
            'machine_id',
            'ip',
            'port',
            'calendar_type_id',
            'timezone_id:datetime',
            'model_id',
            'daylight_id',
            'form_month_id',
            'form_day_id',
            'to_month_id',
            'to_day_id',
            'enable_cal_login:boolean',
            'default_type_sync:boolean',
        ],
    ]) ?>

</div>
