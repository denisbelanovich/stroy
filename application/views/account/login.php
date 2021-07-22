<div class="container py-4">
    <div class="row">
        <div class="mx-auto col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 text-center">Вход в систему</h3>
                </div>
                <div class="card-body">
                    <form class="form" role="form" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
                        <div class="form-group">
                            <label for="login" class="control-label">Login</label>
                            <input id="login" name="login" type="text" class="form-control" placeholder="Введите логин"/>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Введите пароль"/>
                        </div>
                        <button class="btn btn-primary float-right">Войти</button>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="text-center p-t-45 p-b-4">
                <span class="txt1">
                    Забыли пароль?
                </span>
                        <a href="/account/recovery" class="txt2 hov1">
                            Восстановить
                        </a>
                    </div>

                    <div class="text-center">
                <span class="txt1">
                    Создать учётную запись?
                </span>
                        <a href="/account/register" class="txt2 hov1">
                            Регистрация
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
