<?php
//use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\Dosip */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Dosips'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosip-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
