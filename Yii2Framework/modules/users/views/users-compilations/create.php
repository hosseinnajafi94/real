<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersCompilations */
$this->title = Yii::t('app', 'Create');
?>
<div class="users-users-compilations-create">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>