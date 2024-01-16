<?php
global $connect;
require_once '../config/connect.php';

/*
 * Получаем ID продукта из адресной строки
 */

$id = $_GET['id'];

/*
 * Делаем запрос на удаление строки из таблицы products
 */

mysqli_query($connect, "DELETE FROM `railway` WHERE `railway`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */

header('Location: /scoreboard.php');