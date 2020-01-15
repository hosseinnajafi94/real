<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersFamilies */
$this->title = Yii::t('app', 'Update');
?>
<div class="users-users-families-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>