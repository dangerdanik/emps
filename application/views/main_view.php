<h1>Список сотрудников</h1>
<p>

    <?php
    if (isset($_COOKIE["alert"])): ?>
<div id="ok_task" class="alert alert-success" role="alert">
    <?php echo $_COOKIE["alert"] ?>
</div>
<?php endif; ?>

<a href="emp/create" type="button" class="btn btn-success">Создать сотрудника</a>

<table id="dtBasicExample" class="table table-striped table-bordered table-sm">
    <thead>
    <tr>
        <th>id</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Дата рождения</th>
        <th>Пол</th>
        <th></th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($data as $row) : ?>

        <tr>
            <td><?= $row['id'] ?></td>
            <td><a title="Карточка сотрудника" href="/emp_card/index/?id=<?= $row["id"] ?>"><?= $row['surname'] ?></a></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['middle_name'] ?></td>
            <td><?=  date("d.m.Y", strtotime($row['date']));?></td>
            <td><?= $row['gender'] = (1 == $row['gender']) ? 'Муж.' : 'Женс.'; ?></td>

            <td><a href="emp/update/?id=<?= $row["id"] ?>">
                    <button type="submit" style="font-weight:bold;" name="update" class="btn-sm btn-primary">
                        <span class="glyphicon glyphicon-edit"></span> Изменить
                    </button>
                </a>

                <a href="emp/delete/?id=<?= $row["id"] ?>">
                    <button type="submit" style="font-weight:bold;" name="delete"
                            onclick="return confirm('Уверены что хотите удалить сотрудника?')"
                            class="btn-sm btn-danger">
                        <span class="glyphicon glyphicon-remove-sign"></span> Удалить
                    </button>
                </a></td>
        </tr>

    <?php endforeach; ?>

    </tbody>
</table>

</p>