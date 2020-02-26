<?php
use yii\helpers\Url;
return [
    'components' => [
    ],
    'params'     => [
        //----------------------------------------------------------------------
        'group.Admin'      => 1,
        'group.User'       => 2,
        //----------------------------------------------------------------------
        'status.Active'    => 1,
        'status.InActive'  => 2,
        'status.Delete'    => 3,
        //----------------------------------------------------------------------
        'defaultAvatar'    => 'default.png',
        'rememberMeExpire' => 60 * 60 * 24 * 30, // 30 Days
        //----------------------------------------------------------------------
        'title'            => Yii::t('users', 'Users'),
        'menu'             => '
            <li class="nav-item"><a class="menu-item menu2" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">داشبورد</span></a></li>
            <li class="nav-item"><a class="menu-item menu2" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">ویجت</span></a></li>
            <li class="nav-item"><a class="menu-item menu2" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">چارت</span></a></li>
            <li class="nav-item"><a class="menu-item menu2" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">شغل</span></a></li>
            <li class="nav-item"><a class="menu-item menu2" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">قوانین</span></a></li>
            <li class="nav-item has-sub">
                <a class="menu-item menu2"><span class="menu-title">کارگزینی</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">درخواست</span></a></li>
                    <li><a class="menu-item" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">استخدام</span></a></li>
                    <li><a class="menu-item" href="' . Url::to(['/users/users-orders/index']) . '"><span class="menu-title">احکام</span></a></li>
                    <li><a class="menu-item" href="' . Url::to(['/users/users/index']) . '"><span class="menu-title">پرونده</span></a></li>
                </ul>
            </li>
            <li class="nav-item has-sub">
                <a class="menu-item menu2"><span class="menu-title">حقوق و دستمزد</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">لیست حقوق</span></a></li>
                    <li><a class="menu-item" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">لیست معوقه</span></a></li>
                    <li><a class="menu-item" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">عیدی</span></a></li>
                    <li><a class="menu-item" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">سنوات</span></a></li>
                    <li><a class="menu-item" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">مانده مرخصی</span></a></li>
                    <li><a class="menu-item" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">فیش حقوقی /معوقه</span></a></li>
                    <li><a class="menu-item" href="' . Url::to(['/users/users-loans/index']) . '"><span class="menu-title">وام / مساعده</span></a></li>
                </ul>
            </li>
            <li class="nav-item has-sub">
                <a class="menu-item menu2"><span class="menu-title">ورود و خروج</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">تقویم کاری</span></a></li>
                    <li><a class="menu-item" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">زمان های کاری</span></a></li>
                    <li><a class="menu-item" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">ماشین ساعت زنی</span></a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="menu-item menu2" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">گزارش گیری</span></a></li>
            <li class="nav-item has-sub">
                <a class="menu-item menu2"><span class="menu-title">دسترسی ها</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">کاربر ها</span></a></li>
                    <li><a class="menu-item" href="' . Url::to(['/users/default/index']) . '"><span class="menu-title">گروه ها</span></a></li>
                </ul>
            </li>
        '
    ],
];
