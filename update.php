<?php
/*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */
global $connect;
require_once 'config/connect.php';
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
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Railway</title>
    <link rel="stylesheet" href="CSS/style_scoreboard.css">
</head>
<body>
<h3>Update Railway</h3>
<form action="vendor/update.php" method="post">
    <input type="hidden" name="id" value="<?= $railway['id'] ?>">
    <p>Станция отправления</p>
    <input type="text" name="departure" value="<?= $railway['departure'] ?>">
    <p>Станция прибытия</p>
    <input type="text" name="arrival" value="<?= $railway['arrival'] ?>">
    <p>Дата отправления</p>
    <input type="date" name="dated" value="<?= $railway['dated'] ?>">
    <p>Время отправления</p>
    <input type="time" name="timed" value="<?= $railway['timed'] ?>">
    <p>Дата прибытия</p>
    <input type="date" name="datea" value="<?= $railway['datea'] ?>">
    <p>Время прибытия</p>
    <input type="time" name="timea" value="<?= $railway['timea'] ?>">
    <p>Стоимость билета</p>
    <input type="number" min="1" name="price"  value="<?= $railway['price'] ?>">
    <p>Номер поезда</p>
    <input type="number" min="1" name="code" value="<?= $railway['code'] ?>">
    <p>Количество мест</p>
    <input type="number" min="1" name="place" value="<?= $railway['place'] ?>"><br> <br>
    <button type="submit">Update</button>
</form>
<br> <br>
<button onclick="window.history.back()">Назад</button>
</body>
</html>
