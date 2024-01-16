<?php
global $connect;
require_once '../config/connect.php';
require_once '../log_in/src/helpers.php';
$user = currentUser();
$idr = $_POST['idr'];
$ids =$_SESSION['user']['id'];
$places = $_POST['places'];
$fio = $_POST['name'];
$pas = $_POST['series_passport'];
mysqli_query($connect, "UPDATE `railway` SET `place` = `place` - '$places' WHERE `railway`.`id` = '$idr'");
mysqli_query($connect, "INSERT INTO `orders` (`id`, `id_railway`, `id_user`, `places`, `fio`,`pass`) VALUES (NULL, '$idr', '$ids','$places','$fio','$pas');");
header('Location: /index.php');