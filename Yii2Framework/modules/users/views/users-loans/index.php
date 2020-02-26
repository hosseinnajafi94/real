<?php
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
use app\config\widgets\SerialColumn;
use app\config\widgets\ActionColumn;
use app\config\widgets\CheckboxColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\users\models\VML\UsersLoansSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('users', 'Users Loans');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-loans-index card">
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
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                    ['class' => SerialColumn::class],
                    [
                    'attribute' => 'type_id',
                    'pattern'   => '{title}'
                ],
                    [
                    'attribute' => 'position_id',
                    'pattern'   => '{name}'
                ],
                    [
                    'attribute' => 'group_id',
                    'pattern'   => '{title}'
                ],
                    [
                    'attribute' => 'user_id',
                    'pattern'   => '{fname}'
                ],
                //'loan_type_id',
                //'date_request',
                //'date_start',
                //'date_end',
                //'amount',
                //'istallments',
                //'form_id',
                ['class' => CheckboxColumn::class],
                    ['class' => ActionColumn::class],
            ],
        ]);
        ?>


    </div>
</div>
