<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\Users */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('administration', 'Users Groups'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-groups-create">
    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items
    ]) ?>
</div>