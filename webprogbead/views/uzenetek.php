<?php if (!defined('BASE_PATH')) exit('No direct script access allowed');

if (!isset($_SESSION['user']['id'])) {
    getInstance("messages")->alertMsg('Jogosulatlan hozzáférés!', 'Az oldal elérésére csak bejelentkezett felhasználó jogosult.', false);
    redirect(BASE);
}
?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">

<head>
    <?php getHead(); ?>
</head>

<body>
    <?php getHeader(); ?>
    <div class="container">
        <?php getInstance('menu')->getMenu(); ?>
        <?php $msgs = getInstance('db')->query("select * from messages order by received desc"); ?>
        <?php $usernameIndex = getInstance('db')->selectIndex("select id,fullname as value from userdata"); ?>
        <h1 class="mt-4 mb-4">Üzenetek listája</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Időpont</th>
                    <th scope="col">Név</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tárgy</th>
                    <th scope="col">Üzenet</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($msg = $msgs->fetch(PDO::FETCH_ASSOC)) {
                    $dt = explode(' ', $msg['received']);
                    echo '<tr>';
                    echo '<th scope="row" width="120">' . $dt[0] . '<br>' . $dt[1] . '</th>';
                    echo '<td width="200">' . ($msg['user_id'] == 0 ? $msg['name'] . ' (vendég)' : $usernameIndex[$msg['user_id']]) . '</td>';
                    echo '<td width="200">' . $msg['email'] . '</td>';
                    echo '<td width="200">' . $msg['subject'] . '</td>';
                    echo '<td>' . $msg['message'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php getFooter(); ?>
</body>

</html>