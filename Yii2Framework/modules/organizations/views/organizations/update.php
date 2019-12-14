<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsVML */
//$this->title = Yii::t('organizations', 'Update Organizations: {name}', ['name' => $model->name]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('organizations', 'Update');
?>
<div class="organizations-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>