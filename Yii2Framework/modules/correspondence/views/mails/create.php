<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\Mails */

$this->title = Yii::t('correspondence', 'Create Mails');
$this->params['breadcrumbs'][] = ['label' => Yii::t('correspondence', 'Mails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mails-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
