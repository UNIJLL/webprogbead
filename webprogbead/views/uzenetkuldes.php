<?php if (!defined('BASE_PATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">

<head>
    <?php getHead(); ?>
    <?php callFormValidator('message_form', 'kapcsolat', 'messageformvalidate'); ?>
</head>

<body>
    <?php getHeader(); ?>
    <div class="container">
        <?php getInstance('menu')->getMenu(); ?>
        <form id="message_form" name="message_form" action="<?php echo BASE; ?>kapcsolat/uzenetkuldes" method="post">
            <h1 class="mt-4 mb-4">Üzenetküldés</h1>
            <input type="submit" name="send_msg_button" class="submitbutton btn btn-success" value="Küldés" />
            <input type="reset" class="btn btn-danger" value="Törlés" />
            <div class="mt-4">
                <?php if (!isset($_SESSION['user']['id'])) { ?>
                    <!-- <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                            <input class="form-control" name="firstname" placeholder="Vezetéknév" type="text" required autofocus />
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                            <input class="form-control" name="lastname" placeholder="Keresztnév" type="text" required />
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                            <input class="form-control" name="name" placeholder="Név" type="text" required autofocus />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                            <input class="form-control" name="email" placeholder="Az ön email címe" type="email" required />
                        </div>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                        <input class="form-control" name="subject" placeholder="Tárgy" type="text" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <textarea style="resize:vertical;" class="form-control" placeholder="Üzenet..." rows="6" name="message" required></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php getFooter(); ?>
</body>

</html>