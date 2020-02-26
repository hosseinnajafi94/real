<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsRulesListTypes */
$this->title = Yii::t('app','Update');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Rules List Types'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('organizations', 'Update');
?>
<div class="organizations-rules-list-types-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>