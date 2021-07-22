<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (empty($list)): ?>
                            <p>Список пользователей пуст</p>
                        <?php else: ?>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Логин</th>
                                    <th>E-mail</th>
                                    <th>Фамилия и имя</th>
                                    <th>Статус</th>
                                    <th>Удалить</th>
                                </tr>
                                <?php foreach ($list as $val): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($val['login'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['email'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['lastname'], ENT_QUOTES).' '.htmlspecialchars($val['firstname'], ENT_QUOTES); ?></td>
                                        <?php if (htmlspecialchars($val['status'], ENT_QUOTES) == 1):?>
                                        <td>Активирован</td>
                                        <?php else:?>
                                        <td>Не активирован</td>
                                        <?php endif;?>
                                        <td><a href="/admin/delete/<?= $val['id'];?>" class="btn btn-danger delete" role="button">Удалить</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php echo $pagination; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>