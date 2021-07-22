<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="/public/img/icon.png" type="image/png" sizes="48x48">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/public/css/admin.css">
        <link rel="stylesheet" type="text/css" href="/public/css/sweetalert2.min.css">
        <script type="text/javascript" src="/public/js/jquery.js"></script>
        <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/public/js/form.js"></script>
        <script type="text/javascript" src="/public/js/delete.js"></script>
        <script type="text/javascript" src="/public/js/sweetalert2.min.js"></script>
    </head>
    <body class="fixed-nav sticky-footer bg-dark">
        <?php if ($this->route['action'] != 'login'): ?>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
                <a class="navbar-brand" href="/admin/users">Панель Администратора</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/logout">
                            <i class="fa fa-fw fa-sign-out"></i>
                            <span class="nav-link-text">Выход</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php endif; ?>
        <?php echo $content; ?>
        <?php if ($this->route['action'] != 'login'): ?>
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <p>&copy; StroyDoc, Made by DB, 2020 &ndash; <?=strftime('%Y');?></p>
                    </div>
                </div>
            </footer>
        <?php endif; ?>
    </body>
</html>