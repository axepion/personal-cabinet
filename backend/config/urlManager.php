<?php

use yii\web\UrlManager;

return [
    'class' => UrlManager::class,
    'hostInfo' => $params['backend'],
    'baseUrl' => $params['backend'],
    'scriptUrl' => $params['backend'],
    'enablePrettyUrl' => true,
    'enableStrictParsing' => false,
    'showScriptName' => false,
];