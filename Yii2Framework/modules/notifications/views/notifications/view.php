<?php
use yii\bootstrap4\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\notifications\models\DAL\Notifications */
$this->title = $model->title;
?>
<div class="notifications-view card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('notifications', 'Notifications') ?></h4>
        </div>
        <p><?= $this->title ?></p>
    </div>
    <div class="card-block">
        <div style="margin: 25px 0;"><?= $model->description ?></div>
        <div><a class="btn btn-sm btn-info disabled pt-0 pb-0" style="direction: ltr !important;"><i class="fa fa-clock-o"></i> <?= app\config\components\functions::tojdatetime($model->datetime) ?></a></div>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning mb-0']) ?>
    </div>
</div>