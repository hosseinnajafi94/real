<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsPositionsVML */
//$this->title = Yii::t('organizations', 'Update Organizations Positions: {name}', [
//    'name' => $model->name,
//]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Positions'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('organizations', 'Update');
?>
<div class="organizations-positions-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>