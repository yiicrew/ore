<?php

return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        'news/<slug>' => 'article/default/view',
        'property/<id>/<slug>' => 'listing/view',
    ]
];
