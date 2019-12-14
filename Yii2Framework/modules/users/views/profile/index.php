<?php
use yii\helpers\Html;
use app\config\widgets\DetailView;
use app\config\components\functions;
/* @var $this \yii\web\View */
/* @var $model \app\modules\users\models\VML\ProfileVML */
$this->params['breadcrumbs'][] = Yii::t('users', 'Profile');
?>
<div class="profile-index box">
    <div class="box-header"><?= Yii::t('users', 'Profile') ?></div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <p>
                <?= Html::a(Yii::t('app', 'Update'), ['update'], ['class' => 'btn btn-sm btn-default']) ?>
                <?= Html::a(Yii::t('users', 'Change Password'), ['change-password'], ['class' => 'btn btn-sm btn-default']) ?>
            </p>
            <div class="table-responsive">
                <?= DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        'fname',
                        'lname',
                        'mobile',
                        'codemelli',
                        'email',
                        [
                            'attribute' => 'province_id',
                            'pattern'   => '{title}',
                        ],
                        [
                            'attribute' => 'city_id',
                            'pattern'   => '{title}',
                        ],
                        'codeposti',
                        'address',
                        [
                            'attribute' => 'avatar',
                            'format'    => ['imgLink', 'users/avatar']
                        ],
                        'avatar_confirmed:bool',
                        [
                            'attribute' => 'cardmelli',
                            'format'    => ['imgLink', 'users/cardmelli']
                        ],
                        'cardmelli_confirmed:bool',
                    ],
                ]) ?>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <p>
                <?= Html::a(Yii::t('app', 'Create'), ['bank-create'], ['class' => 'btn btn-sm btn-default view modalsm with-btn nolayout']) ?>
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
                                            echo Html::a('<i class="fa fa-fw fa-check"></i>', ['bank-default', 'id' => $bank->id], ['data' => ['method' => 'post', 'confirm' => Yii::t('app', 'Are you sure?')]]);
                                        }
                                        ?>
                                        <?= Html::a('<i class="fa fa-fw fa-eye"></i>'      , ['bank-view', 'id' => $bank->id], ['class' => 'view', 'title' => Yii::t('app', 'Details')]) ?>
                                        <?= Html::a('<i class="fa fa-fw fa-edit"></i>'     , ['bank-update', 'id' => $bank->id], ['class' => 'view modalsm with-btn nolayout', 'title' => Yii::t('app', 'Update')]) ?>
                                        <?php // Html::a('<i class="fa fa-fw fa-trash-alt"></i>', ['bank-delete', 'id' => $bank->id], ['data' => ['method' => 'post', 'confirm' => Yii::t('app', 'Are you sure?')]]) ?>
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
                <?= Html::a(Yii::t('users', 'افزایش موجودی کیف پول'), ['addmoney'], ['class' => 'btn btn-sm btn-default']) ?>
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
                                        <?= Html::a('<i class="fa fa-fw fa-eye"></i>', ['account', 'id' => $account->id], ['class' => 'view', 'title' => Yii::t('app', 'Details')]) ?>
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