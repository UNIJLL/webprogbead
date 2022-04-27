<!DOCTYPE html>
<html lang="hu">

<head>
    <?php getHead(); ?>
</head>

<body>
    <div class="container">
        <?php
        getInstance('menu')->getHeader();
        getInstance('menu')->getMenu();
        ?>
    </div>
</body>

</html>