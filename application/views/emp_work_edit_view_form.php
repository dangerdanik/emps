<?php
isset($alert) ? extract($alert) : false;
?>

<h1>Изменение места работы сотрудника</h1>

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
        <label>Место работы</label>
        <input type="text" class="form-control" name="place" placeholder="укажите место работы"
               value="<?= $data['place'] ?>">
    </div>

    <div class="form-group">
        <label>Дата поступления</label>
        <input type="date" class="form-control" name="date_start" value="<?= $data['date_start'] ?>">
    </div>

    <div class="form-group">
        <label>Дата окнчания</label>
        <input type="date" class="form-control" name="date_end" value="<?= $data['date_end'] ?>">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Применить</button>
    <button type="button" name="cancel" onclick="window.history.back()" class="btn btn-danger">Обратно</button>

</form>


