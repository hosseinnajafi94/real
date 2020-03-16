<?php
//use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\Telephony */
$this->title = Yii::t('app', 'Update');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Telephonies'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('users', 'Update');
?>
<div class="telephony-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>