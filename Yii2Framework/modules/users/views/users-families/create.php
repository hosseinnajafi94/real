<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersFamilies */
$this->title = Yii::t('app', 'Create');
?>
<div class="users-users-families-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>