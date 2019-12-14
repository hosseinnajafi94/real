<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsUnitsVML */
//$this->title = Yii::t('organizations', 'Create Organizations Units');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Units'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-units-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>