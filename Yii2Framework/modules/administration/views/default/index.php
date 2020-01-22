<?php
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\VML\Administration */
$this->registerCss("
table * {font-size: 13px;line-height: 1.5;}
table tbody tr th {width: 50%;text-align: left;padding: 2px 5px;}
table tbody tr th:after {content: ' : ';}
table tbody tr td {width: 50%;text-align: right;padding: 2px 5px;direction: ltr !important;}
");
?>
<div class="administration-default-index">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-block" style="min-height: 228px;">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-block" style="min-height: 228px;">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>زمان راه اندازی سرور</th>
                                <td><?= $model->starttime; ?></td>
                            </tr>
                            <tr>
                                <th>زمان سرور</th>
                                <td><?= $model->servertime ?></td>
                            </tr>
                            <tr>
                                <th>آی پی سرور</th>
                                <td><?= $model->serverip ?></td>
                            </tr>
                            <tr>
                                <th>دامنه تیم یار</th>
                                <td><?= $model->serverdomain ?></td>
                            </tr>
                            <tr>
                                <th>کل فضای دیسک</th>
                                <td><?= $model->disk_total_space ?></td>
                            </tr>
                            <tr>
                                <th>فضای اشغال شده توسط پروژه</th>
                                <td><?= $model->projectsize ?></td>
                            </tr>
                            <tr>
                                <th>کل فضای اشغال شده</th>
                                <td><?= $model->disk_occupied_space ?></td>
                            </tr>
                            <tr>
                                <th>فضای خالی</th>
                                <td><?= $model->disk_free_space ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-block" style="min-height: 300px;">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>شماره نسخه اجرایی</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>شماره ساخت SDK</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>تاریخ ایجاد SDK</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>شماره ساخت هسته</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>تاریخ ایجاد هسته</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>نسخه Mysql</th>
                                <td><?= $model->dbver ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-block" style="min-height: 300px;">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <th>نام مشتری</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>شناسه مجوز</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>نوع مجوز</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>تاریخ انقضاء مجوز</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>تاریخ انقضاء گواهینامه</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>تاریخ انقضاء پشتیبانی</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>حداکثر تعداد شعبه ها</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>تعداد شعبه های فعال</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>حداکثر کاربران آنلاین</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>کاربران فعال</th>
                                <td><?= '---' ?></td>
                            </tr>
                            <tr>
                                <th>حداکثر کاربران آنلاین پورتال</th>
                                <td><?= '---' ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-block" style="min-height: 300px;">
                </div>
            </div>
        </div>
    </div>
</div>
