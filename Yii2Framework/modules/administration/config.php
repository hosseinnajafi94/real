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
            <!-- <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/backup']) . '"><span class="menu-title">پشتیبان</span></a></li> -->
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/settings/index']) . '"><span class="menu-title">تنظیمات</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/users-list-groups/index']) . '"><span class="menu-title">گروه ها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/users/index']) . '"><span class="menu-title">کاربرها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/sys-modules/index']) . '"><span class="menu-title">ماژولها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/sys-modules/update']) . '"><span class="menu-title">به روز رسانی *</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/sys-sounds/index']) . '"><span class="menu-title">صداها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/sys-events/index']) . '"><span class="menu-title">رویدادها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/sys-logs/index']) . '"><span class="menu-title">روزنامه</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/statistic']) . '"><span class="menu-title">آمار</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/logins/index']) . '"><span class="menu-title">نشست ها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/access/index']) . '"><span class="menu-title">دسترسی آی پی</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/settings/security']) . '"><span class="menu-title">امنیت</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/telephony/index']) . '"><span class="menu-title">سیستم تلفنی</span></a></li>
            <!-- <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/permission']) . '"><span class="menu-title">دسترسی ها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/activity']) . '"><span class="menu-title">فعالیت ها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/administration/default/location']) . '"><span class="menu-title">موقعیت مکانی</span></a></li> -->
        '
    ],
];