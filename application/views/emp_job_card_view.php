<?php
isset($alert) ? extract($alert) : false;
?>

<h1>Добавление места работы для сотрудника <?=$data['0']['surname'] .''. $data['0']['name']?> </h1>

<?php
if (isset($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
<?php endif; ?>

<form action="" method="POST">

    <div class="form-group">

        <input type="hidden" class="form-control" name="id" value="<?=$data[0][0]?>">

        <label>Место работы</label>
        <input type="text" class="form-control" name="place" placeholder="укажите место работы"
               value="<?= $_POST['place'] ?>">

        <label>Дата начала</label>
        <input type="date" class="form-control" name="date_start" placeholder="укажите дату начала"
               value="<?= $_POST['date_start'] ?>">

        <label>Дата окончания</label>
        <input type="date" class="form-control" name="date_end" placeholder="укажите дату окончания"
               value="<?= $_POST['date_end'] ?>">

    </div>
    <button type="submit" name="submit" class="btn btn-primary">Создать</button>
    <button type="button" name="cancel" onclick="window.history.back()" class="btn btn-danger">Обратно</button>
</form>

