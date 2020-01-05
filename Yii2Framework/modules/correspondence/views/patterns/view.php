<?php
use yii\bootstrap4\Html;
use app\config\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\MailsListPatterns */
$this->title = $model->title;
?>
<div class="patterns-view card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('correspondence', 'Patterns') ?></h4>
        </div>
        <p><?= $model->title ?></p>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => Yii::t('correspondence', 'Are you sure you want to delete this item?'), 'method' => 'post']]) ?>
        </p>
        <?= DetailView::widget([
            'model' => $model->model,
            'attributes' => [
                'title',
                [
                    'attribute' => 'size_id',
                    'pattern' => '{title}'
                ],
                'sign_count',
                [
                    'attribute' => 'file',
                    'format' => ['img', 'patterns']
                ],
            ],
        ]) ?>
    </div>
</div>