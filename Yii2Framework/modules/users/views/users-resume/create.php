<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersResume */
$this->title = Yii::t('app', 'Create');
?>
<div class="users-users-resume-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>