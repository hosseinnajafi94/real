<?php
$modules_names = array_diff(scandir(dirname(__DIR__) . '/modules/'), ['..', '.']);
$modules       = [];
$translations  = [
    'app' => [
        'class'    => 'yii\i18n\PhpMessageSource',
        'fileMap'  => 'app.php',
        'basePath' => '@app/config/translations'
    ],
];
foreach ($modules_names as $module_name) {
    $modules[$module_name]      = ['class' => 'app\modules\\' . $module_name . '\Module'];
    $translations[$module_name] = [
        'class'    => 'yii\i18n\PhpMessageSource',
        'fileMap'  => $module_name . '.php',
        'basePath' => '@app/modules/' . $module_name . '/translations'
    ];
}

$params      = require __DIR__ . '/params.php';
$db          = require __DIR__ . '/db.php';
$config      = [
    'id'              => 'basic',
    'language'        => 'fa-IR',
    'timeZone'        => 'Asia/Tehran',
    'on beforeAction' => function () {
        // Yii::$app->language = 'en-US';
        // $settings = common\models\Settings::findOne(1);
        // Yii::$app->view->theme = new yii\base\Theme([
        //     'pathMap' => ['@frontend/views' => '@frontend/views/' . $settings->site_theme],
        //     'baseUrl' => '@web',
        // ]);
    },
    'components' => [
        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
                //''                                    => 'users/auth/login',
                //''                                    => 'site/default/index',
                ''                                    => 'dashboard/default/index',
                'login'                              => 'users/auth/login',
                'logout'                              => 'users/auth/logout',
                '<module>/<controller>/<action>/<id>' => '<module>/<controller>/<action>',
            ],
        ],
        'authManager'  => [
            'class' => 'yii\rbac\DbManager'
        ],
        'request'      => [
            'cookieValidationKey' => 'basic',
            'csrfParam'           => '_basic_csrf',
            'csrfCookie'          => [
                'httpOnly' => true,
            //'secure'   => true,
            //'path'     => '/;sameSite=Strict',
            ],
        ],
        'user'         => [
            //'identityClass'   => 'app\models\User',
            'identityClass' => 'app\modules\users\models\DAL\User',
            'loginUrl'        => ['/users/auth/login'],
            'enableAutoLogin' => true,
            'identityCookie'  => [
                'name'     => '_gharardad_identity',
                'httpOnly' => true,
            //'secure' => true,
            //'path'     => '/;sameSite=Strict',
            ],
        ],
        'session'      => [
            'name'         => '_basic_phpsessid',
            'cookieParams' => [
                'httpOnly' => true,
            //'secure'   => true,
            //'path'     => '/;sameSite=Strict',
            ],
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/default/error',
        ],
        'db'           => $db,
        'i18n'         => [
            'translations' => $translations
        ],
        'mailer'       => [
            'class'            => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                    [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'layout'     => 'admin',
    'layoutPath' => '@app/layouts',
    'params'     => $params,
    'modules'    => $modules,
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'aliases'    => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    //$config['bootstrap'][] = 'debug';
    //$config['modules']['debug'] = [
    //    'class' => 'yii\debug\Module',
    //    // uncomment the following to add your IP if you are not connecting from localhost.
    //    //'allowedIPs' => ['127.0.0.1', '::1'],
    //];
    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
