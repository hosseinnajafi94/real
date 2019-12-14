<?php
/* @var $this yii\web\View */
/* @var $model \app\modules\geo\models\VML\GeoCitiesVML */
$this->params['breadcrumbs'][] = ['label' => Yii::t('geo', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="geo-geo-cities-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>