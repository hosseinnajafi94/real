<?php
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\SecretariatsPatterns */
$this->title = Yii::t('app', 'Update');
?>
<div class="correspondence-secretariats-patterns-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>