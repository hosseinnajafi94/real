<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\Telephony */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Telephonies'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telephony-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>