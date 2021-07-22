<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="/public/img/icon.png" type="image/png" sizes="48x48">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.css">-->
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <!--    <link rel="stylesheet" type="text/css" href="/public/styles/bootstrap-grid.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="/public/styles/bootstrap-grid.min.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="/public/styles/bootstrap-reboot.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="/public/styles/bootstrap-reboot.min.css">-->
    <link rel="stylesheet" type="text/css" href="/public/css/sweetalert2.min.css">
    <script type="text/javascript" src="/public/js/jquery.js"></script>
    <!--    <script type="text/javascript" src="/public/js/bootstrap.js"></script>-->
    <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/public/js/form.js"></script>
    <script type="text/javascript" src="/public/js/sweetalert2.min.js"></script>
</head>
<body>

<div class="page">
    <?php if($this->route['action'] != 'settings'): ?>
    <nav class="navbar navbar-expand navbar-dark bg-dark sticky-top py-0">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">StroyDoc</a>
        </div>
        <div class="navbar-collapse collapse justify-content-end">
            <ul class="navbar-nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/account/login">Вход для пользователей</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/account/register">Регистрация</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php else: ?>
    <nav class="navbar navbar-expand navbar-dark bg-dark sticky-top py-0">
        <div class="navbar-header">
            <a class="navbar-brand" href="/objects">Объекты</a>
        </div>
        <div class="navbar-collapse collapse justify-content-end">
            <ul class="navbar-nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/account/settings">Настройки аккаунта</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/account/logout">Выйти (<?php echo $_SESSION['account']['login'];?>)</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php endif; ?>

    <main class="main">
        <?php echo $content; ?>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="d-flex justify-content-center">
                <p><span>&copy; StroyDoc 2020 &ndash; <?=strftime('%Y');?></span></p>
            </div>
            <div class="d-flex justify-content-center">
                <p><span class="text-small">Made by DB</span></p>
            </div>
        </div>
    </footer>
</div>
</body>
</html>