<?php
/* @var $this yii\web\View */
/* @var $model \app\modules\geo\models\VML\GeoCitiesVML */
$this->params['breadcrumbs'][] = ['label' => Yii::t('geo', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>
<div class="geo-geo-cities-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>