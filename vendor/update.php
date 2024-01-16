<?php

//Обновление информации о продукте

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

global $connect;
require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */
$id = $_POST['id'];
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
 * Делаем запрос на изменение строки в таблице products
 */
if ($dated>$datea)
    echo "Дата отправления не может быть больше даты прибытия";
    else {
mysqli_query($connect, "UPDATE `railway` SET `departure` = '$departure', `arrival` = '$arrival', `dated` = '$dated', `timed` = '$timed', `datea` = '$datea', `timea` = '$timea', `price` = '$price', `code` = '$code', `place` = '$place' WHERE `railway`.`id` = '$id'");


/*
 * Переадресация на главную страницу
 */

header('Location: /scoreboard.php');}
