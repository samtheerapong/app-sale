<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'NFC',
    'name' => 'Application',
    'language' => 'th',
    'timezone' => 'Asia/Bangkok',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        [
            'class' => 'app\components\LanguageSelector',
            'supportedLanguages' => ['en-US', 'th-TH'], //กำหนดรายการภาษาที่ support หรือใช้ได้
        ]
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'dos' => [
            'class' => 'app\modules\dos\Module',
        ],
        'it' => [
            'class' => 'app\modules\it\Module',
        ],
        'manage' => [
            'class' => 'app\modules\manage\Module',
        ],
        'general' => [
            'class' => 'app\modules\general\Module',
        ],
        'engineer' => [
            'class' => 'app\modules\engineer\Module',
        ],
        'sauce' => [
            'class' => 'app\modules\sauce\Module',
        ],
        'shop' => [
            'class' => 'app\modules\shop\Module',
        ],
        'salers' => [
            'class' => 'app\modules\salers\module',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            // 'i18n' => []
        ],
        'gallery' => 'dosamigos\gallery\Module',
    ],
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@app/themes/adminlte/'
                ],
            ],
        ],
        'image' => [
            'class' => 'yii\image\ImageDriver',
            'driver' => 'GD',  //GD or Imagick
        ],
        'cart' => [
            'class' => 'yz\shoppingcart\ShoppingCart',
            // You can configure additional options for the cart component here.
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'GbdSobHCCVl8HGf0tYx4KYX7Fq0f6IkA',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity',
                'httpOnly' => true,
            ],
            'loginUrl' => ['site/login'], // Set the login page route
        ],
        'session' => [
            'class' => 'yii\web\Session',
            // You can configure other session options here, such as timeout and cookie parameters.
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    // 'sourceLanguage' => 'en-US',
                ],
            ],
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],

        // 'mailer' => [
        //     'class' => 'yii\swiftmailer\Mailer',
        //     'viewPath' => '@app/mail',
        //     'useFileTransport' => false,
        //     'transport' => [
        //         'class' => 'Swift_SmtpTransport',
        //         'host' => 'smtp-mail.outlook.com',
        //         'username' => 'northernfood.it@hotmail.com',
        //         'password' => '******',
        //         'port' => '587',
        //         'encryption' => 'tls',
        //     ],
        // ],

        'db' => $db,
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                ['class' => 'yii\rest\UrlRule', 'controller' => 'location', 'except' => ['delete', 'GET', 'HEAD', 'POST', 'OPTIONS'], 'pluralize' => false],
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
