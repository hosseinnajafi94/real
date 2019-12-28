<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsPlanning */

//$this->title = Yii::t('organizations', 'Update Organizations Planning: {name}', [
//    'name' => $model->title,
//]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Plannings'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('organizations', 'Update');
?>
<div class="organizations-planning-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>