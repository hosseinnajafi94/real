<?php
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\MailsListPatterns */
$this->title = Yii::t('app', 'Create');
?>
<div class="patterns-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>