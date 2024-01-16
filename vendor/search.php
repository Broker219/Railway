<?php
global $connect;
require_once '../config/connect.php';
?>
        <!doctype html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Railway</title>
                </head>
                <body>
                    <?php
                    $departure = $_POST['depar'];
                    $arrival = $_POST['arriv'];
                    $dated = $_POST['datd'];
                    $sql="SELECT * FROM `railway` WHERE `departure`= '$departure' AND `arrival`='$arrival' AND `dated`='$dated'";
                    $railway=mysqli_query($connect, $sql);
                    $row_count=mysqli_num_rows($railway); ?>

                    <link rel="stylesheet" type="text/css" href="CSS/Style_search.css">
                    <div class="search">
                        <div class="head_block">
                            <div class="name_block"> <h3>Выбор рейса</h3></div>
                        </div>
                        <div class="block_settings">


                        <?php
                    if($row_count>0) {
                       for ($i=0; $i<$row_count; $i++) {
                           $row_arr = mysqli_fetch_assoc($railway);
                           $id=$row_arr['id'];
                           $departure=$row_arr['departure'];
                           $arrival=$row_arr['arrival'];
                           $dated = $row_arr['dated'];
                           $timed = $row_arr['timed'];
                           $datea = $row_arr['datea'];
                           $timea = $row_arr['timea'];
                           $price = $row_arr['price'];
                           $code = $row_arr['code'];
                           $place = $row_arr['place'];
                    ?>
                           <div class="name_settings">
                                <div id="change">
                                    <div class="depar_arriv">
                                        <form class="route">
                                            <div class="blocks_result">
                                                <h5>Номер рейса:</h5>
                                                <div class="result result_search_time_departure">
                                                    <span><?php echo $code; ?></span>
                                                </div>
                                                <h5>Маршрут:</h5>
                                                <div class="result result_search_route">
                                                    <span><?php echo $departure, '-', $arrival; ?></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="depar_arriv">
                                        <form class="route">
                                            <div class="blocks_result">
                                                <h5>Время отправления:</h5>
                                                <div  class="result result_search_time_departure">
                                                    <span><?php echo $timed, '<br/>', $dated; ?></span>
                                                </div>
                                                <h5>Время прибытия:</h5>
                                                <div class="result result_search_time_arrival">
                                                    <span><?php echo $timea, '<br/>', $datea; ?></span>
                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                    <div class="depar_arriv">
                                        <form class="route">
                                            <div class="blocks_result">
                                                <h5>Стоимость:</h5>
                                                <div class="result result_search_price">
                                                    <span><?php echo $price, ' бел.руб' ?></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="depar_arriv">
                                        <form class="route">
                                            <div class="blocks_result">
                                                <h5>Количество свободных мест:</h5>
                                                <div class="result result_search_place">
                                                    <span><?php echo $place ?></span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="box_buy"><a  href="#" class="buy">Купить билет</a></div>
                                </div>
                           </div>
                        </div>

                    </div>
                           <?php
                       }
                    }
                    else echo "Маршрут Не найден";

                    ?>

                    <br> <br>
                </body>
            </html>