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
    <?php callFormValidator('pwchange_form', 'user', 'pwchangeformvalidate'); ?>
</head>

<body>
    <?php getHeader(); ?>
    <div class="container">
        <?php getInstance('menu')->getMenu(); ?>
        <form id="pwchange_form" class="mt-4" name="pwchange_form" action="<?php echo BASE; ?>user/pwchange" method="post">
            <h1 class="mb-4"><?php echo getInstance('lang')->getLangLine('dict_pwchange'); ?></h1>
            <!-- <input type="submit" class="submitbutton mr-0 btn btn-primary" name="backButton" value="<?php echo getInstance('lang')->getLangLine('dict_back'); ?>"> -->
            <input type="reset" class="mr-0 btn btn-success" name="newpw_reset" value="<?php echo getInstance('lang')->getLangLine('dict_delete'); ?>">
            <input type="submit" class="submitbutton mr-0 btn btn-success" id="newpw_ok" name="newpw_ok" value="<?php echo getInstance('lang')->getLangLine('dict_pwchange'); ?>">
            <input type="password" id="old_usrpasswd" name="old_usrpasswd" class="form-control mt-4" placeholder="<?php echo getInstance('lang')->getLangLine('user_oldPw'); ?>" autofocus=""><br>
            <input type="password" name="new_usrpasswd" class=" form-control" placeholder="<?php echo getInstance('lang')->getLangLine('user_newPw'); ?>" autofocus=""><br>
            <input type="password" name="new_usrpasswd_chk" class="form-control" placeholder="<?php echo getInstance('lang')->getLangLine('user_newPwChk'); ?>" autofocus=""><br>
        </form>
    </div>
</body>

</html>