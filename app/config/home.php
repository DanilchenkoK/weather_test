<?php
return [
    'firstName' => [
        'error' => false,
        'pattern' => '/^[A-Za-zА-Яа-я]{3,32}$/',
        'message' => 'Разрешены символы русского и  латинского алфавита от 3 до 32 символов'
    ],
    'lastName' => [
        'error' => false,
        'pattern' => '/^[A-Za-zА-Яа-я]{3,50}$/',
        'message' => 'Разрешены символы русского и  латинского алфавита от 3 до 50 символов'
    ],
    'reCaptcha' => [
        'error' => false,
        'message' => 'Похоже вы забыли про капчу!'
    ],
    'email' => [
        'error' => false,
        'pattern' => '/^([A-Za-z0-9_-]+\.)*[A_Za-z0-9_-]+@[A_Za-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/',
        'message' => 'Ел.почта указана неверно (пример : example@email.com)'
    ],
    'text' => [
        'error' => false,
        'pattern' => '/^[a-zA-Zа-яА-Я0-9!@#$%^&*(),\s]{1,1000}$/',
        'message' => 'Сообщение указаны запрещенные символы (разрешены только латинские, русские буквы, знаки !@#$%^&*()  ,и цифры до 1000 символов)'
    ],
    'password' => [
        'error' => false,
        'pattern' => '/^[a-zA-Z0-9]{6,50}$/',
        'message' => 'Пароль указан неверно (разрешены только латинские буквы и цифры от 6 до 50 символов)'
    ],
    'account' => [
        'error' => false,
        'message' => 'Ел.почта или пароль указаны неверно',
        'message2' => 'Пользователь с такой почтой уже существует'
    ],
];
