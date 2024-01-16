<?php
global $connect, $order;
require_once '../config/connect.php';
$id = $_POST['id'];
$idr = $_POST['id_railway'];
$places = $_POST['place'];
mysqli_query($connect, "UPDATE `railway` SET `place` = `place` + '$places' WHERE `railway`.`id`='$idr'");
mysqli_query($connect, "DELETE FROM `orders` WHERE `orders`.`id` = '$id'");
header('Location: /log_in/home.php');