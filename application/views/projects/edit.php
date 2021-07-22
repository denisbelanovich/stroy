<div class="container py-4">
    <div class="row">
        <div class="mx-auto col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Редактировать проектную документацию</h4>
                </div>
                <div class="card-body">
                <form class="form" role="form" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
                    <div class="form-group">
                        <label for="name_porg" class="control-label">Наименование проектной организации:</label>
                        <input id="name_porg" name="name_porg" type="text" class="form-control" value="<?php echo htmlspecialchars($data['name_porg'], ENT_QUOTES); ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="cypher" class="control-label">Шифр проекта:</label>
                        <input id="cypher" name="cypher" type="text" class="form-control" value="<?php echo htmlspecialchars($data['cypher'], ENT_QUOTES); ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="number_list" class="control-label">Номер листа и изменения (при необходимости):</label>
                        <input id="number_list" name="number_list" type="text" class="form-control" value="<?php echo htmlspecialchars($data['number_list'], ENT_QUOTES); ?>"/>
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