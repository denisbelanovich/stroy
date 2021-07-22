<div class="container py-4">
    <div class="row">
        <div class="mx-auto col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 text-center">Регистрация в системе</h3>
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
                        <div class="form-group">
                            <label for="password_confirm" class="control-label">Повторите Password</label>
                            <input id="password_confirm" name="password_confirm" type="password" class="form-control" placeholder="Введите пароль"/>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">E-mail</label>
                            <input id="email" name="email" type="text" class="form-control" placeholder="Введите E-mail"/>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="control-label">Фамилия</label>
                            <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Введите фамилию"/>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="control-label">Имя</label>
                            <input id="firstname" name="firstname" type="text" class="form-control" placeholder="Введите имя"/>
                        </div>
                        <button class="btn btn-primary float-right">Зарегистрироваться</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
