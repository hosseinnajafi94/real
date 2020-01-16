<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersDescriptions */
$this->title = Yii::t('app', 'Create');
?>
<div class="users-users-descriptions-create">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>