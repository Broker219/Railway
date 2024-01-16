<?php
/*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */
global $connect;
require_once 'config/connect.php';
require_once __DIR__ . '/log_in/src/helpers.php';
$user = currentUser();
/*
 * Получаем ID продукта из адресной строки - /railway.php?id=1
 */


$railway_id = $_GET['id'];

/*
 * Делаем выборку строки с полученным ID выше
 */

$railway = mysqli_query($connect, "SELECT * FROM `railway` WHERE `id` = '$railway_id'");
/*
 * Преобразовывем полученные данные в нормальный массив
 * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
 */

$railway = mysqli_fetch_assoc($railway);

/*
 * Делаем выборку всех строк комментариев с полученным ID продукта выше
 */

$comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `railway_id` = '$railway_id'");

/*
 * Преобразовывем полученные данные в нормальный массив
 */

$comments = mysqli_fetch_all($comments);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Railway</title>
    <link rel="stylesheet" href="CSS/style_scoreboard.css">
</head>
<body>
<h3>Станция отправления: <?= $railway['departure'] ?></h3>
<h3>Станция назначения: <?= $railway['arrival'] ?></h3>
<h3>Дата отправления: <?= date("d.m.Y",strtotime($railway['dated']))?></h3>
<h3>Время отправления: <?= date("G.i",strtotime($railway['timed']))?></h3>
<h3>Дата прибытия: <?= date("d.m.Y",strtotime($railway['datea']))?></h3>
<h3>Время прибытия: <?= date("G.i",strtotime($railway['timea'])) ?></h3>
<h3>Стоимость билета: <?= $railway['price'] ?> бел. руб.</h3>
<h3>Номер поезда: <?= $railway['code'] ?></h3>
<h3>Количество свободных мест: <?= $railway['place'] ?></h3>


<hr>
<?php
        if (isset($_SESSION['user']['id']) && $user['email']== "admin@gmail.com" ) {?>
<h3>Добавить комментарий к рейсу: </h3>
<form action="vendor/create_comment.php" method="post">
    <input type="hidden" name="id" value="<?= $railway['id'] ?>">
    <textarea name="body"></textarea> <br><br>
    <button type="submit">Добавить</button>
</form>
            <?php } ?>
<hr>

<h3>Comments</h3>
<ul>
    <?php

    /*
            * Перебираем массив с комментариями и выводим
            */


    foreach ($comments as $comment) {
        ?>
        <li><?= $comment[2] ?></li>
        <?php
    }
    ?>
</ul>
<br><br>
<button onclick="window.history.back()">Назад</button>
</form>
</body>
</html>
