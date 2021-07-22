<div class="card m-3">
    <div class="card-header">
        <?php foreach($object as $value): ?>
            <?php if($this->route['id'] == $value['id']): ?>
                <h3 class="float-left font-weight-normal mt-2" style="font-size: 18px">Объект: <?php echo $value['name'];?> <b>&#8658;</b> <?php echo $title; ?></h3>
            <?php endif;?>
        <?php endforeach;?>
        <?php foreach($count as $value): ?>
            <?php if($this->route['id'] == $value['objects_id']): ?>
                <h5 class="float-right font-weight-light mt-2" style="font-size: 18px">Показано записей <b><?php echo $value['count'];?>.</b></h5>
            <?php endif;?>
        <?php endforeach;?>
    </div>
    <div class="card-body py-2">
        <a href="add/<?php echo $this->route['id']; ?>" class="btn btn-primary float-right">Добавить материал</a>
    </div>

    <table class="table table-bordered table-hover table-sm text-center">
        <thead>
        <tr class="table-secondary">
            <th class="align-middle" style="width: 200px">Действия</th>
            <th class="align-middle" style="width: 75px">№ п/п</th>
            <th class="align-middle">Наименование материалов и конструкций</th>
            <th class="align-middle">Наименование документа о качестве</th>
            <th class="align-middle">Номер документа о качестве</th>
            <th class="align-middle" style="width: 170px">Дата выдачи документа</th>
        </tr>
        </thead>

        <tbody>
        <?php $i=1; foreach($list as $val): ?>
        <?php if($this->route['id'] == $val['objects_id']): ?>
        <tr>
            <td class="align-middle">
                <a href="edit/<?php echo $this->route['id']; ?>/<?php echo $val['tag'];?>" class="btn btn-light btn-sm edit" role="button">Редактировать</a>
                <a href="delete/<?php echo $this->route['id']; ?>/<?php echo $val['tag'];?>" class="btn btn-light btn-sm delete" role="button">Удалить</a>
            </td>
            <td class="align-middle"><?php echo $i++;?></td>
            <td class="align-middle"><?php echo $val['name_material'];?></td>
            <td class="align-middle"><?php echo $val['name_document'];?></td>
            <td class="align-middle"><?php echo $val['number'];?></td>
            <td class="align-middle"><?php echo $val['date'];?></td>
            <?php endif;?>
            <?php endforeach;?>
        </tr>
        </tbody>
    </table>
</div>