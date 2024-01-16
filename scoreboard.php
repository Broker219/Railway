<?php
/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */
global $connect;
require_once 'config/connect.php';
require_once __DIR__ . '/log_in/src/helpers.php';
$user = currentUser();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Railway</title>
    <link rel="stylesheet" href="CSS/style_scoreboard.css">
</head>

<body>
<table class="table">
    <tr class="head_block">
        <th class="first">Код</th>
        <th>Отправление</th>
        <th>Прибытие</th>
        <th>Дата отправления</th>
        <th>Время отправления</th>
        <th>Дата прибытия</th>
        <th>Время прибытия</th>
        <th>Стоимость</th>
        <th class="end">Количество мест</th>
    </tr>

    <?php
    /*
            * Делаем выборку всех строк из таблицы "railway"
            */
    $railway = mysqli_query($connect, "SELECT * FROM `railway` order by `dated`");
    /*
             * Преобразовываем полученные данные в нормальный массив
             */
    $railway = mysqli_fetch_all($railway);
    /*
             * Перебираем массив и рендерим HTML с данными из массива
             * Ключ 0 - id
             * Ключ 1 - Departure
             * Ключ 2 - Arrival
             * Ключ 3 - Date_Departure
             * Ключ 4 - Time_Departure
             * Ключ 5 - Date_Arrival
             * Ключ 6 - Time_Arrival
             * Ключ 7 - Price
             * Ключ 8 - Code
             * Ключ 9 - Place
             */
    foreach ($railway as $railway)
    {
    ?>
    <tr class="block_settings">
        <td><?= $railway[8] ?></td>
        <td><?= $railway[1] ?></td>
        <td><?= $railway[2] ?></td>
        <td><?=date("d.m.Y",strtotime($railway[3]))?></td>
        <td><?= date("G.i",strtotime($railway[4]))?></td>
        <td><?= date("d.m.Y",strtotime($railway[5]))?> </td>
        <td><?=date("G.i",strtotime($railway[6])) ?></td>
        <td><?= $railway[7] ?> бел. руб.</td>
        <td><?= $railway[9] ?></td>
        <td><a href="railway.php?id=<?= $railway[0] ?>">Просмотреть</a></td>
        <?php
        if (isset($_SESSION['user']['id']) && $user['email']== "admin@gmail.com" ) {?>
        <td><a href="update.php?id=<?= $railway[0] ?>">Обновить</a></td>
        <td><a style="color: red;" href="vendor/delete.php?id=<?= $railway[0] ?>">Удалить</a></td>
 <?php }
 ?>
    </tr>
        <?php
    }
    ?>
</table>
<?php
if (isset($_SESSION['user']['id']) && $user['email']== "admin@gmail.com" ) {?>
    <br> <br>
    <button><a  href="vendor/addition.php" >Добавить рейс</a></button>
<?php }
 ?>
<br> <br>
<button><a href="index.php">Назад</a></button>
</body>
</html>