<?php
//use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\Ipaccesses */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('administration', 'Ipaccesses'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ipaccesses-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
