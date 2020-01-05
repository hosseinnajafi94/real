<?php
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\MailsListPatterns */
$this->title = Yii::t('app', 'Update');
//$this->title = Yii::t('correspondence', 'Update Mails List Patterns: {name}', [
//    'name' => $model->title,
//]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('correspondence', 'Mails List Patterns'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('correspondence', 'Update');
?>
<div class="patterns-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>