<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsCalendars */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Calendars'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-calendars-create">
    <?= $this->render('_form', [
        'model' => $model,
        'name'  => $name,
    ]) ?>

</div>
