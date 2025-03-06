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
  'name' => 'Partisipasi Public',
  'bootstrap' => ['log'],
  'controllerNamespace' => 'frontend\controllers',
  'modules' => [
    'gridview' =>  [
      'class' => '\kartik\grid\Module',
    ],
  ],
  'components' => [
    'request' => [
      'csrfParam' => '_csrf-frontend',
    ],
    'user' => [
      'identityClass' => 'common\models\Member',
      'enableAutoLogin' => true,
      'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
    ],
    'session' => [
      // this is the name of the session cookie used for login on the frontend
      'name' => 'practical-a-frontend',
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
        // Aturan khusus untuk pagination
        'dokumen/<action:\w+>/page/<page:\d+>' => 'dokumen/<action>',
        'pengumuman/<action:\w+>/page/<page:\d+>' => 'pengumuman/<action>',

        // Aturan lainnya
        '<controller:informasi-hukum>/<action:index>/<id:\d+>' => '<controller>/<action>',
        '<controller:informasi-hukum>/<action:view>/<id:\d+>'  => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>/<id:\d+>'               => '<controller>/<action>',
      ],
    ],
  ],
  'params' => $params,
];
