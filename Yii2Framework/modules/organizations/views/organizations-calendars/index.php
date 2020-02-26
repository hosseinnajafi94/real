<?php
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\organizations\models\VML\OrganizationsCalendarsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title                   = Yii::t('organizations', 'Organizations Calendars');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-calendars-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
        <p></p>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </p>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                    ['class' => app\config\widgets\SerialColumn::class],
                ['attribute'=>'org_id',
                  'pattern'=>'{name}'  
                    ],
                'title',
                    ['class' => \app\config\widgets\ActionColumn::class],
            ],
        ]);
        ?>


    </div>
</div>
