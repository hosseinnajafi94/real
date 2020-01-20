<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\Mails */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('correspondence', 'Mails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mails-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('correspondence', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('correspondence', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('correspondence', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'type_id',
            'secretariat_id',
            'pattern_id',
            'receiver_type_id',
            'receiver1_id',
            'receiver2_id',
            'status_id',
            'text:ntext',
            'section_1',
            'section_2',
            'section_3',
        ],
    ]) ?>

</div>
