<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersReagents */
$this->title = Yii::t('app', 'Update');
?>
<div class="users-users-reagents-update">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>
