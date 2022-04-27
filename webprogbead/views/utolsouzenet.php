<?php if (!defined('BASE_PATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">

<head>
    <?php getHead(); ?>
</head>

<body>
    <?php getHeader(); ?>
    <div class="container">
        <?php getInstance('menu')->getMenu(); ?>
        <?php $msg = getInstance('db')->selectFirstRecord("select * from messages order by received desc limit 1"); ?>
        <h1 class="mt-4 mb-5">Az éppen elküldött üzenet</h1>
        <p><strong>Az üzenet időpontja: </strong><?php echo $msg['received']; ?></p>
        <p><strong>Név: </strong><?php echo $msg['user_id'] == 0 ? $msg['name'].' (vendég)' : $_SESSION['user']['fullname']; ?></p>
        <p><strong>Email: </strong><?php echo $msg['email']; ?></p>
        <p><strong>Tárgy: </strong><?php echo $msg['subject']; ?></p>
        <p><strong>Üzenet: </strong><?php echo $msg['message']; ?></p>
    </div>
    <?php getFooter(); ?>
</body>

</html>