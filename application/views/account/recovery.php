<div class="container py-4">
    <div class="row">
        <div class="mx-auto col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 text-center">Восстановление пароля</h3>
                </div>
                <div class="card-body">
                    <form class="form" role="form" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
                        <div class="form-group">
                            <label for="email" class="control-label">E-mail</label>
                            <input id="email" name="email" type="text" class="form-control" placeholder="Введите E-mail"/>
                        </div>
                        <button class="btn btn-primary float-right">Восстановить пароль</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>