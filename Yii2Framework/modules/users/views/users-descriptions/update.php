<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersDescriptions */
$this->title = Yii::t('app', 'Update');
?>
<div class="users-users-descriptions-update">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>