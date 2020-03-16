<?php
//use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\IpaccessesItems */
$this->title = Yii::t('app', 'Update');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('administration', 'Ipaccesses Items'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('administration', 'Update');
?>
<div class="ipaccesses-items-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>