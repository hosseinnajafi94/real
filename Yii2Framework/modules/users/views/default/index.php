<?php
/* @var $this yii\web\View */
$this->title = Yii::t('users', 'داشبورد');
?>
<div class="users-default-index">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= $this->title ?></h4>
            </div>
        </div>
        <div class="card-block">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-12">
            <a href="">
                <div class="card">
                    <div class="card-body">
                        <div class="px-3 py-3">
                            <div class="media">
                                <div class="media-body text-left align-self-center">
                                    <i class="tyf tyf-leave-application info font-large-3 float-right"></i>
                                </div>
                                <div class="media-body text-right align-self-center">
                                    <span>درخواست مرخصی</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-12">
            <a href="">
                <div class="card">
                    <div class="card-body">
                        <div class="px-3 py-3">
                            <div class="media">
                                <div class="media-body text-left align-self-center">
                                    <i class="tyf tyf-mission info font-large-3 float-right"></i>
                                </div>
                                <div class="media-body text-right align-self-center">
                                    <span>درخواست ماموریت</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-12">
            <a href="<?= yii\helpers\Url::to(['/users/users-loans/create']) ?>">
                <div class="card">
                    <div class="card-body">
                        <div class="px-3 py-3">
                            <div class="media">
                                <div class="media-body text-left align-self-center">
                                    <i class="tyf tyf-loan info font-large-3 float-right"></i>
                                </div>
                                <div class="media-body text-right align-self-center">
                                    <span>درخواست وام/مساعده</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-12">
            <a href="">
                <div class="card">
                    <div class="card-body">
                        <div class="px-3 py-3">
                            <div class="media">
                                <div class="media-body text-left align-self-center">
                                    <i class="tyf tyf-payroll info font-large-3 float-right"></i>
                                </div>
                                <div class="media-body text-right align-self-center">
                                    <span>فیش حقوقی</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-12">
            <a href="">
                <div class="card">
                    <div class="card-body">
                        <div class="px-3 py-3">
                            <div class="media">
                                <div class="media-body text-left align-self-center">
                                    <i class="tyf tyf-workflow info font-large-3 float-right"></i>
                                </div>
                                <div class="media-body text-right align-self-center">
                                    <span>درخواست تغییر شیفت</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-12">
            <a href="">
                <div class="card">
                    <div class="card-body">
                        <div class="px-3 py-3">
                            <div class="media">
                                <div class="media-body text-left align-self-center">
                                    <i class="tyf tyf-report info font-large-3 float-right"></i>
                                </div>
                                <div class="media-body align-self-center text-right">
                                    <span>گزارش گیری</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>