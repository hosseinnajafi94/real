<?php
use app\config\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model \app\modules\users\models\DAL\UsersAccounts */
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('users', 'Users Accounts');
$this->params['breadcrumbs'][] = '# ' . $model->id;
?>
<div class="users-users-accounts-view box">
    <div class="box-header"><?= $model->id ?></div>
    <div class="table-responsive">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'type_id',
                    'pattern'   => '{title}'
                ],
                [
                    'attribute' => 'amount_v',
                    'format'    => 'toman',
                    'visible'   => $model->type_id == 1,
                ],
                [
                    'attribute' => 'amount_b',
                    'format'    => 'toman',
                    'visible'   => $model->type_id == 2,
                ],
                [
                    'attribute' => 'payment_id',
                    'pattern'   => '# {id}',
                    'url'       => ['/users/users-payments/view', 'id' => '{id}'],
                    'visible'   => $model->payment_id != null,
                ],
                [
                    'attribute' => 'safe_id',
                    'pattern'   => '# {id} / {pro_name}',
                    'url'       => ['/safes/safes/view', 'id' => '{id}'],
                    'visible'   => $model->safe_id != null,
                ],
                [
                    'attribute' => 'clear_id',
                    'pattern'   => '# {id}',
                    'url'       => ['/users/users-clearing/view', 'id' => '{id}'],
                    'visible'   => $model->clear_id != null,
                ],
                'datetime:jdatetime',
            ],
        ]) ?>
    </div>
</div>