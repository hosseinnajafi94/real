<?php
use yii\helpers\Url;
use app\modules\accounting\models\DAL\AccountingSettings;
use app\modules\organizations\models\DAL\OrganizationsListYears;
$session = Yii::$app->session;
$year_id = $session->get('default_year_id');
$title   = '---';
if ($year_id) {
    $model = OrganizationsListYears::findOne($year_id);
    if ($model !== null) {
        $title = $model->title;
    }
}
if ($title === '---') {
    $settings = AccountingSettings::findOne(1);
    if ($settings->id_p07) {
        $model = OrganizationsListYears::findOne($settings->id_p07);
        if ($model !== null) {
            $title = $model->title;
        }
    }
}
return [
    'components' => [
    ],
    'params'     => [
        //----------------------------------------------------------------------
        'title' => Yii::t('accounting', 'Accounting'),
        'menu'  => '
            <li class="nav-item noclose checkitem">
                <a class="menu-item menu2" style="padding: 0 !important;">
                    <label class="mb-0" style="padding: 2px 14px 2px 10px !important;display: inline-block;width: calc(90% - 24px);cursor: pointer;" onclick="window.location = \'' . Url::to(['/accounting/default/index']) . '\';">
                        <span class="menu-title">' . $title . '</span>
                    </label>
                    <span onclick="$(\'#modalSettings\').modal(\'show\');" class="fa fa-ellipsis-v" data-id="1" style="width: 10%;text-align: center;padding: 8px 0;position: relative;top: 3px;"></span>
                </a>
            </li>
            <li class="nav-item has-sub">
                <a><span class="menu-title">عملیات</span></a>
                <ul class="menu-content">
                    <li class="noclose checkitem">
                        <a class="menu-item menu2" style="padding: 0 !important;">
                            <label class="mb-0" style="padding: 2px 14px 2px 10px !important;display: inline-block;width: calc(90% - 24px);cursor: pointer;" onclick="window.location = \'' . Url::to(['/accounting/accounts/index']) . '\';">
                                <span class="menu-title">حساب ها</span>
                            </label>
                            <span onclick="window.location = \'' . Url::to(['/accounting/accounting-formats/index']) . '\';" class="fa fa-ellipsis-v" style="width: 10%;text-align: center;padding: 8px 0;position: relative;top: 3px;"></span>
                        </a>
                    </li>
                    <li class="noclose checkitem d-none">
                        <a class="menu-item menu2" style="padding: 0 !important;">
                            <label class="mb-0" style="padding: 2px 14px 2px 10px !important;display: inline-block;width: calc(90% - 24px);cursor: pointer;" onclick="window.location = \'' . Url::to(['/accounting/default/index']) . '\';">
                                <span class="menu-title">اسناد</span>
                            </label>
                            <span onclick="window.location = \'' . Url::to(['/accounting/default/index']) . '\';" class="fa fa-ellipsis-v" style="width: 10%;text-align: center;padding: 8px 0;position: relative;top: 3px;"></span>
                        </a>
                    </li>
                    <li class="noclose checkitem d-none">
                        <a class="menu-item menu2" style="padding: 0 !important;">
                            <label class="mb-0" style="padding: 2px 14px 2px 10px !important;display: inline-block;width: calc(90% - 24px);cursor: pointer;" onclick="window.location = \'' . Url::to(['/accounting/default/index']) . '\';">
                                <span class="menu-title">خزانه داری</span>
                            </label>
                            <span onclick="window.location = \'' . Url::to(['/accounting/default/index']) . '\';" class="fa fa-ellipsis-v" style="width: 10%;text-align: center;padding: 8px 0;position: relative;top: 3px;"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-sub d-none">
                <a><span class="menu-title">گزارشات</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item"><span class="menu-title">اسناد</span></a></li>
                    <li><a class="menu-item"><span class="menu-title">دفتر حساب</span></a></li>
                    <li><a class="menu-item"><span class="menu-title">ترازنامه</span></a></li>
                    <li><a class="menu-item"><span class="menu-title">تراز آزمایشی</span></a></li>
                    <li><a class="menu-item"><span class="menu-title">کل / معین</span></a></li>
                    <li><a class="menu-item"><span class="menu-title">مانده به تفکیک حسابها</span></a></li>
                    <li><a class="menu-item"><span class="menu-title">دفتر عملیات نقدی</span></a></li>
                    <li><a class="menu-item"><span class="menu-title">مقایسه حسابها</span></a></li>
                    <li><a class="menu-item"><span class="menu-title">سود و زیان</span></a></li>
                    <li><a class="menu-item"><span class="menu-title">جزئیات حساب</span></a></li>
                    <li><a class="menu-item"><span class="menu-title">تحریر دفاتر</span></a></li>
                    <li><a class="menu-item"><span class="menu-title">گزارش ساز</span></a></li>
                </ul>
            </li>
            
            <li class="nav-item has-sub">
                <a><span class="menu-title">تنظیمات</span></a>
                <ul class="menu-content">
                    <li class="nav-item has-sub">
                        <a class="menu-item"><span class="menu-title">اطلاعات پایه</span></a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="' . Url::to(['/accounting/accounting-list-symbols/index']) . '"><span class="menu-title">ارز های خارجی</span></a></li>
                            <li><a class="menu-item" href="' . Url::to(['/accounting/organization/index']) . '"><span class="menu-title">شعبه</span></a></li>
                            <li><a class="menu-item" href="' . Url::to(['/accounting/accounting-settings/index']) . '"><span class="menu-title">تنظیمات سیستم</span></a></li>
                            <li><a class="menu-item" href="' . Url::to(['/accounting/accounting-settings/index2']) . '"><span class="menu-title">الگوی تایید پیش‌فرض</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item has-sub d-none">
                        <a class="menu-item"><span class="menu-title">امکانات</span></a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="' . Url::to(['/accounting/accounting-list-symbols/index']) . '"><span class="menu-title">ابزارها</span></a></li>
                            <li><a class="menu-item" href="' . Url::to(['/accounting/accounting-list-symbols/index']) . '"><span class="menu-title">بررسی ایرادات حسابداری</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item has-sub d-none">
                        <a class="menu-item"><span class="menu-title">دسترسی ها</span></a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="' . Url::to(['/accounting/accounting-list-symbols/index']) . '"><span class="menu-title">کاربرها</span></a></li>
                            <li><a class="menu-item" href="' . Url::to(['/accounting/accounting-list-symbols/index']) . '"><span class="menu-title">گروه ها</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item has-sub d-none">
                        <a class="menu-item"><span class="menu-title">امور فنی</span></a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="' . Url::to(['/accounting/accounting-list-symbols/index']) . '"><span class="menu-title">واژه نامه</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        '
    ],
];
