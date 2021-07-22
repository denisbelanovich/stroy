<div class="container py-4">
    <div class="row">
        <div class="mx-auto col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Создать объект строительства</h4>
                </div>
                <div class="card-body">
                <form class="form" role="form"  method="post" action="<?=$_SERVER['REQUEST_URI']?>">
                    <input name='accounts_id' type='hidden' value="<?=$_SESSION['account']['id']?>"/>
                    <div class="form-group">
                        <label for="name" class="control-label">Наименование объекта строительства:</label>
                        <textarea id="name" name="name" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"></div>
                        <label class="control-label col-md-2">Статус:</label>
                            <select class="form-control form-select-sm col-md-5" name="status">
                                <option selected></option>
                                <option value="Активный">Активный</option>
                                <option value="Неактивный">Неактивный</option>
                            </select>
                        <div class="col-md-1"></div>
                    </div>
                    <button class="btn btn-success float-right">Сохранить</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>