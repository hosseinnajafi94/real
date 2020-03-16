<?php
//use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\IpaccessesItems */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('administration', 'Ipaccesses Items'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ipaccesses-items-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>