<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersFavorites */
$this->title = Yii::t('app', 'Create');
?>
<div class="users-users-favorites-create">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>