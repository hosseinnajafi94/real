<?php
use yii\helpers\Url;
return [
    'components' => [
    ],
    'params' => [
        //----------------------------------------------------------------------
        'title' => Yii::t('organizations', 'Organizations'),
        'menu' => '
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/organizations/organizations/index']) . '"><span class="menu-title">لیست شعبه ها</span></a></li>
            <li class="nav-item"><a class="menu-item" href="' . Url::to(['/organizations/organizations/create']) . '"><span class="menu-title">افزودن شعبه جدید</span></a></li>
        '
    ],
];