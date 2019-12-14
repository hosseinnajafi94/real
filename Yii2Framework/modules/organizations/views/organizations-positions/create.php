<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsPositionsVML */
//$this->title = Yii::t('organizations', 'Create Organizations Positions');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Positions'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-positions-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
