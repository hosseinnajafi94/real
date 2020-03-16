<?php
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\administration\models\VML\LoginsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('administration', 'Logins');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logins-index card">
<!--    <p>
    <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
    </p>-->
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                    ['class' => \app\config\widgets\SerialColumn::class],
                    [
                    'attribute' => 'user_id',
                    'pattern'   => '{fname} {lname}'
                ],
                'ip',
                'datetime',
            ],
        ]);
        ?>


    </div>
</div>
