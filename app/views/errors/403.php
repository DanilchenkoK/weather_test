<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/font-awesome/css/font-awesome.min.css">
    <script type='text/javascript' src='/public/scripts/jquery.min.js'></script>
    <script type='text/javascript' src="/public/scripts/bootstrap.js"></script>
    <script type='text/javascript' src="/public/scripts/popper.min.js"></script>
    <script type='text/javascript' src='/public/scripts/form.js'></script>
    <title><?= $title ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light pos-fixed" id='mainNav'>
        <a class="navbar-brand" href="http://localhost/">BWT Test</a>

        <button aria-controls="navbarResponsive" data-target="#navbarResponsive" data-toggle="collapse" class="navbar-toggler navbar-toggler-right">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id='navbarResponsive' class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item ml-1">
                    <a href="/weather" class="nav-link">
                        <i class='fa fa-fw fa-umbrella'></i>
                        <span class="nav-link-text">Погода в Запорожье</span>
                    </a>
                </li>
                <li class="nav-item ml-1">
                    <a href="/contact" class="nav-link">
                        <i class='fa fa-fw fa-comment'></i>
                        <span class="nav-link-text">Обратная связь</span>
                    </a>
                </li>
                <li class="nav-item ml-1">
                    <a href="/feedback" class="nav-link">
                        <i class='fa fa-fw fa-book'></i>
                        <span class="nav-link-text">Feedback</span>
                    </a>
                </li>

                <li class="penult nav-item ml-1">
                    <a href="/register" class=" nav-link">
                        <i class='fa fa-fw fa-user-plus'></i>
                        <span class="nav-link-text">Регистрация</span>
                    </a>
                </li>
                <li class="last nav-item ml-1">
                    <a href="/login<?= $_SERVER['REQUEST_URI'] ?>" class=" nav-link">
                        <i class='fa fa-fw fa-user'></i>
                        <span class="nav-link-text">Войти</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="text-center">
        <h1>Доступ Запрещен!</h1>
        <h4>Для продолжения <a href="/login<?= $_SERVER['REQUEST_URI'] ?>">войтите</a> в свой аккаунт </h4>
    </div>
</body>

</html>