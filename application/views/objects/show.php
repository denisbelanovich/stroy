<div class="card m-3">
    <div class="card-header">
        <h3 class="float-left font-weight-normal mt-2" style="font-size: 18px">Список объектов строительства</h3>
        <h5 class="float-right font-weight-light mt-2" style="font-size: 18px">Показано объектов <b><?php echo $count['0']['count'];?>.</b></h5>
    </div>
    <div class="card-body py-2">
        <a href="objects/add" class="btn btn-primary float-right">Добавить объект</a>
    </div>
    <table class="table table-bordered table-hover table-sm text-center">
        <thead>
            <tr class="table-secondary">
                <th class="align-middle" style="width: 200px">Действия</th>
                <th class="align-middle" style="width: 75px">№ п/п</th>
                <th class="align-middle">Наименование объекта строительства</th>
                <th class="align-middle" style="width: 110px">Статус</th>
            </tr>
        </thead>

        <tbody>
            <?php $i=0;  foreach($list as $val): $i++?>
                <tr>
                    <td class="align-middle">
                        <a href="objects/edit/<?= $val['id'];?>" class="btn btn-light btn-sm edit" role="button">Редактировать</a>
                        <a href="objects/delete/<?= $val['id'];?>" class="btn btn-light btn-sm delete" role="button">Удалить</a>
                    </td>
                    <td class="align-middle"><?php echo $i; $count=$i;?></td>
                    <td class="align-middle"><a href="projects/<?= $val['id'];?>"><?php echo htmlspecialchars($val['name'], ENT_QUOTES);?></a></td>
                    <td class="align-middle"><?php echo $val['status'];?></td>
            <?php endforeach;?>
                </tr>
        </tbody>
    </table>
</div>
