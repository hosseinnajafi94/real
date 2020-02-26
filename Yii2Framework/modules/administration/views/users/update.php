<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\Users */
$this->title = Yii::t('app', 'Update');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('administration', 'Users Groups'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="users-groups-update">
    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items
    ]) ?>
</div>