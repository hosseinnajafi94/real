<?php
use yii\helpers\Html;
use app\config\widgets\DetailView;
use app\config\components\functions;
use app\modules\safes\models\DAL\Safes;
use app\modules\users\models\SRL\UsersSRL;
/* @var $this yii\web\View */
/* @var $model \app\modules\users\models\DAL\Users */
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = UsersSRL::getUserFullname($model);
?>
<div class="users-users-view box">
    <div class="box-header"><?= UsersSRL::getUserFullname($model) ?></div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <p>
                <?= Html::a(Yii::t('app', 'Create'), ['create']                    , ['class' => 'btn btn-sm btn-success']) ?>
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post']]) ?>
                <?= $model->cardmelli_confirmed ? '' : Html::a(Yii::t('users', 'Confirm Cardmelli'), ['confirm-cardmelli', 'id' => $model->id], ['class' => 'btn btn-sm btn-default', 'data' => ['confirm' => Yii::t('app', 'Are you sure?'), 'method' => 'post']]) ?>
                <?= $model->avatar_confirmed    ? '' : Html::a(Yii::t('users', 'Confirm Avatar')   , ['confirm-avatar', 'id' => $model->id], ['class' => 'btn btn-sm btn-default', 'data' => ['confirm' => Yii::t('app', 'Are you sure?'), 'method' => 'post']]) ?>
            </p>
            <div class="table-responsive">
                <?= DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        //'group_id',
                        //'status_id',
                        //'username',
                        //'password_hash',
                        //'password_reset_token',
                        //'auth_key',
                        'fname',
                        'lname',
                        'mobile',
                        'codemelli',
                        'email:email',
                        [
                            'attribute' => 'province_id',
                            'pattern'   => '{title}',
                            'url'       => ['/geo/geo-provinces/view', 'id' => '{id}']
                        ],
                        [
                            'attribute' => 'city_id',
                            'pattern'   => '{title}',
                            'url'       => ['/geo/geo-cities/view', 'id' => '{id}']
                        ],
                        'codeposti',
                        'address',
                        [
                            'attribute' => 'avatar',
                            'format'    => ['img', 'users/avatar']
                        ],
                        'avatar_confirmed:bool',
                        [
                            'attribute' => 'cardmelli',
                            'format'    => ['img', 'users/cardmelli']
                        ],
                        'cardmelli_confirmed:bool',
                        [
                            'label' => Yii::t('users', 'Purchase Count'),
                            'value' => function ($model) {
                                $count = Safes::find()->where(['buyer_id' => $model->id])->count();
                                return functions::number_format($count);
                            }
                        ],
                        [
                            'label' => Yii::t('users', 'Sales Count'),
                            'value' => function ($model) {
                                $count = Safes::find()->where(['seller_id' => $model->id])->count();
                                return functions::number_format($count);
                            }
                        ],
                    ],
                ]) ?>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <p>
                <?= Html::a(Yii::t('app', 'Create'), ['/users/users-banks/create', 'user_id' => $model->id], ['class' => 'btn btn-sm btn-success view modalsm with-btn nolayout']) ?>
            </p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>پیشفرض</th>
                            <th>نام بانک</th>
                            <th>شماره کارت</th>
                            <th>شماره حساب</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /* @var $banks app\modules\users\models\DAL\UsersBanks[] */
                        if ($banks) {
                            foreach ($banks as $bank) {
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <i class="fa fa-fw fa-<?= ($bank->default ? 'check text-success' : 'times text-danger') ?>"></i>
                                    </td>
                                    <td><?= $bank->bank->title ?></td>
                                    <td><?= $bank->card_number ?></td>
                                    <td><?= $bank->account_number ?></td>
                                    <td class="text-left">
                                        <?php
                                        if ($bank->default) {
                                            echo '<i class="fa fa-fw fa-check gray"></i>';
                                        }
                                        else {
                                            echo Html::a('<i class="fa fa-fw fa-check"></i>', ['/users/users-banks/default', 'id' => $bank->id, 'user_id' => $bank->user_id], ['data' => ['method' => 'post', 'confirm' => Yii::t('app', 'Are you sure?')]]);
                                        }
                                        ?>
                                        <?= Html::a('<i class="fa fa-fw fa-eye"></i>'      , ['/users/users-banks/view', 'id' => $bank->id, 'user_id' => $bank->user_id], ['class' => 'view', 'title' => Yii::t('app', 'Details')]) ?>
                                        <?= Html::a('<i class="fa fa-fw fa-edit"></i>'     , ['/users/users-banks/update', 'id' => $bank->id, 'user_id' => $bank->user_id], ['class' => 'view modalsm with-btn nolayout', 'title' => Yii::t('app', 'Update')]) ?>
                                        <?= Html::a('<i class="fa fa-fw fa-trash-alt"></i>', ['/users/users-banks/delete', 'id' => $bank->id, 'user_id' => $bank->user_id], ['data' => ['method' => 'post', 'confirm' => Yii::t('app', 'Are you sure?')]]) ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else {
                            ?>
                            <tr>
                                <td class="text-center gray" colspan="5">--&nbsp;بدون محتوی&nbsp;--</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <hr/>
            <p>
                <?= Html::a(Yii::t('app', 'افزایش حساب'), ['/users/users-accounts/increase', 'user_id' => $model->id], ['class' => 'btn btn-sm btn-success view modalsm with-btn nolayout']) ?>
                <?= Html::a(Yii::t('app', 'کاهش حساب')  , ['/users/users-accounts/decrease', 'user_id' => $model->id], ['class' => 'btn btn-sm btn-danger view modalsm with-btn nolayout' . ($viewUserAccount->total == 0 ? ' disabled' : '')]) ?>
            </p>
            <div class="alert alert-info">موجودی کیف پول: <?= functions::toman($viewUserAccount->total) ?></div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">زمان</th>
                            <th class="text-center">مبلغ (تومان)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /* @var $accounts app\modules\users\models\DAL\UsersAccounts[] */
                        if ($accounts) {
                            foreach ($accounts as $account) {
                                $icon      = 'question';
                                $className = '';
                                $amount    = '?';
                                if ($account->type_id == 1) {
                                    $amount    = functions::number_format($account->amount_v);
                                    $icon      = 'arrow-up text-success';
                                    $className = 'text-success';
                                }
                                else if ($account->type_id == 2) {
                                    $amount    = functions::number_format($account->amount_b);
                                    $icon      = 'arrow-down text-danger';
                                    $className = 'text-danger';
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><i class="fa fa-fw fa-<?= $icon ?>"></i></td>
                                    <td class="text-center" dir="ltr"><?= functions::tojdatetime($account->datetime) ?></td>
                                    <td class="text-center <?= $className ?>"><?= $amount ?></td>
                                    <td class="text-center">
                                        <?= Html::a('<i class="fa fa-fw fa-eye"></i>', ['/users/users-accounts/view', 'id' => $account->id, 'user_id' => $account->user_id], ['class' => 'view', 'title' => Yii::t('app', 'Details')]) ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else {
                            ?>
                            <tr>
                                <td class="text-center gray" colspan="4">--&nbsp;بدون محتوی&nbsp;--</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>