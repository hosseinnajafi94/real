<?php
/* @var $this yii\web\View */
/* @var $model \app\modules\geo\models\VML\GeoProvincesVML */
$this->params['breadcrumbs'][] = ['label' => Yii::t('geo', 'Provinces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="geo-geo-provinces-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>