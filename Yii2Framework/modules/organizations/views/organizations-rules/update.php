<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsRules */
$this->title                   = Yii::t('app', 'Update');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Rules'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('organizations', 'Update');
?>
<div class="organizations-rules-update">
    <?=
    $this->render('_form', [
        'model' => $model,
        'orgs'  => $orgs,
        'types' => $types,
    ])
    ?>
</div>