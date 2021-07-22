<div class="container py-4">
    <div class="row">
        <div class="mx-auto col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Добавить работу</h4>
                </div>
                <div class="card-body">
                    <form class="form" role="form" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
                        <input name='objects_id' type='hidden' value="<?=$this->route['id'];?>"/>
                        <div class="form-group">
                            <label for="date_start" class="control-label">Дата начала работ:</label>
                            <input id="date_start" name="date_start" type="date" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="date_end" class="control-label">Дата окончания работ:</label>
                            <input id="date_end" name="date_end" type="date" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="name_work" class="control-label">Наименование выполненных работ:</label>
                            <input id="name_work" name="name_work" type="text" class="form-control" />
                        </div>
                        <button class="btn btn-success float-right">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>