<?php
use yii\helpers\Url;
return [
    'components' => [
    ],
    'params' => [
        'title' => 'پشتیبانی',
        'menu' => '
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/ticketing/tickets/create']) . '"><span class="menu-title">ارسال تیکت جدید</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/ticketing/tickets/index']) . '"><span class="menu-title">لیست تیکت ها</span></a></li>
        '
    ],
];