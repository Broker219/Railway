<?php

//Добавление комментария

/*
* Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
*/

global $connect;
require_once '../config/connect.php';
/*
* Создаем переменные со значениями, которые были получены с $_POST
*/

$id = $_POST['id'];
$body = $_POST['body'];

/*
* Делаем запрос на добавление новой строки в таблицу comments
*/

mysqli_query($connect, "INSERT INTO `comments` (`id`, `railway_id`, `body`) VALUES (NULL, '$id', '$body')");

/*
* Переадресация на страницу /product.php?id=
*/

header('Location: /railway.php?id=' . $id);