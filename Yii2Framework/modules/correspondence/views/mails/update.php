<?php
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\Mails */
$this->title = Yii::t('app', 'Update');
?>
<div class="mails-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>