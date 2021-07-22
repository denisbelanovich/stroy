<div class="container py-4">
    <div class="row">
        <div class="mx-auto col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 text-center">Изменить пароль</h3>
                </div>
                <div class="card-body">
                    <form class="form" role="form" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
                        <div class="form-group">
                            <label for="login" class="control-label">Логин</label>
                            <input id="login" name="login" type="text" class="form-control" value="<?=$_SESSION['account']['login']?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Текущий пароль</label>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Введите пароль"/>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="control-label">Новый пароль</label>
                            <input id="new_password" name="new_password" type="password" class="form-control" placeholder="Введите новый пароль"/>
                        </div>
                        <div class="form-group">
                            <label for="confirm_new_password" class="control-label">Введите новый пароль ещё раз</label>
                            <input id="confirm_new_password" name="confirm_new_password" type="password" class="form-control" placeholder="Повторите новый пароль"/>
                        </div>
                        <button class="btn btn-primary float-right">Изменить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>