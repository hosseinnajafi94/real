<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsPlanning */

//$this->title = Yii::t('organizations', 'Create Organizations Planning');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Plannings'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-planning-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>