<?php
/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */
require_once '../config/connect.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добавление рейса</title>
    <link rel="stylesheet" href="/CSS/style_scoreboard.css">
</head>
<body>
<h3>Введите данные рейса:</h3>
<form action="create.php" method="post">
    <p>Станция отправления:</p>
    <select name="departure" id="change">
        <option value="" disabled selected></option>
        <option value="Минск">Минск</option>
        <option value="Витебск">Витебск</option>
        <option value="Брест">Брест</option>
        <option value="Гродно">Гродно</option>
        <option value="Могилёв">Могилёв</option>
        <option value="Гомель">Гомель</option>
    </select>
    <p>Станция назначения:</p>
    <select name="arrival" id="change">
        <option value="" disabled selected></option>
        <option value="Брест">Брест</option>
        <option value="Гродно">Гродно</option>
        <option value="Могилёв">Могилёв</option>
        <option value="Гомель">Гомель</option>
        <option value="Минск">Минск</option>
        <option value="Витебск">Витебск</option>
    </select>
    <p>Дата отправления:</p>
    <input type="date" name="dated">
    <p>Время отправления:</p>
    <input type="time" name="timed">
    <p>Дата прибытия:</p>
    <input type="date" name="datea">
    <p>Время прибытия:</p>
    <input type="time" name="timea">
    <p>Стоимость билета:</p>
    <input type="number" min="1" name="price">
    <p>Номер поезда:</p>
    <input type="number" min="1" name="code">
    <p>Количество свободных мест:</p>
    <input type="number" min="1" name="place"><br> <br>
    <input type="submit" onclick="alert('Форма отправлена');return true;" value="Добавить рейс">
</form>
<br> <br>
<button onclick="window.history.back()">Назад</button>
</body>
</html>