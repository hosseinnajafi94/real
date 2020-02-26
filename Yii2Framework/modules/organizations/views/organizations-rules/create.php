<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsRules */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Rules'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-rules-create">
    <?=
    $this->render('_form', [
        'model' => $model,
        'orgs'  => $orgs,
        'types' => $types,
    ])
    ?>
</div>
