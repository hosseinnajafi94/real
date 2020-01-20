<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\correspondence\models\VML\MailsSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('correspondence', 'Mails');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mails-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('correspondence', 'Create Mails'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'type_id',
            'secretariat_id',
            'pattern_id',
            //'receiver_type_id',
            //'receiver1_id',
            //'receiver2_id',
            //'status_id',
            //'text:ntext',
            //'section_1',
            //'section_2',
            //'section_3',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
