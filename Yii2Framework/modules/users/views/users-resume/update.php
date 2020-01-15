<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersResume */
$this->title = Yii::t('app', 'Update');
?>
<div class="users-users-resume-update">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>