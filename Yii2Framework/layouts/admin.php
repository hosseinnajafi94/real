<?php
use yii\helpers\Url;
use app\config\widgets\Alert;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AdminAsset;
/* @var $this \yii\web\View */
/* @var $content string */
AdminAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" type="image/png" href="<?= Yii::getAlias('@web/uploads/settings/favicon/') ?>"/>
        <link rel="shortcut icon" type="image/ico" href="<?= Yii::getAlias('@web/uploads/settings/favicon/') ?>"/>
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= $this->title ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <div class="app-sidebar" data-active-color="white" data-background-color="black" data-image="<?= Yii::getAlias('@web/uploads/img/sidebar-bg/08.jpg') ?>">
                <div class="sidebar-header">
                    <div class="logo clearfix">
                        <a href="#" class="logo-text float-right">
                            <span class="text align-middle">مدیریت منابع سازمان</span>
                        </a>
                        <a style="top: 10px;" id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block">
                            <i data-toggle="expanded" class="ft-disc toggle-icon"></i>
                        </a>
                    </div>
                </div>
                <div class="sidebar-content">
                    <div class="nav-container">
                        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                            <li class="nav-item active">
                                <a href="<?= yii\helpers\Url::to(['/dashboard/default/index']) ?>">
                                    <i class="icon-home"></i>
                                    <span class="menu-title">خانه</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= yii\helpers\Url::to(['/ticketing/tickets/index']) ?>">
                                    <i class="fa fa-ticket"></i>
                                    <span class="menu-title">پشتیبانی</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="menu-item" href="<?= Url::to(['/organizations/organizations/index']) ?>">
                                    <i class="fa fa-sitemap"></i>
                                    <span class="menu-title">شعبه</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="menu-item" href="<?= Url::to(['/users/users/index']) ?>">
                                    <i class="fa fa-user" style="position: relative;">
                                        <i class="fa fa-search" style="position: absolute;bottom: -5px;right: -5px;font-size: 11px;color: white;text-shadow: 0 0 2px #000;"></i>
                                    </i>
                                    <span class="menu-title">پرسنلی</span>
                                </a>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-tasks"></i>
                                    <span class="menu-title">مدیر سیستم</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">مرور کلی</a></li>
                                    <li><a href="" class="menu-item">به روز رسانی</a></li>
                                    <li><a href="" class="menu-item">تنظیمات</a></li>
                                    <li><a href="" class="menu-item">پشتیبان</a></li>
                                    <li><a href="" class="menu-item">گروه ها</a></li>
                                    <li><a href="" class="menu-item">کاربر ها</a></li>
                                    <li><a href="" class="menu-item">ماژول ها</a></li>
                                    <li><a href="" class="menu-item">صدا ها</a></li>
                                    <li><a href="" class="menu-item">رویداد ها</a></li>
                                    <li><a href="" class="menu-item">روزنامه</a></li>
                                    <li><a href="" class="menu-item">آمار</a></li>
                                    <li><a href="" class="menu-item">نشست ها</a></li>
                                    <li><a href="" class="menu-item">دسترسی آی پی</a></li>
                                    <li><a href="" class="menu-item">امنیت</a></li>
                                    <li><a href="" class="menu-item">سیستم تلفنی</a></li>
                                    <li><a href="" class="menu-item">دسترسی ها</a></li>
                                    <li><a href="" class="menu-item">فعالیت ها</a></li>
                                    <li><a href="" class="menu-item">موقعیت مکانی</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">اسناد</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">همه</a></li>
                                    <li><a href="" class="menu-item">کارتابل من</a></li>
                                    <li><a href="" class="menu-item">جهت امضاء</a></li>
                                    <li><a href="" class="menu-item">مطلع شده</a></li>
                                    <li><a href="" class="menu-item">جهت تایید</a></li>
                                    <li><a href="" class="menu-item">متا دیتا</a></li>
                                    <li><a href="" class="menu-item">ابزارک ها</a></li>
                                    <li><a href="" class="menu-item">فیلتر</a></li>
                                    <li><a href="" class="menu-item">تنظیمات</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">مشتری</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">همه</a></li>
                                    <li><a href="" class="menu-item">گزارش گیری</a></li>
                                    <li><a href="" class="menu-item">حذف شده ها</a></li>
                                    <li><a href="" class="menu-item">فیلتر جدید</a></li>
                                    <li><a href="" class="menu-item">تنظیمات</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">پورتال</span>
                                </a>
                                <ul class="menu-content">
                                    <li class="has-sub">
                                        <a class="menu-item">پورتال</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                            <li><a href="" class="menu-item">نشست ها</a></li>
                                            <li><a href="" class="menu-item">آمار</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">hr</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                            <li><a href="" class="menu-item">نشست ها</a></li>
                                            <li><a href="" class="menu-item">آمار</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">crm</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                            <li><a href="" class="menu-item">نشست ها</a></li>
                                            <li><a href="" class="menu-item">آمار</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="" class="menu-item">اضافه کردن ماژول</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">گفتگو</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">همه</a></li>
                                    <li><a href="" class="menu-item">مدیریت</a></li>
                                    <li><a href="" class="menu-item">فروش خودرو</a></li>
                                    <li><a href="" class="menu-item">خدمات پس از فروش</a></li>
                                    <li><a href="" class="menu-item">فروشگاه قطعات یدکی</a></li>
                                    <li><a href="" class="menu-item">آپشن</a></li>
                                    <li><a href="" class="menu-item">صدور کارت طلایی</a></li>
                                    <li><a href="" class="menu-item">مشترکین</a></li>
                                    <li><a href="" class="menu-item">گروه جدید</a></li>
                                    <li><a href="" class="menu-item">تنظیمات</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">کیفیت</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">همه</a></li>
                                    <li><a href="" class="menu-item">فروش خودرو</a></li>
                                    <li><a href="" class="menu-item">خدمات پس از فروش</a></li>
                                    <li><a href="" class="menu-item">آپشن</a></li>
                                    <li><a href="" class="menu-item">صدور کارت طلایی</a></li>
                                    <li><a href="" class="menu-item">فروشگاه قطعات یدکی</a></li>
                                    <li><a href="" class="menu-item">مشترکین</a></li>
                                    <li><a href="" class="menu-item">افزودن رده</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">پست الکترونیکی</span>
                                </a>
                                <ul class="menu-content">
                                    <li class="has-sub">
                                        <a class="menu-item">معین شده ها</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">ورودی</a></li>
                                            <li><a href="" class="menu-item">فرستاده شده</a></li>
                                            <li><a href="" class="menu-item">خروجی ها</a></li>
                                            <li><a href="" class="menu-item">بسته ها</a></li>
                                            <li><a href="" class="menu-item">چرک نویس ها</a></li>
                                            <li><a href="" class="menu-item">هرزنامه</a></li>
                                            <li><a href="" class="menu-item">حذف</a></li>
                                            <li><a href="" class="menu-item">برگزیده ها</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">احمد خسافی</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">ورودی</a></li>
                                            <li><a href="" class="menu-item">فرستاده شده</a></li>
                                            <li><a href="" class="menu-item">خروجی ها</a></li>
                                            <li><a href="" class="menu-item">بسته ها</a></li>
                                            <li><a href="" class="menu-item">چرک نویس ها</a></li>
                                            <li><a href="" class="menu-item">هرزنامه</a></li>
                                            <li><a href="" class="menu-item">حذف</a></li>
                                            <li><a href="" class="menu-item">برگزیده ها</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="" class="menu-item">صندوق پستی جدید</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">پروفایل</span>
                                </a>
                                <ul class="menu-content">
                                    <li class="has-sub">
                                        <a class="menu-item">پورتال</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">مدیر سیستم</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">پروفایل</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">پرسنلی</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">مشتری</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">اقدام</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">همه اقدامات</a></li>
                                    <li class="has-sub">
                                        <a class="menu-item">مدیریت</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">نائب رئیس</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="" class="menu-item">فروش خودرو</a></li>
                                    <li><a href="" class="menu-item">خدمات پس از فروش</a></li>
                                    <li><a href="" class="menu-item">فروشگاه قطعات یدکی</a></li>
                                    <li><a href="" class="menu-item">آپشن</a></li>
                                    <li><a href="" class="menu-item">صدور کارت طلایی</a></li>
                                    <li><a href="" class="menu-item">مشترکین</a></li>
                                    <li><a href="" class="menu-item">بخش جدید</a></li>
                                    <li><a href="" class="menu-item">ابزار فرم ساز</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">پیامک</span>
                                </a>
                                <ul class="menu-content">
                                    <li class="has-sub">
                                        <a class="menu-item">ایران خودرو زیبایی</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">ورودی ها</a></li>
                                            <li><a href="" class="menu-item">فرستاده شده</a></li>
                                            <li><a href="" class="menu-item">خروجی ها</a></li>
                                            <li><a href="" class="menu-item">بسته شده</a></li>
                                            <li><a href="" class="menu-item">چرک نویس</a></li>
                                            <li><a href="" class="menu-item">حذف شده ها</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">اختصاص داده شده</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">ورودی ها</a></li>
                                            <li><a href="" class="menu-item">فرستاده شده</a></li>
                                            <li><a href="" class="menu-item">خروجی ها</a></li>
                                            <li><a href="" class="menu-item">بسته شده</a></li>
                                            <li><a href="" class="menu-item">چرک نویس</a></li>
                                            <li><a href="" class="menu-item">حذف شده ها</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="" class="menu-item">صندوق پیامک جدید</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">انبار</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">فضل یدک زیبایی</a></li>
                                    <li class="has-sub">
                                        <a class="menu-item">اطلاعات پایه</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">انبار</a></li>
                                            <li><a href="" class="menu-item">کالا / خدمت</a></li>
                                            <li><a href="" class="menu-item">PDA</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">عملیات</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">شروع دوره</a></li>
                                            <li><a href="" class="menu-item">بستن انبار</a></li>
                                            <li><a href="" class="menu-item">درخواست کالا</a></li>
                                            <li><a href="" class="menu-item">رسید</a></li>
                                            <li><a href="" class="menu-item">کنترل کیفیت</a></li>
                                            <li><a href="" class="menu-item">انتقال انبار به انبار</a></li>
                                            <li><a href="" class="menu-item">حواله</a></li>
                                            <li><a href="" class="menu-item">مجوز خروج کالا</a></li>
                                            <li><a href="" class="menu-item">انبار گردانی</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">گزارش</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">کاردکس</a></li>
                                            <li><a href="" class="menu-item">وضعیت موجودی</a></li>
                                            <li><a href="" class="menu-item">نقطه سفارش</a></li>
                                            <li><a href="" class="menu-item">گردش کالا در انبار</a></li>
                                            <li><a href="" class="menu-item">کالاهای کم گردش</a></li>
                                            <li><a href="" class="menu-item">رسید موقت</a></li>
                                            <li><a href="" class="menu-item">مشتری</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">تولید</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">BOM / BOR</a></li>
                                            <li><a href="" class="menu-item">سفارش تولید</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">دسترسی ها</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">اخبار</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">همه</a></li>
                                    <li><a href="" class="menu-item">ایران خودرو زیبایی</a></li>
                                    <li><a href="" class="menu-item">خبرخوان</a></li>
                                    <li><a href="" class="menu-item">رده جدید</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">تقویم</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">تقویم جدید</a></li>
                                    <li><a href="" class="menu-item">تنظیمات</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">پروژه</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">همه</a></li>
                                    <li><a href="" class="menu-item">مدیریت</a></li>
                                    <li><a href="" class="menu-item">فروش خودرو</a></li>
                                    <li><a href="" class="menu-item">خدمات پس از فروش</a></li>
                                    <li><a href="" class="menu-item">فروشگاه قطعات یدکی</a></li>
                                    <li><a href="" class="menu-item">آپشن</a></li>
                                    <li><a href="" class="menu-item">صدور کارت طلایی</a></li>
                                    <li><a href="" class="menu-item">مشترکین</a></li>
                                    <li><a href="" class="menu-item">آرشیو</a></li>
                                    <li><a href="" class="menu-item">رده جدید</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">ویکی</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">دستور عمل</a></li>
                                    <li><a href="" class="menu-item">بخش جدید</a></li>
                                    <li><a href="" class="menu-item">تنظیمات پورتال</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">فروش</span>
                                </a>
                                <ul class="menu-content">
                                    <li class="has-sub">
                                        <a class="menu-item">فضل یدک زیبایی</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">سال مالی 1398</a></li>
                                            <li class="has-sub">
                                                <a class="menu-item">عملیات</a>
                                                <ul class="menu-content">
                                                    <li><a href="" class="menu-item">سفارش فروش</a></li>
                                                    <li><a href="" class="menu-item">پیش فاکتور</a></li>
                                                    <li><a href="" class="menu-item">مجوز فروش</a></li>
                                                    <li><a href="" class="menu-item">قرارداد</a></li>
                                                    <li><a href="" class="menu-item">فاکتور فروش</a></li>
                                                    <li><a href="" class="menu-item">برگشت از فروش</a></li>
                                                </ul>
                                            </li>
                                            <li class="has-sub">
                                                <a class="menu-item">گزارشات</a>
                                                <ul class="menu-content">
                                                    <li><a href="" class="menu-item">خلاصه فاکتور</a></li>
                                                    <li><a href="" class="menu-item">تجمیع فاکتور مشتری</a></li>
                                                    <li><a href="" class="menu-item">گزارش جدید</a></li>
                                                </ul>
                                            </li>
                                            <li class="has-sub">
                                                <a class="menu-item">تنظیمات</a>
                                                <ul class="menu-content">
                                                    <li class="has-sub">
                                                        <a class="menu-item">دسترسی ها</a>
                                                        <ul class="menu-content">
                                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">اموال</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">فضل یدک زیبایی</a></li>
                                    <li class="has-sub">
                                        <a class="menu-item">اطلاعات پایه</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">محل استقرار</a></li>
                                            <li><a href="" class="menu-item">دارایی</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">عملیات</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">استهلاک</a></li>
                                            <li><a href="" class="menu-item">خرید</a></li>
                                            <li><a href="" class="menu-item">ورود از انبار</a></li>
                                            <li><a href="" class="menu-item">فروش</a></li>
                                            <li><a href="" class="menu-item">اسقاط / خروج</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">گزارشات</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">اشخاص</a></li>
                                            <li><a href="" class="menu-item">ایجاد گزارش</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">دسترسی ها</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">خرید</span>
                                </a>
                                <ul class="menu-content">
                                    <li class="has-sub">
                                        <a class="menu-item">فضل یدک زیبایی</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">سال مالی 1398</a></li>
                                            <li class="has-sub">
                                                <a class="menu-item">عملیات</a>
                                                <ul class="menu-content">
                                                    <li><a href="" class="menu-item">درخواست خرید</a></li>
                                                    <li><a href="" class="menu-item">سفارش خرید</a></li>
                                                    <li><a href="" class="menu-item">فاکتور خرید</a></li>
                                                    <li><a href="" class="menu-item">برگشت از خرید</a></li>
                                                </ul>
                                            </li>
                                            <li class="has-sub">
                                                <a class="menu-item">گزارشات</a>
                                                <ul class="menu-content">
                                                    <li><a href="" class="menu-item">گزارش جدید</a></li>
                                                </ul>
                                            </li>
                                            <li class="has-sub">
                                                <a class="menu-item">تنظیمات</a>
                                                <ul class="menu-content">
                                                    <li class="has-sub">
                                                        <a class="menu-item">دسترسی ها</a>
                                                        <ul class="menu-content">
                                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">تلگرام</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">همه</a></li>
                                    <li><a href="" class="menu-item">تنظیمات</a></li>
                                    <li><a href="" class="menu-item">گروه جدید</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">حسابداری</span>
                                </a>
                                <ul class="menu-content">
                                    <li class="has-sub">
                                        <a class="menu-item">فضل یدک زیبایی</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">سال مالی 1398</a></li>
                                            <li class="has-sub">
                                                <a class="menu-item">عملیات</a>
                                                <ul class="menu-content">
                                                    <li><a href="" class="menu-item">حساب ها</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="" class="menu-item">گزارشات</a></li>
                                            <li class="has-sub">
                                                <a class="menu-item">تنظیمات</a>
                                                <ul class="menu-content">
                                                    <li class="has-sub">
                                                        <a class="menu-item">اطلاعات پایه</a>
                                                        <ul class="menu-content">
                                                            <li><a href="" class="menu-item">شعبه</a></li>
                                                            <li><a href="" class="menu-item">تنظیمات سیستم</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="has-sub">
                                                        <a class="menu-item">امکانات</a>
                                                        <ul class="menu-content">
                                                            <li><a href="" class="menu-item">ابزار ها</a></li>
                                                            <li><a href="" class="menu-item">بررسی ایرادات حسابداری</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="has-sub">
                                                        <a class="menu-item">دسترسی ها</a>
                                                        <ul class="menu-content">
                                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">بودجه</span>
                                </a>
                                <ul class="menu-content">
                                    <li class="has-sub">
                                        <a class="menu-item">فضل یدک زیبایی</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">سال مالی 1398</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">دسترسی ها</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">گزارش</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">آپشن</a></li>
                                    <li><a href="" class="menu-item">خدمات پس از فروش</a></li>
                                    <li><a href="" class="menu-item">صدور کارت طلایی</a></li>
                                    <li><a href="" class="menu-item">فروش خودرو</a></li>
                                    <li><a href="" class="menu-item">فروش قطعات یدکی</a></li>
                                    <li><a href="" class="menu-item">مدیریت</a></li>
                                    <li><a href="" class="menu-item">مشترکین</a></li>
                                    <li><a href="" class="menu-item">اضافه کردن رده</a></li>
                                    <li><a href="" class="menu-item">پیشرفته</a></li>
                                    <li class="has-sub">
                                        <a class="menu-item">دسترسی ها</a>
                                        <ul>
                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="" class="menu-item">جایگزینی</a></li>
                                </ul>
                            </li>
                            <li class="has-sub nav-item">
                                <a>
                                    <i class="fa fa-"></i>
                                    <span class="menu-title">خدمات</span>
                                </a>
                                <ul class="menu-content">
                                    <li><a href="" class="menu-item">فضل یدک زیبایی</a></li>
                                    <li class="has-sub">
                                        <a class="menu-item">اطلاعات پایه</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">خدمات</a></li>
                                            <li><a href="" class="menu-item">دستگاه ها</a></li>
                                            <li><a href="" class="menu-item">گارانتی ها</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">خدمات پس از فروش</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">درخواست</a></li>
                                            <li><a href="" class="menu-item">دستور</a></li>
                                            <li><a href="" class="menu-item">ثبت عملکرد</a></li>
                                            <li><a href="" class="menu-item">لیست سوابق</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="" class="menu-item">گزارشات</a></li>
                                    <li class="has-sub">
                                        <a class="menu-item">دسترسی ها</a>
                                        <ul class="menu-content">
                                            <li><a href="" class="menu-item">کاربر ها</a></li>
                                            <li><a href="" class="menu-item">گروه ها</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sidebar-background"></div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-faded">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-right">
                            <span class="sr-only">تغییر ناوبری </span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <span class="d-lg-none navbar-right navbar-collapse-toggle">
                            <a class="open-navbar-container"><i class="ft-more-vertical"></i></a>
                        </span>
                        <a id="navbar-fullscreen" href="javascript:;" class="ml-2 display-inline-block apptogglefullscreen">
                            <i class="ft-maximize blue-grey darken-4 toggleClass"></i>
                            <p class="d-none">تمام صفحه</p>
                        </a>
                        <div class="dropdown mr-2 display-inline-block">
                            <a id="apps" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle">
                                <i class="ft-edit blue-grey darken-4"></i>
                                <span class="mx-1 blue-grey darken-4 text-bold-400">برنامه ها</span>
                            </a>
                            <div class="apps dropdown-menu">
                                <div class="arrow_box">
                                    <a href="" class="dropdown-item py-1"><span>چت</span></a>
                                    <a href="" class="dropdown-item py-1"><span>وظیفه</span></a>
                                    <a href="" class="dropdown-item py-1"><span>تقویم</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-container">
                        <div id="navbarSupportedContent" class="collapse navbar-collapse">
                            <ul class="navbar-nav">
                                <li class="dropdown nav-item mt-1">
                                    <a id="dropdownBasic" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle">
                                        <i class="ft-flag blue-grey darken-4"></i>
                                        <span class="selected-language d-none"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left">
                                        <div class="arrow_box_right">
                                            <a href="javascript:;" class="dropdown-item py-1">
                                                <img src="<?= Yii::getAlias('@web/uploads/img/flags/us.png') ?>" alt="English Flag" class="langimg"/><span> انگلیس</span>
                                            </a>
                                            <a href="javascript:;" class="dropdown-item py-1">
                                                <img src="<?= Yii::getAlias('@web/uploads/img/flags/es.png') ?>" alt="Spanish Flag" class="langimg"/><span> اسپانیا</span>
                                            </a>
                                            <a href="javascript:;" class="dropdown-item py-1">
                                                <img src="<?= Yii::getAlias('@web/uploads/img/flags/br.png') ?>" alt="Portuguese Flag" class="langimg"/><span> پرتغال</span>
                                            </a>
                                            <a href="javascript:;" class="dropdown-item">
                                                <img src="<?= Yii::getAlias('@web/uploads/img/flags/de.png') ?>" alt="French Flag" class="langimg"/><span> فرانسه</span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown nav-item mt-1">
                                    <a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle">
                                        <i class="ft-bell blue-grey darken-4"></i>
                                        <span class="notification badge badge-pill badge-danger">4</span>
                                        <p class="d-none">اطلاعیه</p>
                                    </a>
                                    <div class="notification-dropdown dropdown-menu dropdown-menu-left">
                                        <div class="arrow_box_right">
                                            <div class="noti-list">
                                                <a class="dropdown-item noti-container py-2">
                                                    <i class="ft-share info float-right d-block font-medium-4 mt-2 ml-2"></i>
                                                    <span class="noti-wrapper">
                                                        <span class="noti-title line-height-1 d-block text-bold-400 info">سفارش جدید دریافت شده</span>
                                                        <span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                                    </span>
                                                </a>
                                                <a class="dropdown-item noti-container py-2">
                                                    <i class="ft-save warning float-right d-block font-medium-4 mt-2 ml-2"></i>
                                                    <span class="noti-wrapper">
                                                        <span class="noti-title line-height-1 d-block text-bold-400 warning">کاربر جدید ثبت شده است</span>
                                                        <span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                                    </span>
                                                </a>
                                                <a class="dropdown-item noti-container py-2">
                                                    <i class="ft-repeat danger float-right d-block font-medium-4 mt-2 ml-2"></i>
                                                    <span class="noti-wrapper">
                                                        <span class="noti-title line-height-1 d-block text-bold-400 danger">سفارش جدید دریافت شده</span>
                                                        <span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                                    </span>
                                                </a>
                                                <a class="dropdown-item noti-container py-2">
                                                    <i class="ft-shopping-cart success float-right d-block font-medium-4 mt-2 ml-2"></i>
                                                    <span class="noti-wrapper">
                                                        <span class="noti-title line-height-1 d-block text-bold-400 success">مورد جدید در سبد خرید شما</span>
                                                        <span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                                    </span>
                                                </a>
                                                <a class="dropdown-item noti-container py-2">
                                                    <i class="ft-heart info float-right d-block font-medium-4 mt-2 ml-2"></i>
                                                    <span class="noti-wrapper">
                                                        <span class="noti-title line-height-1 d-block text-bold-400 info">فروش جدید</span>
                                                        <span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                                    </span>
                                                </a>
                                                <a class="dropdown-item noti-container py-2">
                                                    <i class="ft-box warning float-right d-block font-medium-4 mt-2 ml-2"></i>
                                                    <span class="noti-wrapper">
                                                        <span class="noti-title line-height-1 d-block text-bold-400 warning">سفارش تحویل داده شده</span>
                                                        <span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                                    </span>
                                                </a>
                                            </div>
                                            <a class="noti-footer primary text-center d-block border-top border-top-blue-grey border-top-lighten-4 text-bold-400 py-1">خواندن همه اعلان ها</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown nav-item mt-1">
                                    <a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle">
                                        <i class="ft-user blue-grey darken-4"></i>
                                        <p class="d-none">تنظیمات کاربر</p>
                                    </a>
                                    <div aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-left">
                                        <div class="arrow_box_right">
                                            <a href="" class="dropdown-item py-1">
                                                <i class="ft-edit ml-2"></i>
                                                <span>پروفایل من</span>
                                            </a>
                                            <a href="" class="dropdown-item py-1">
                                                <i class="ft-message-circle ml-2"></i>
                                                <span>چت من</span>
                                            </a>
                                            <a href="javascript:;" class="dropdown-item py-1">
                                                <i class="ft-settings ml-2"></i>
                                                <span>تنظیمات</span>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:;" class="dropdown-item">
                                                <i class="ft-power ml-2"></i>
                                                <span>خروج</span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="main-panel">
                <div class="main-content">
                    <div class="content-wrapper">
                        <div class="container-fluid">
                            <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
                            <?= Alert::widget() ?>
                            <?= $content ?>
                        </div>
                    </div>
                </div>
                <footer class="footer footer-static footer-light d-none">
                    <p class="clearfix text-muted text-center px-2"><span>&copy; 2019 کپی رایت  <a href="https://hosseinnajafi.ir" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2"> حسین نجفی </a> , همه حقوق محفوظ است </span></p>
                </footer>
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>