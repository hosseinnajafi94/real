<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersCompilations */
$this->title = Yii::t('app', 'Update');
?>
<div class="users-compilations-update">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>