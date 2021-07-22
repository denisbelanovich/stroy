<div class="container py-4">
    <div class="row">
        <div class="mx-auto col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Добавить материал</h4>
                </div>
                <div class="card-body">
                    <form class="form" role="form" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
                        <input name='objects_id' type='hidden' value="<?=$this->route['id'];?>"/>
                        <div class="form-group">
                            <label for="name_material" class="control-label">Наименование материалов и конструкций:</label>
                            <input id="name_material" name="name_material" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="name_document" class="control-label">Наименование документа о качестве:</label>
                            <input id="name_document" name="name_document" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="number" class="control-label">Номер документа о качестве:</label>
                            <input id="number" name="number" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="date" class="control-label">Дата выдачи документа:</label>
                            <input id="date" name="date" type="date" class="form-control" />
                        </div>
                        <button class="btn btn-success float-right">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>