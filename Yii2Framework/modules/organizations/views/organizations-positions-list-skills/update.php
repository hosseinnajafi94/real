<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\VML\OrganizationsPositionsListSkillsVML */
//$this->title = Yii::t('organizations', 'Update Organizations Positions List Skills: {name}', [
//    'name' => $model->title,
//]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Positions List Skills'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('organizations', 'Update');
?>
<div class="organizations-positions-list-skills-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>