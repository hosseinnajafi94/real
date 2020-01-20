<?php
use yii\helpers\Url;
return [
    'components' => [
    ],
    'params'     => [
        'title'            => Yii::t('correspondence', 'مکاتبات'),
        'menu'             => '
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/correspondence/default/index']) . '"><span class="menu-title">داشبورد</span></a></li>
            <li class="has-sub">
                <a class="menu-item">کارتابل پیش نویس ها</a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/create', 'type_id' => 1]) . '">ایجاد پیش نویس</a></li>
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/ongoing', 'type_id' => 1]) . '">در دست اقدام</a></li>
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/submissions', 'type_id' => 1]) . '">ارسالی ها</a></li>
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/incomings', 'type_id' => 1]) . '">دریافتی ها</a></li>
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/deleted', 'type_id' => 1]) . '">حذف شده</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a class="menu-item">کارتابل نامه ها</a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/index']) . '">دریافتی ها</a></li>
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/index']) . '">ارسالی</a></li>
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/index']) . '">ارجاع شده</a></li>
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/index']) . '">حذف شده</a></li>
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/index']) . '">ایجاد نامه</a></li>
                </ul>
            </li>
            <li class="has-sub d-none">
                <a class="menu-item">کارتابل پیام ها</a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/index']) . '">دریافتی ها</a></li>
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/index']) . '">ارسالی</a></li>
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/index']) . '">حذف شده</a></li>
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/index']) . '">ایجاد پیام</a></li>
                </ul>
            </li>
            <li class="has-sub d-none">
                <a class="menu-item">اسناد</a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/mails/index']) . '">دریافتی</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a class="menu-item">تنظیمات</a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/secretariats/index']) . '">' . Yii::t('correspondence', 'Secretariats') . '</a></li>
                    <li><a class="menu-item" href="' . Url::to(['/correspondence/patterns/index']) . '">' . Yii::t('correspondence', 'Patterns') . '</a></li>
                </ul>
            </li>
        '
    ],
];