<?php
use yii\helpers\Url;
use yii\bootstrap4\Nav;
use yii\bootstrap4\Html;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AdminAsset;
use app\config\widgets\Alert;
use app\modules\notifications\models\SRL\NotificationsSRL;
use app\modules\organizations\models\SRL\OrganizationsSRL;
use app\modules\organizations\models\DAL\OrganizationsListYears;
use app\modules\accounting\models\DAL\AccountingSettings;

$organizations = OrganizationsSRL::getItems();

$session = Yii::$app->session;
$organization_id = $session->get('default_organization_id');
if ($organization_id === null) {
    $settings = AccountingSettings::findOne(1);
    if ($settings->id_p06) {
        $organization_id = $settings->id_p06;
        $year_id = $settings->id_p07;
        $session->set('default_organization_id', $organization_id);
        $session->set('default_year_id', $year_id);
    }
}
if ($organization_id === null && count($organizations) > 0) {
    $keys = array_keys($organizations);
    $organization_id = $keys[0];
    $session->set('default_organization_id', $organization_id);
    $year = OrganizationsListYears::find()->where(['organization_id' => $$organization_id])->orderBy(['id' => SORT_DESC])->limit(1)->one();
    if ($year) {
        $session->set('default_year_id', $year->id);
    }
}

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <link rel="icon" type="image/png" href="<?= Yii::getAlias('@web/uploads/settings/favicon/') ?>"/>
        <link rel="shortcut icon" type="image/ico" href="<?= Yii::getAlias('@web/uploads/settings/favicon/') ?>"/>
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= $this->title ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <div class="app-sidebar hidden-print hide-sidebar" data-active-color="white" data-background-color="black" data-image="<?= Yii::getAlias('@web/uploads/img/sidebar-bg/08.jpg') ?>">
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
                            <li class="nav-item noclose">
                                <a style="padding: 0;">
                                    <?= Html::dropDownList('organization_id', $organization_id, $organizations, ['class' => 'form-control form-control-sm']) ?>
                                </a>
                            </li>
                            <li class="nav-item has-sub">
                                <a><i class="fa fa-bars"></i> <span class="menu-title"><?= isset(Yii::$app->controller->module->params['title']) ? Yii::$app->controller->module->params['title'] : '???' ?></span></a>
                                <ul class="menu-content">
                                    <li><a class="menu-item" href="<?= Url::to(['/dashboard/default/index']) ?>"><i class="fa fa-tachometer"></i> <span class="menu-title">داشبورد</span></a></li>
                                    <li><a class="menu-item" href="<?= Url::to(['/ticketing/tickets/index']) ?>"><i class="fa fa-ticket"></i> <span class="menu-title">پشتیبانی</span></a></li>
                                    <li><a class="menu-item" href="<?= Url::to(['/administration/default/index']) ?>"><i class="tyf tyf-module3"></i> <span class="menu-title"><?= Yii::t('administration', 'Administration') ?></span></a></li>
                                    <li><a class="menu-item" href="<?= Url::to(['/organizations/organizations/index']) ?>"><i class="fa fa-sitemap"></i> <span class="menu-title">شعبه</span></a></li>
                                    <li><a class="menu-item" href="<?= Url::to(['/users/default/index']) ?>"><i class="fa fa-user" style="position: relative;"><i class="fa fa-search" style="position: absolute;bottom: -5px;right: -5px;font-size: 11px;color: white;text-shadow: 0 0 2px #000;"></i></i> <span class="menu-title">پرسنلی</span></a></li>
                                    <li><a class="menu-item" href="<?= Url::to(['/correspondence/default/index']) ?>"><i class="fa fa-file"></i> <span class="menu-title">مکاتبات</span></a></li>
                                    <li><a class="menu-item" href="<?= Url::to(['/calendars/calendars/index']) ?>"><i class="fa fa-calendar"></i> <span class="menu-title">تقویم</span></a></li>
                                    <li><a class="menu-item" href="<?= Url::to(['/accounting/default/index']) ?>"><i class="fa fa-calculator"></i> <span class="menu-title">حسابداری</span></a></li>
                                    <!--<li><a class="menu-item" href="<?= Url::to(['/accounting/default/index']) ?>"><i class="fa fa-shopping-cart"></i> <span class="menu-title">خرید</span></a></li>-->
                                    <!--<li><a class="menu-item" href="<?= Url::to(['/accounting/default/index']) ?>"><i class="fa fa-bar-chart"></i> <span class="menu-title">فروش</span></a></li>-->
                                    <!--<li><a class="menu-item" href="<?= Url::to(['/accounting/default/index']) ?>"><i class="fa fa-building"></i> <span class="menu-title">انبار</span></a></li>-->
                                    <!--<li><a class="menu-item" href="<?= Url::to(['/accounting/default/index']) ?>"><i class="tyf tyf-module24"></i> <span class="menu-title">اموال</span></a></li>-->
                                </ul>
                            </li>
                            <?= isset(Yii::$app->controller->module->params['menu']) ? Yii::$app->controller->module->params['menu'] : '' ?>
                            <li class="nav-item has-sub d-none">
                                <a>
                                    <i class="fa fa-file"></i>
                                    <span class="menu-title">مکاتبات</span>
                                </a>
                                <ul class="menu-content">
                                    <li class="has-sub">
                                        <a class="menu-item">کارتابل پیش نویس ها</a>
                                        <ul class="menu-content">
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/create', 'type_id' => 1]) ?>">ایجاد پیش نویس</a></li>
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/ongoing', 'type_id' => 1]) ?>">در دست اقدام</a></li>
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/submissions', 'type_id' => 1]) ?>">ارسالی ها</a></li>
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/incomings', 'type_id' => 1]) ?>">دریافتی ها</a></li>
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/deleted', 'type_id' => 1]) ?>">حذف شده</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">کارتابل نامه ها</a>
                                        <ul class="menu-content">
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/index']) ?>">دریافتی ها</a></li>
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/index']) ?>">ارسالی</a></li>
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/index']) ?>">ارجاع شده</a></li>
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/index']) ?>">حذف شده</a></li>
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/index']) ?>">ایجاد نامه</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub d-none">
                                        <a class="menu-item">کارتابل پیام ها</a>
                                        <ul class="menu-content">
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/index']) ?>">دریافتی ها</a></li>
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/index']) ?>">ارسالی</a></li>
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/index']) ?>">حذف شده</a></li>
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/index']) ?>">ایجاد پیام</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub d-none">
                                        <a class="menu-item">اسناد</a>
                                        <ul class="menu-content">
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/mails/index']) ?>">دریافتی</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a class="menu-item">تنظیمات</a>
                                        <ul class="menu-content">
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/secretariats/index']) ?>"><?= Yii::t('correspondence', 'Secretariats') ?></a></li>
                                            <li><a class="menu-item" href="<?= Url::to(['/correspondence/patterns/index']) ?>"><?= Yii::t('correspondence', 'Patterns') ?></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sidebar-background"></div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-faded hidden-print">
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
                                    <?php
                                    $notes = NotificationsSRL::unreadNotes(Yii::$app->user->id);
                                    ?>
                                    <a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle">
                                        <i class="ft-bell blue-grey darken-4"></i>
                                        <?= count($notes) > 0 ? '<span class="notification badge badge-pill badge-danger">' . count($notes) . '</span>' : '' ?>
                                        <p class="d-none">اطلاعیه</p>
                                    </a>
                                    <div class="notification-dropdown dropdown-menu dropdown-menu-left">
                                        <div class="arrow_box_right">
                                            <div class="noti-list">
                                                <?php
                                                if ($notes) {
                                                    foreach ($notes as $note) {
                                                        ?>
                                                        <a class="dropdown-item noti-container py-2" href="<?= Url::to(['/notifications/notifications/view', 'id' => $note->id]) ?>">
                                                            <i class="fa fa-<?= $note->icon ?> info float-right d-block font-medium-4 mt-2 ml-2"></i>
                                                            <span class="noti-wrapper">
                                                                <span class="noti-title line-height-1 d-block text-bold-400 info"><?= $note->title ?></span>
                                                                <span class="noti-text"><?= mb_substr($note->description, 0, 40) . ' ...' ?></span>
                                                            </span>
                                                        </a>
                                                        <?php
                                                    }
                                                }
                                                else {
                                                    ?>
                                                    <a class="dropdown-item noti-container py-2" style="cursor: default;text-align: center;">
                                                        <span class="noti-wrapper">
                                                            <span class="noti-text">-- بدون اعلان --</span>
                                                        </span>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <a class="noti-footer primary text-center d-block border-top border-top-blue-grey border-top-lighten-4 text-bold-400 py-1" href="<?= Url::to(['/notifications/notifications/index']) ?>">خواندن همه اعلان ها</a>
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
                                            <?php
                                            $user = Yii::$app->user->identity;
                                            if ($user) {
                                                ?>
                                                <a class="dropdown-item py-1" style="cursor: default;text-align: center;">
                                                    <!--<i class="ft-edit ml-2"></i>-->
                                                    <span><?= $user->fname . ' ' . $user->lname;  ?></span>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                            <a href="" class="dropdown-item py-1 d-none">
                                                <i class="ft-edit ml-2"></i>
                                                <span>پروفایل من</span>
                                            </a>
                                            <a href="" class="dropdown-item py-1 d-none">
                                                <i class="ft-message-circle ml-2"></i>
                                                <span>چت من</span>
                                            </a>
                                            <a href="javascript:;" class="dropdown-item py-1 d-none">
                                                <i class="ft-settings ml-2"></i>
                                                <span>تنظیمات</span>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="<?= Url::to(['/users/auth/logout']) ?>" class="dropdown-item">
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
        <?php
        if (isset($this->params['modals']) && is_array($this->params['modals'])) {
            foreach ($this->params['modals'] as $modal) {
                echo $modal;
            }
        }
        ?>
        <?php $this->endBody() ?>
        <div id="loading"><span>لطفا صبر کنید...</span></div>
    </body>
</html>
<?php $this->endPage() ?>