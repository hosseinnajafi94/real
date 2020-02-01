<?php
/* @var $this yii\web\View */
/* @var $model app\modules\accounting\models\DAL\AccountingListSymbols */
$this->title = Yii::t('app', 'Update');
?>
<div class="accounting-accounting-list-symbols-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>