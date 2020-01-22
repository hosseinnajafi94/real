<?php
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\VML\Administration */
$this->registerCss("
table tbody tr th {text-align: left;padding: 2px 5px;}
table tbody tr td {text-align: right;padding: 2px 5px;direction: ltr !important;}
");
?>
<div class="administration-default-index">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-block">
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
</div>
