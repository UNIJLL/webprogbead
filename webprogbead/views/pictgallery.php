<?php if (!defined('BASE_PATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">

<head>
    <?php getHead(); ?>
    <?php loadStyle("pictgallery"); ?>
</head>

<body>
    <?php getHeader(); ?>
    <div class="container">
        <?php getInstance('menu')->getMenu(); ?>
        <div style="width:100%;height:5px;"></div>
        <div id="gallery">
            <?php
            foreach (glob(PICT_PATH . '*.jpg') as $filename) {
                echo '<a href="' . BASE . 'pictures/' . basename($filename) . '"><img src="' . BASE . 'pictures/' . basename($filename) . '"></a>';
            }
            ?>
        </div>
    </div>
    <?php getFooter(); ?>
</body>

</html>