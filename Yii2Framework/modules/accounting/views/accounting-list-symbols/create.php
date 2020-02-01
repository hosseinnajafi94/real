<?php
/* @var $this yii\web\View */
/* @var $model app\modules\accounting\models\DAL\AccountingListSymbols */
$this->title = Yii::t('app', 'Create');
?>
<div class="accounting-accounting-list-symbols-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>