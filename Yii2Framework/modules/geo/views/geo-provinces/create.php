<?php
/* @var $this yii\web\View */
/* @var $model \app\modules\geo\models\VML\GeoProvincesVML */
$this->params['breadcrumbs'][] = ['label' => Yii::t('geo', 'Provinces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Create');
?>
<div class="geo-geo-provinces-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>