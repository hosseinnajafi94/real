<?php
use yii\bootstrap4\Html;
use app\config\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersCompilations */
$this->title = $model->title;
?>
<div class="users-users-compilations-view card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('users', 'تحصیلات / مهارت') ?></h4>
        </div>
        <p><?= $this->title ?></p>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Return'), ['/users/users/view', 'id' => $model->user_id], ['class' => 'btn btn-sm btn-warning']) ?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post']]) ?>
        </p>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'type_id',
                    'pattern' => '{title}'
                ],
                [
                    'attribute' => 'submit_type_id',
                    'value' => function ($model) {
                        return $model->submitType ? $model->submitType->title : null;
                    }
                ],
                'title',
                'year',
                'place',
                'page_number',
                'descriptions',
                'points',
            ],
        ]) ?>
    </div>
</div>