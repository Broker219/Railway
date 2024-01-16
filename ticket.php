<?php
/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */
global $connect;
require_once 'config/connect.php';
require_once __DIR__ . '/log_in/src/helpers.php';
$railway_id = $_GET['id'];
$user = currentUser();

$railway = mysqli_query($connect, "SELECT * FROM `railway` WHERE `id` = '$railway_id'");
$railway = mysqli_fetch_assoc($railway);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Railway</title>

</head>
<body>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Font #1 -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

<!--  Font #2 -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<header class="header">
    <link rel="stylesheet" href="CSS/Style.css">
    <div class="container">
        <div>
            <div class="logo">
                <div class="logo_img">
                    <a href="index.php"><img src="CSS/Images/logo_image.png" alt="logo" width="130px"></a>
                </div>
                <div class="logo_name">
                    <h1>
                        <a href="index.php" class="name__inner">Белорусская Железная Дорога</a>
                    </h1>
                </div>

                <nav class="nav">
                    <div class="link">
                        <a href="scoreboard.php" class="tablo">Табло</a>
                    </div>
                    <div class="link">
                        <div class="hover_time">
                            <a href="#" class="time_work">Режим работы</a>
                            <div class="tooltip">
                                <div class="tooltip__inner">
                                    <p>Пн: 08:00 - 21:00</p>
                                    <p>Вт: 08:00 - 19:00</p>
                                    <p>Ср: 08:00 - 21:00</p>
                                    <p>Чт: 08:00 - 21:00</p>
                                    <p>Пт: 08:00 - 21:00</p>
                                    <p>Сб: 08:00 - 21:00</p>
                                    <p>Вс: Выходной</p>
                                    <p>Обед ежедневно: 13:30 - 14:30</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="link">
                        <a class="log_in" href="log_in/index.php">Профиль</a>
                    </div>
            </div>
</header>
<div class="main_ticket">
    <link rel="stylesheet" href="CSS/Style_ticket.css">

    <div class="head_block4">
        <div class="name_block4"><h3>Билет</h3></div>
        <div class="ticket">
            <div class="row_ticket row1">
                <h3>Номер поезда: </h3><h4><?= $railway['code'] ?></h4>
                <h3>Станция отправления: </h3><h4><?= $railway['departure'] ?></h4>
                <h3>Станция назначения: </h3><h4><?= $railway['arrival'] ?></h4>
            </div>

            <div class="row_ticket row2">
                <h3>Дата отправления: </h3><h4><?= date("d.m.Y",strtotime($railway['dated']))?></h4>
                <h3>Время отправления: </h3><h4><?= date("G.i",strtotime($railway['timed']))?></h4>
            </div>

            <div class="row_ticket row3">
                <h3>Дата прибытия: </h3><h4><?= date("d.m.Y",strtotime($railway['datea']))?></h4>
                <h3>Время прибытия: </h3><h4><?= date("G.i",strtotime($railway['timea'])) ?></h4>
            </div>

            <div class="row_ticket row4">
                <h3>Количество свободных мест: </h3><h4><?= $railway['place'] ?></h4>
                <h3>Стоимость билета: </h3><h4><?= $railway['price'] ?> бел. руб.</h4>
            </div>



            <?php
            if (isset($_SESSION['user']['id'])) {?>
            <form action="/vendor/buy.php?id=<?= $railway['id'] ?>" method="post">
                <input class="input row_input" type="hidden" name="idr" value="<?= $railway['id'] ?>">
                <div class="row_ticket">
                    <h3>Выберите количество пассажиров:</h3>
                    <input class="row_number" type="number" min="1" max="4" name="places">
                </div>

                <div class="row_ticket">
                    <h3>Фамилия, Имя, Отчество:</h3>
                    <input class="row_input" type="text" name="name" placeholder="Фамилия, Имя, Отчество">
                </div>

                <div class="row_ticket">
                    <h3>Серия и Номер пасспорта:</h3>
                    <input class="row_input" type="text" name="series_passport" placeholder="Серия и Номер пасспорта">
                </div>

                <div class="btn_buy">
                    <button type="submit" class="buy_ticket">Купить</button>
                </div>
            </form>
                <?php }
                else redirect('/log_in/index.php');
                ?>
        </div>
    </div>
</div>

<section id=basement  >
    <div class="buttom4">
        <a href="index.php#line-stop" class="next_page">Назад к выбору параметров...</a>
    </div>
    <div class="basement_text">
        <div class="basement_text__inner">
            <div class="box about_us">
                <p>О нас!</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum error at earum rerum asperiores temporibus soluta perspiciatis quidem enim, dolorum molestias eaque molestiae accusamus quisquam culpa quae nisi consequatur consequuntur.</p>
            </div>
            <div class="box call_number">
                <p>Телефоны для справок:</p>
                <a class="number" href="#">+375291234567</a>
                <a class="number" href="#">+375257654321</a>
                <a class="number" href="#">+375331100223</a>
            </div>
            <div class="box send_us">
                <p>Написать нам в:</p>
                <a class="link_web" href="#">Telegram</a>
                <a class="link_web" href="#">ВКонтакте</a>
                <a class="link_web" href="#">Linked In</a>
                <a class="link_web" href="#">Mail.ru</a>
            </div>
            <div class="box support">
                <p>Сообщение<br> в техническую поддержку:</p>

            </div>
        </div>
    </div>
</section>
</body>
</html>

