<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsListYears */

$this->title = Yii::t('organizations', 'Create Organizations List Years');
$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations List Years'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-list-years-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
