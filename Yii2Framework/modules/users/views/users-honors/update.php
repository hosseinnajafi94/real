<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersHonors */
$this->title = Yii::t('app', 'Update');
?>
<div class="users-users-honors-update">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>