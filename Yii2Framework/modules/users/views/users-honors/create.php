<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersHonors */
$this->title = Yii::t('app', 'Create');
?>
<div class="users-users-honors-create">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>