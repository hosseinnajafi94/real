<?php
//use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\Ipaccesses */
$this->title = Yii::t('app', 'Update');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('administration', 'Ipaccesses'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('administration', 'Update');
?>
<div class="ipaccesses-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
