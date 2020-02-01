<?php
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsListYears */
$this->title = Yii::t('app', 'Update');
?>
<div class="accounting-organizations-update">
    <?= $this->render('_form', [
        'model' => $model,
        'types' => $types,
    ]) ?>
</div>