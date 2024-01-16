<?php

//Добавление нового продукта


/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

global $connect;
require_once '../config/connect.php';
/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$departure = $_POST['departure'];
$arrival = $_POST['arrival'];
$dated = $_POST['dated'];
$timed = $_POST['timed'];
$datea = $_POST['datea'];
$timea = $_POST['timea'];
$price = $_POST['price'];
$code = $_POST['code'];
$place = $_POST['place'];

/*
 * Делаем запрос на добавление новой строки в таблицу products
 */
if ($dated<=$datea) {

mysqli_query($connect,"INSERT INTO `railway`(`id`, `departure`, `arrival`, `dated`, `timed`, `datea`, `timea`, `price`, `code`, `place`) VALUES (NULL, '$departure', '$arrival', '$dated', '$timed', '$datea', '$timea', '$price', '$code', '$place')");
echo "<script>alert('Рейс успешно добавлен!');</script>";
header('Location: /scoreboard.php');}
else echo "<script>alert('Данные введены не верно!');</script>";