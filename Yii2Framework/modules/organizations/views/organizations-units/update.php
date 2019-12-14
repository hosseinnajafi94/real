<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsUnitsVML */
//$this->title = Yii::t('organizations', 'Update Organizations Units: {name}', [
//    'name' => $model->name,
//]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Units'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('organizations', 'Update');
?>
<div class="organizations-units-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>