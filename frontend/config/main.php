<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]

        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            //'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                            'api/v1/user' => '/apiv1/user',
                    ],
                    'extraPatterns' => [
                        'GET status' => 'status',
                        'DELETE delete/{id}'=>'delete',
                        'GET /{id}' =>'view',
                        'PUT {id}/changestatus'=>'changestatus',
                        'PATCH {id}/changerole'=>'changerole',
                    ]

                ],
                '/' => 'site/index',
                'about' => 'site/about',
                'login' => 'site/login',
                'logout' => 'site/logout',
                'signup' => 'site/signup',
                'post/<id:\d+>' => 'post/index',
                //'rest'=>'rest/index',
                //'rest/user'=>'rest/user/index',
                'request-password-reset' => 'site/request-password-reset',
            ],
        ],

    ],
    'modules' => [
        'admin' => [
            'class' => 'frontend\modules\admin\AdminModule',
            'as access' => [
                'class' => \yii\filters\AccessControl::className(),
                'ruleConfig' => [
                    'class' => \common\components\AccessRule::className(),
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [
                            \common\models\User::ROLE_ADMIN,
                        ],
                    ]
                ]
            ],
        ],
        'apiv1' => [
            'class' => 'frontend\modules\apiv1\Module'
        ],
    ],
    'params' => $params,
];
