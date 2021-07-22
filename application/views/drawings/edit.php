<div class="container py-4">
    <div class="row">
        <div class="mx-auto col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Редактировать исполнительную схему</h4>
                </div>
                <div class="card-body">
                    <form class="form" role="form" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
                        <div class="form-group">
                            <label for="name_drawing" class="control-label">Наименование исполнительной схемы:</label>
                            <input id="name_drawing" name="name_drawing" type="text" class="form-control" value="<?php echo htmlspecialchars($data['name_drawing'], ENT_QUOTES); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="number_drawing" class="control-label">Номер схемы:</label>
                            <input id="number_drawing" name="number_drawing" type="text" class="form-control" value="<?php echo htmlspecialchars($data['number_drawing'], ENT_QUOTES); ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="date" class="control-label">Дата утверждения:</label>
                            <input id="date" name="date" type="date" class="form-control" value="<?php echo htmlspecialchars($data['date'], ENT_QUOTES); ?>"/>
                        </div>
                        <button class="btn btn-success float-right">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>