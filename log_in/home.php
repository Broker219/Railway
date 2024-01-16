<?php
require_once __DIR__ . '/src/helpers.php';
require_once '../config/connect.php';
checkAuth();
global $connect;
$user = currentUser();
$id =$_SESSION['user']['id'];
$order = mysqli_query($connect, "SELECT `railway`.`departure` , `railway`.`arrival`, `railway`.`code`, `orders`.`places`, `orders`.`fio`, `railway`.`dated`, `railway`.`datea`, `railway`.`timed`,`railway`.`timea`, `orders`.`id`, `orders`.`id_railway` FROM `orders` LEFT JOIN `railway` ON (`railway`.`id`=`orders`.`id_railway`) LEFT JOIN `users` ON (`users`.`id`=`orders`.`id_user`) WHERE `users`.`id`='$id' order by `railway`.`dated`");
$order = mysqli_fetch_all($order);
?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<?php include_once __DIR__ . '/components/head.php'?>
<body>
<div class="card home">
    <h1>Привет, <?php echo $user['name'] ?>!</h1>
    <h3>Ваши поездки:</h3>
    <div>
        <?php
            foreach ($order as $order)
            {
                ?> <table class="card">
                <tr class="block_settings">

                    <td aria-label="center" colspan="4" style="text-align: center"><?= $order[0] ?> - <?= $order[1] ?>, рейс <?= $order[2] ?></td>
                </tr>
                <tr class="block_settings">
                    <td>Отправление: <?=date("d.m.Y",strtotime($order[5]))?> в <?=date("G.i",strtotime($order[7]))?></td>
                    <td>Количество мест: <?= $order[3] ?></td>
                </tr>
                <tr class="block_settings">
                    <td>Прибытие: <?=date("d.m.Y",strtotime($order[6]))?> в <?=date("G.i",strtotime($order[8]))?></td>
                    <td>ФИО: <?= $order[4] ?></td>
                </tr>
            <td colspan="4" style="text-align: center">
                <form action="../vendor/delete_order.php?id=<?= $order[9]?>" method="post">
                    <input  type="hidden" name="id" value="<?= $order[9] ?>">
                    <input  type="hidden" name="place" value="<?= $order[3] ?>">
                    <input  type="hidden" name="id_railway" value="<?= $order[10] ?>">
                    <button type="submit">Отменить</button>
                </form>
               </td>
                <?php
            }
            ?>
        </table>
    </div>
    <a href="../index.php">Вернуться на главную</a>
    <form action="src/actions/logout.php" method="post">
        <button role="button">Выйти из аккаунта</button>
    </form>
</div>

<?php include_once __DIR__ . '/components/scripts.php' ?>
</body>
</html>