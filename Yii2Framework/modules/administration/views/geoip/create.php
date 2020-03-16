<?php
//use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\Geoip */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('administration', 'Geoips'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="geoip-create">
    <?= $this->render('_form', [
        'model' => $model,
        'country' => $country,
    ]) ?>
</div>