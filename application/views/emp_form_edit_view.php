<?php
isset($alert) ? extract($alert) : false;
?>
<h1>Изменение сотрудника</h1>

<?php
if (isset($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
<?php endif; ?>

<?php
if (isset($ok)): ?>
    <div class="alert alert-success" role="alert">
        <?= $ok ?>
    </div>
<?php endif; ?>

<form action="?id=<?= $data['id'] ?>" method="POST">

    <input type="hidden" class="form-control" name="id" value="<?= $data['id'] ?>">

    <div class="form-group">
        <label>Фамилия</label>
        <input type="text" class="form-control" name="surname" placeholder="укажите фамилию"
               value="<?= $data['surname'] ?>">

    </div>
    <div class="form-group">
        <label>Имя</label>
        <input type="text" class="form-control" name="name" placeholder="укажите имя" value="<?= $data['name'] ?>">
    </div>
    <div class="form-group">
        <label>Отчество</label>
        <input type="text" class="form-control" name="middle_name" placeholder="укажите отчество"
               value="<?= $data['middle_name'] ?>">

    </div>
    <div class="form-group">
        <label>Дата рождения</label>
        <input type="date" class="form-control" name="date" value="<?= $data['date'] ?>">
    </div>
    <?php
    $selectedWoman = false;
    $selectedMan = "selected=selected";
    ($data['gender'] != 1) ? $selectedWoman = "selected=selected" : $selectedMan = false;
    ?>
    <div class="form-group">
        <label>Пол</label>
        <select class="form-control" name="gender">
            <option <?= $selectedMan ?>>Мужчина</option>
            <option <?= $selectedWoman ?>>Женщина</option>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Применить</button>
    <button type="button" name="cancel" onclick="window.history.back()" class="btn btn-danger">Обратно</button>
</form>

