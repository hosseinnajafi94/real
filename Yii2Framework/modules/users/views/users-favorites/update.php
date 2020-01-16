<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersFavorites */
$this->title = Yii::t('app', 'Update');
?>
<div class="users-users-favorites-update">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>