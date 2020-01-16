<?php
namespace app\assets;
use yii\web\AssetBundle;
class AdminAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl  = '@web';
    public $css      = [
        'themes/admin/vendors/teamyar/teamyarfont.css',
        'themes/admin/fonts/feather/style.min.css',
        'themes/admin/fonts/simple-line-icons/style.css',
        'themes/admin/fonts/font-awesome/css/font-awesome.min.css',
        'themes/admin/vendors/css/perfect-scrollbar.min.css',
        'themes/admin/vendors/css/prism.min.css',
        'themes/admin/vendors/css/chartist.min.css',
        'themes/admin/css/app.css',
        'themes/custom/libs/PersianDateTimePicker/dist/jquery.md.bootstrap.datetimepicker.style.css',
        //'themes/custom/libs/summernote/summernote-bs4.css',
        'themes/custom/css/admin.css?v=1'
    ];
    public $js       = [
//        '<!-- BEGIN VENDOR JS-->',
        'themes/custom/js/functions.js',
        'themes/admin/js/persian-datepicker.min.js',
        'themes/admin/vendors/js/core/popper.min.js',
        'themes/admin/vendors/js/perfect-scrollbar.jquery.min.js',
        'themes/admin/vendors/js/prism.min.js',
        'themes/admin/vendors/js/jquery.matchHeight-min.js',
        'themes/admin/vendors/js/screenfull.min.js',
        'themes/admin/vendors/js/pace/pace.min.js',
//        <!-- BEGIN VENDOR JS-->
//        <!-- BEGIN PAGE VENDOR JS-->
        'themes/admin/vendors/js/chartist.min.js',
//        <!-- END PAGE VENDOR JS-->
//        <!-- BEGIN CONVEX JS-->
        'themes/admin/js/app-sidebar.js?ver=4',
        'themes/admin/js/notification-sidebar.js',
//        'themes/admin/js/customizer.js',
//        <!-- END CONVEX JS-->
//        <!-- BEGIN PAGE LEVEL JS-->
//        'themes/admin/js/dashboard-ecommerce.js',
//        <!-- END PAGE LEVEL JS-->
        'themes/custom/libs/PersianDateTimePicker/src/jquery.md.bootstrap.datetimepicker.js',
    ];
    public $depends  = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}