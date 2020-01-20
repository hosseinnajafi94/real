<?php
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\Secretariats */
$this->title = Yii::t('app', 'Create');
?>
<div class="secretariats-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
