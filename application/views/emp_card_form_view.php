<h1>Карточка сотрудника: <?= $data[0]['surname'] . " " . $data[0]['name'] ?></h1>
<?php
if (isset($_COOKIE["alert"])): ?>
    <div id="ok_task" class="alert alert-success" role="alert">
        <?php echo $_COOKIE["alert"] ?>
    </div>
<?php endif; ?>
<br>
<p>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><a href="/emp/update/?id=<?= $data[0][0] ?>">Сотрудник</a></div>
            <div class="panel-body">
                Информация о сотруднике
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item">Фамилия: <?= $data[0]['surname'] ?></a>
                <a href="#" class="list-group-item">Имя: <?= $data[0]['name'] ?></a>
                <a href="#" class="list-group-item">Отчество: <?= $data[0]['middle_name'] ?></a>
                <a href="#" class="list-group-item">Дата
                    рождения: <?= date("d.m.Y", strtotime($data[0]['date'])); ?></a>
                <a href="#"
                   class="list-group-item">Пол: <?= $data[0]['gender'] = (1 == $data[0]['gender']) ? 'Муж.' : 'Женс.'; ?></a>
            </div>
        </div>

        <a href="/emp_card/create/?id=<?= $data[0][0] ?>" type="button" class="btn btn-success">Создать место работы</a>
        <button type="button" name="cancel" onclick="window.history.back()" class="btn btn-danger">Обратно</button>

    </div>

    <div class="col-md-8">
        <h3>Место работы</h3>

        <table id="dtBasicExample" class="table table-striped table-bordered table-sm">
            <thead>
            <tr>
                <th>Место работы</th>
                <th>Дата поступления</th>
                <th>Дата окончания</th>
                <th></th>

            </tr>
            </thead>
            <tbody>

            <?php foreach ($data as $row) : ?>
                <?php if (isset($row['place'])): ?>
                    <tr>
                        <td><a href="/emp_card/update_work/?id=<?= $row["id"] ?>"><?= $row['place'] ?></a></td>
                        <td><?= date("d.m.Y", strtotime($row['date_start'])); ?></td>
                        <td><?= date("d.m.Y", strtotime($row['date_end'])); ?></td>
                        <td>
                            <a href="/emp_card/delete_work/?id=<?= $row["id"] ?>&emp_id=<?= $row['emp_id'] ?>">
                                <button type="submit" style="font-weight:bold;" name="delete"
                                        onclick="return confirm('Уверены что хотите удалить место работы сотрудника?')"
                                        class="btn-sm btn-danger">
                                    <span class="glyphicon glyphicon-remove-sign"></span> Удалить
                                </button>
                            </a>
                        </td>

                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</p>