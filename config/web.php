<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language' => 'ru_RU',
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'components' => [
        'authManager' => [                                 // RBAC – контроль доступа на основе ролей
            'class' => 'yii\rbac\DbManager',
        ],

        'activity'=>[
            'class'=>\app\components\ActivityComponent::class,
            'class_activity_form' => '\app\models\ActivityForm'
        ],

        'event'=>[
            'class'=>\app\components\ActivityComponent::class,
            'class_activity_form' => '\app\models\EventForm'
        ],

        'dao'=>[
            'class'=>\app\components\DAOComponent::class,
            'db_component_name' => 'db'
        ],
        'dao_event'=>[
            'class'=>\app\components\EventsCalendarComponent::class,
            'db_component_name' => 'db'
        ],
        'user_comp'=>[
            'class'=>\app\components\UsersComponent::class,
            'class_user_sign_in' => '\app\models\UsersSignIn',
            'class_user_sign_up' => '\app\models\UsersSignUp'
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dEfH1BVuV86QKbryH1dUr-bKlAFgSRHZ',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //например  'ab' -> 'site/about'
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
        'allowedIPs' => ['*','127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*','127.0.0.1', '::1'],
    ];
}

return $config;
