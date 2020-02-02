<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'private-api' => [
            'class' => 'backend\modules\api',
        ],
    ],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json'  => 'yii\web\JsonParser',
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'dashboard' => 'site/index',
                'user-order-hestories/index' => 'user-order-hestory/index',
                'user-order-hestories/view' => 'user-order-hestory/view',

                'sub-categories'=>'sub-category/index',

                'base-categories'=>'category/index',
                'base-category/create'=>'category/create',
                'base-category/update'=>'category/update',
                'base-category/view'=>'category/view',

                'profile'=>'user/view',
                'login'=>'site/login',
                '<controller:[\w-]+>s' => '<controller>',
                '<controller:[\w-]+>/<id:\d+>' => '<controller>/view',
                '<controller:[\w-]+>/<id:\d+>' => '<controller>/delete',
                '<controller:[\w-]+>/<id:\d+>' => '<controller>/update',

                '<private-api><controller:[\w-]+>s' => '<private-api><controller>/index',
            ],
        ],
    ],
    'params' => $params,
];
