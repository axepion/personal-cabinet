<?php
use \yii\web\urlManager;

return [
    'class' => UrlManager::class,
    'hostInfo' => $params['frontend'],
    'baseUrl' => $params['frontend'],
    'scriptUrl' => $params['frontend'],
    'enablePrettyUrl' => true,
    'enableStrictParsing' => false,
    'showScriptName' => false,
    'rules' => [
        '' => 'site/index',
        '/admin' => 'site/admin',
    ]
];
