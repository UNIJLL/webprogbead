<?php if (!defined('BASE_PATH')) exit('No direct script access allowed');

class user
{
    public function __construct()
    {
        loadClass("string_helper");
        getInstance('lang')->loadLang('user');
        getInstance('lang')->loadLang('input');
    }

    public function pwchange()
    {
        loadView("pwchange");
    }

    public function pwchangeformvalidate()
    {
        if (isset($_POST['old_usrpasswd']) && isset($_POST['new_usrpasswd']) && isset($_POST['new_usrpasswd_chk'])) {

            if (getHash($_POST['old_usrpasswd']) != $_SESSION['user']['passwd']) {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('user_oldPwErr'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            if (isLegalPassword($_POST['new_usrpasswd']) === false) {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('input_pwRules'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            if ($_POST['new_usrpasswd'] == $_POST['old_usrpasswd']) {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('user_pwErr'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            if ($_POST['new_usrpasswd'] != $_POST['new_usrpasswd_chk']) {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('user_pwNotMatch'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            $newPasswordHash = getHash($_POST['new_usrpasswd']);

            getInstance("db")->query(
                "update userdata set password=:password, last_pwchange=:last_pwchange where id=:id;",
                array(
                    ':password' => $newPasswordHash,
                    ':last_pwchange' => timeNow(),
                    ':id' => $_SESSION['user']['id'],
                )
            );

            $_SESSION['user']['passwd'] = $newPasswordHash;

            getInstance("messages")->infoMsg('user_succMsg');
            echo '|redirect|' . $_POST['from_url'];
        }

        return;
    }

    public function registrationformvalidate()
    {
        if (isset($_POST['button']) && $_POST['button'] == 'regbutton') {

            if (isLegalUserName($_POST['user-name']) === false) {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('input_userNameRules'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            // username ellenőrzése
            if (getInstance("db")->selectFirstValue("select 1 from userdata where username =:username ", array(':username' => $_POST['user-name']))) {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('user_nameAlreadyExists'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            if (isLegalName($_POST['user-fullname']) === false) {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('input_nameRules'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            if (isLegalEmail($_POST['user-email']) === false) {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('input_notValidEmail'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            // email ellenőrzése
            if (getInstance("db")->selectFirstValue("select 1 from userdata where email=:email", array(':email' => $_POST['user-email']))) {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('user_emailAlreadyExists'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            if (isLegalPassword($_POST['user-pass']) === false) {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('input_pwRules'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            if ($_POST['user-pass'] != $_POST['user-repeatpass']) {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('user_pwNotMatch'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            // minden adat rendben
            getInstance("db")->insert(
                'userdata',
                array(
                    'email'    => $_POST['user-email'],
                    'password' => getHash($_POST['user-pass']),
                    'username' => $_POST['user-name'],
                    'fullname' => $_POST['user-fullname'],
                )
            );

            // aktíváló link küldése xxx

            getInstance("messages")->infoMsg('user_activated');
            echo '|redirect|' . $_POST['from_url'];
        }

        return;
    }

    public function passwordresetformvalidate()
    {
        if (isset($_POST['resetEmail']) && isLegalEmail($_POST['resetEmail'])) {

            // email ellenőrzése
            if (getInstance("db")->selectFirstValue("select 1 from userdata where email=:email", array(':email' => $_POST['resetEmail']))) {

                // levél küldése xxx

                getInstance("messages")->infoMsg('user_resetPwMsg');
            } else {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('user_emailNotFound'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            echo '|redirect|' . BASE . 'user/login';
        }
    }

    public function login()
    {
        loadview('login');
    }

    public function loginformvalidate()
    {
        if (isset($_POST['login_name']) && isset($_POST['loginPassword'])) {

            $row = getInstance("db")->selectFirstRecord(
                "select * from userdata where email=:email and password=:password",
                array(':email' => $_POST['login_name'], ':password' => getHash($_POST['loginPassword']))
            );

            if ($row !== false && isset($row['username'])) {

                $_SESSION['user']['id']           = $row['id'];
                $_SESSION['user']['passwd']       = $row['password'];
                $_SESSION['user']['name']         = $row['username'];
                $_SESSION['user']['fullname']     = $row['fullname'];
                $_SESSION['user']['email']        = $row['email'];

                echo '|redirect|' . BASE;
            } else {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('user_unSuccLogin'),
                        'line2' => getInstance('lang')->getLangLine('user_pwChkFail'),
                        'color' => '#f44336'
                    )
                );
            }
        }

        return;
    }

    public function logout()
    {
        unset($_SESSION['user']);
        redirect(BASE);
    }
}
