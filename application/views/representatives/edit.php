<div class="container py-4">
    <div class="row">
        <div class="mx-auto col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Добавить представителя</h4>
                </div>
                <div class="card-body">
                    <form class="form" role="form" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
                        <div class="form-group">
                            <label for="position" class="control-label">Должность:</label>
                            <input id="position" name="position" type="text" class="form-control" value="<?php echo htmlspecialchars($data['position'], ENT_QUOTES); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="name_orgs" class="control-label">Наименования строительной организации:</label>
                            <input id="name_orgs" name="name_orgs" type="text" class="form-control" value="<?php echo htmlspecialchars($data['name_orgs'], ENT_QUOTES); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="fio" class="control-label">Фамилия И.О.:</label>
                            <input id="fio" name="fio" type="text" class="form-control" value="<?php echo htmlspecialchars($data['fio'], ENT_QUOTES); ?>"/>
                        </div>
                        <button class="btn btn-success float-right">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>