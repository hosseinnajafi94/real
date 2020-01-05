<?php
use yii\widgets\Pjax;
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\correspondence\models\VML\MailsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('correspondence', $type_id == 1 ? 'پیش نویس' : 'نامه');
?>
<div class="mails-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </p>
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],
                //'user_id',
                //'type_id',
                //'status_id',
                [
                    'attribute' => 'pattern_id',
                    'pattern' => '{title}'
                ],
                //'text',
                //'section_1',
                //'section_2',
                //'section_3',
                ['class' => app\config\widgets\ActionColumn::class],
            ],
        ]) ?>
        <?php Pjax::end(); ?>
    </div>
</div>