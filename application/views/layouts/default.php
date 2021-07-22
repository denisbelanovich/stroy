<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="/public/img/icon.png" type="image/png" sizes="48x48">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/sweetalert2.min.css">
<!--        <link rel="stylesheet" type="text/css" href="/public/styles/bootstrap-grid.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="/public/styles/bootstrap-grid.min.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="/public/styles/bootstrap-reboot.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="/public/styles/bootstrap-reboot.min.css">-->
    <script type="text/javascript" src="/public/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
<!--    <script type="text/javascript" src="/public/js/bootstrap.bundle.min.js"></script>-->
    <script type="text/javascript" src="/public/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="/public/js/form.js"></script>
    <script type="text/javascript" src="/public/js/delete.js"></script>
    <script type="text/javascript" src="/public/js/sweetalert2.min.js"></script>
</head>
<body>

<div class="page">
    <?php switch ($this->route['controller'].'/'.$this->route['action']):
            case "objects/show":?>

    <nav class="navbar navbar-expand navbar-dark bg-dark sticky-top py-0">
        <div class="navbar-header">
            <a class="navbar-brand" href="/objects">StroyDoc</a>
        </div>
        <div class="navbar-collapse collapse justify-content-end">
            <ul class="navbar-nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/account/settings">Настройки аккаунта</a>
                </li>
                <li class="nav-item">
                    <a href="/account/logout" class="nav-link">Выйти (<?php echo $_SESSION['account']['login'];?>)</a>
                </li>
            </ul>
        </div>
    </nav>

<?php break; case "objects/add": case "objects/edit": ?>

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
                    <a href="/account/logout" class="nav-link">Выйти (<?php echo $_SESSION['account']['login'];?>)</a>
                </li>
            </ul>
        </div>
    </nav>

<?php break;default:?>

    <nav class="navbar navbar-expand navbar-dark bg-dark sticky-top py-0">
        <div class="navbar-header">
            <a class="navbar-brand" href="/objects">Объекты</a>
        </div>
        <div class="navbar-collapse collapse justify-content-end">
            <ul class="navbar-nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/projects/<?php echo $this->route['id']; ?>">Проекты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/representatives/<?php echo $this->route['id']; ?>">Представители организаций</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/works/<?php echo $this->route['id']; ?>">Работы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/materials/<?php echo $this->route['id']; ?>">Материалы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/drawings/<?php echo $this->route['id']; ?>">Исп. схемы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/protocols/<?php echo $this->route['id']; ?>">Протоколы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/documents/<?php echo $this->route['id']; ?>">Документы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/settings/<?php echo $this->route['id']; ?>">Настройки</a>
                </li>
                <li class="nav-item">
                    <a href="/account/logout" class="nav-link">Выйти (<?php echo $_SESSION['account']['login'];?>)</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php endswitch;?>

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