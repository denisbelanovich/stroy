<div class="container py-4">
    <div class="row">
        <div class="mx-auto col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Редактировать работу</h4>
                </div>
                <div class="card-body">
                    <form class="form" role="form" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
                        <div class="form-group">
                            <label for="date_start" class="control-label">Дата начала работ:</label>
                            <input id="date_start" name="date_start" type="date" class="form-control" value="<?php echo htmlspecialchars($data['date_start'], ENT_QUOTES); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="date_end" class="control-label">Дата окончания работ:</label>
                            <input id="date_end" name="date_end" type="date" class="form-control" value="<?php echo htmlspecialchars($data['date_end'], ENT_QUOTES); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="name_work" class="control-label">Наименование выполненных работ:</label>
                            <input id="name_work" name="name_work" type="text" class="form-control" value="<?php echo htmlspecialchars($data['name_work'], ENT_QUOTES); ?>"/>
                        </div>
                        <button class="btn btn-success float-right">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>