<?php
use yii\helpers\Html;
use app\config\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersLoans */
$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users Loans'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-loans-view card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
        <p></p>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?=
            Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-sm btn-danger',
                'data'  => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method'  => 'post',
                ],
            ])
            ?>
        </p>
        <?=
        DetailView::widget([
            'model'      => $model,
            'attributes' => [
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
                'loan_type_id',
                'date_request:jdate',
                'date_start:jdate',
                'date_end:jdate',
                'amount:toman',
                'istallments',
                'form_id',
            ],
        ])
        ?>
    </div>
</div>