<?php
isset($alert) ? extract($alert) : false;
?>

<h1>Добавление сотрудника</h1>

<?php
if (isset($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
<?php endif; ?>

<form action="create" method="POST">

    <div class="form-group">
        <label>Фамилия</label>
        <input type="text" class="form-control" name="surname" placeholder="укажите фамилию"
               value="<?= $_POST['surname'] ?>">

    </div>
    <div class="form-group">
        <label>Имя</label>
        <input type="text" class="form-control" name="name" placeholder="укажите имя" value="<?= $_POST['name'] ?>">
    </div>
    <div class="form-group">
        <label>Отчество</label>
        <input type="text" class="form-control" name="middle_name" placeholder="укажите отчество"
               value="<?= $_POST['middle_name'] ?>">

    </div>
    <div class="form-group">
        <label>Дата рождения</label>
        <input type="date" class="form-control" name="date" value="<?= $_POST['date'] ?>">
    </div>
    <div class="form-group">
        <label>Пол</label>
        <select class="form-control" name="gender">
            <option>Мужчина</option>
            <option>Женщина</option>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Применить</button>
    <button type="button" name="cancel" onclick="window.history.back()" class="btn btn-danger">Обратно</button>

</form>

