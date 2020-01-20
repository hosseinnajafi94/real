<?php
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\Mails */
$this->title = Yii::t('app', 'Create');
?>
<div class="mails-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>