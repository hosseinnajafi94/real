<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsListYears */

$this->title = Yii::t('organizations', 'Update Organizations List Years: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations List Years'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('organizations', 'Update');
?>
<div class="organizations-list-years-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
