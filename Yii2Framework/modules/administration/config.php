<?php
use yii\helpers\Url;
return [
    'components' => [
    ],
    'params' => [
        //----------------------------------------------------------------------
        'title' => Yii::t('administration', 'Administration'),
        'menu' => '
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">مرور کلی</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">به روز رسانی *</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">تنظیمات</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">پشتیبان</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">گروه ها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">کاربرها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">ماژولها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">صداها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">رویدادها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">روزنامه</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">آمار</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">نشست ها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">دسترسی آی پی</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">امنیت</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">سیستم تلفنی</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">دسترسی ها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">فعالیت ها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/index']) . '"><span class="menu-title">موقعیت مکانی</span></a></li>
        '
    ],
];