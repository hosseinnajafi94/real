<?php
use yii\bootstrap4\Html;
use app\config\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\Secretariats */
$this->title = $model->name;
?>
<div class="correspondence-secretariats-view card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('correspondence', 'Secretariats') ?></h4>
        </div>
        <p><?= $this->title ?></p>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post']]) ?>
        </p>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'section_1',
                'section_2',
                'splitter_1',
                'splitter_2',
            ],
        ]) ?>
    </div>
</div>