<?php
use yii\bootstrap4\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersDescriptions */
$this->title = '# ' . $model->id;
?>
<div class="users-users-descriptions-view card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('users', 'توضیحات') ?></h4>
        </div>
        <p><?= $this->title ?></p>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Return'), ['/users/users/view', 'id' => $model->user_id], ['class' => 'btn btn-sm btn-warning']) ?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post']]) ?>
        </p>
        <div>
            <?= $model->descriptions ?>
        </div>
    </div>
</div>