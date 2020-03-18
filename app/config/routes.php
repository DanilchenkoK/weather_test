<?php
return [
    //HomeController
    '' => [
        'controller' => 'home',
        'action' => 'index'
    ],
    'index' => [
        'controller' => 'home',
        'action' => 'index'
    ],
    'contact' => [
        'controller' => 'home',
        'action' => 'contact'
    ],
    'weather' => [
        'controller' => 'home',
        'action' => 'weather'
    ],
    'login/{url:\w+}' => [
        'controller' => 'home',
        'action' => 'login'
    ],
    'logout/{url:\w+}' => [
        'controller' => 'home',
        'action' => 'logout'
    ],
    'register' => [
        'controller' => 'home',
        'action' => 'register'
    ]
];
