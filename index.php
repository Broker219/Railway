<?php
global $connect;
require_once 'config/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>БелЖД</title>
</head>
<body id="main">
<header class="header">
    <div class="container">
        <div>
            <div class="logo">
                <div class="logo_img">
                    <a href="#"><img src="CSS/Images/logo_image.png" alt="logo" width="130px"></a>
                </div>
                <div class="logo_name">
                    <h1>
                        <a href="#welcome_intro" class="name__inner">Белорусская Железная Дорога</a>
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
<section id="welcome_intro">

    <div class="intro">

        <div class="intro__inner">
            <div class="block_intro"><h2 class="h2">Добро пожаловать</h2></div>

        </div>

        <div class="buttoms_for_scrolling">
            <div class="buttom1">
                <a href="#line-stop" class="next_page">Выбрать параметры...</a>
            </div>
            <div class="buttom2">
                <a href="#stop_line2" class="next_page">Другая информация...</a>
            </div>
        </div>


    </div>
</section>

<div id="line-stop"></div>

<section id="settings">
    <div class="main_settings" >

        <form action="#line-stop2" method="post">
            <link rel="stylesheet" type="text/css" href="CSS/Style_settings.css">
            <div class="main">
                <div class="head_block" >
                    <div class="name_block"><h3>Выбор параметров</h3></div>
                </div>
                <div class="block_settings">
                    <div class="name_settings">
                        <!-- Откуда/Куда -->
                        <h4>Откуда:</h4>
                        <select name="depar" id="change" >
                            <option value="" disabled selected></option>
                            <option value="Минск">Минск</option>
                            <option value="Витебск">Витебск</option>
                            <option value="Брест">Брест</option>
                            <option value="Гродно">Гродно</option>
                            <option value="Могилёв">Могилёв</option>
                            <option value="Гомель">Гомель</option>
                        </select>

                        <h4>Куда:</h4>
                        <select name="arriv" id="change">
                            <option value="" disabled selected></option>
                            <option value="Брест">Брест</option>
                            <option value="Гродно">Гродно</option>
                            <option value="Могилёв">Могилёв</option>
                            <option value="Гомель">Гомель</option>
                            <option value="Минск">Минск</option>
                            <option value="Витебск">Витебск</option>
                        </select>
                    </div>
                    <div class="name_settings date_time">
                        <!-- Дата/Время -->
                        <h4>Выберите дату:</h4>
                        <input type="date" id="change" name="datd">
                    </div>


                    <button type="submit" class="button">
                        <a class="link_search" href="#line-stop2">
                            <h3>Поиск</h3>
                        </a>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="buttom3">
        <a href="#stop-line2" class="next_page">Другая информация...</a>
    </div>
</section>
<section id="search">
    <div id="line-stop2"></div>
    <div class="main_search">
        <link rel="stylesheet" type="text/css" href="CSS/Style_search.css">

        <div id="search2" class="search2">
            <div class="head_block2">
                <div class="name_block2"> <h3>Выбор рейса</h3></div>
            </div>
            <div id="block_settings2" class="block_settings2">
                <?php
                $departure = $_POST['depar'] ?? null;
                $arrival = $_POST['arriv'] ?? null;
                $dated = $_POST['datd'] ?? null;
                $sql="SELECT * FROM `railway` WHERE `departure`= '$departure' AND `arrival`='$arrival' AND `dated`='$dated'";
                $railway=mysqli_query($connect, $sql);
                $row_count=mysqli_num_rows($railway); ?>
                <?php
                if($row_count>0) {
                for ($i=0; $i<$row_count; $i++) {
                $row_arr = mysqli_fetch_assoc($railway);
                $id=$row_arr['id']?? '';
                $departure=$row_arr['departure']?? null;
                $arrival=$row_arr['arrival'] ?? null;
                $dated = $row_arr['dated'] ?? null;
                $timed = $row_arr['timed'] ?? null;
                $datea = $row_arr['datea'] ?? null;
                $timea = $row_arr['timea'] ?? null;
                $price = $row_arr['price'] ?? null;
                $code = $row_arr['code'] ?? null;
                $place = $row_arr['place'] ?? null;
                ?>

                <div class="name_settings2">
                    <div id="change2">
                        <div class="depar_arriv">
                            <form class="route">
                                <div class="blocks_result2">
                                    <h5>Номер рейса:</h5>
                                    <div class="result2 result_search_time_departure">
                                        <span><?php echo  $code; ?></span>
                                    </div>
                                    <h5>Маршрут:</h5>
                                    <div class="result2 result_search_route">
                                        <span><?php echo  $departure, '-', $arrival; ?></span>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="depar_arriv">
                            <form class="route">
                                <div class="blocks_result">
                                    <h5>Время отправления:</h5>
                                    <div  class="result2 result_search_time_departure">
                                        <span><?php echo  date("G:i",strtotime($timed)), ' ', date("d.m.Y",strtotime($dated)); ?></span>
                                    </div>
                                    <h5>Время прибытия:</h5>
                                    <div class="result2 result_search_time_arrival">
                                        <span><?php echo  date("G:i",strtotime($timea)), ' ',date("d.m.Y",strtotime($datea)); ?></span>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="depar_arriv">
                            <form class="route" >
                                <div class="blocks_result">
                                    <h5>Стоимость:</h5>
                                    <div class="result2 result_search_price">
                                        <span><?php echo $price, ' бел.руб' ?></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="depar_arriv">
                            <form class="route">
                                <div class="blocks_result">
                                    <h5>Количество свободных мест:</h5>
                                    <div class="result2 result_search_place">
                                        <span><?php echo $place ?></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="box_buy2">
                            <a href="ticket.php?id=<?= $id ?>" class="buy2">Купить билет</a>
                        </div>

                    </div>
                </div>

                    <?php
                    }
                    }
                    else {?><span class="none_result">Маршрут не найден</span>

                        <?php
                    }
                    ?>


            </div>
        </div>
    </div>
</section>





<section id=basement  >
  <div class="stop_line2"></div>
    <div class="buttom4">
        <a href="#line-stop" class="next_page">Назад к выбору параметров...</a>
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

    <div id="stop-line2"></div>
</section>
</body>

</html>
