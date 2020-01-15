<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersReagents */
$this->title = Yii::t('app', 'Create');
?>
<div class="users-users-reagents-create">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>