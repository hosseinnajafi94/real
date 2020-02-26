<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsRulesListTypes */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Rules List Types'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-rules-list-types-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>