<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsVML */
//$this->title = Yii::t('organizations', 'Create Organizations');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
