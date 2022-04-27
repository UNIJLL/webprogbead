<?php if(!defined('BASE_PATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">

<head>
    <?php getHead(); ?>
    <?php callFormValidator('login_form', 'user', 'loginformvalidate'); ?>
    <?php callFormValidator('passwordreset_form', 'user', 'passwordresetformvalidate'); ?>
    <?php callFormValidator('registration_form', 'user', 'registrationformvalidate'); ?>
    <script>
        function toggleResetPswd(e) {
            e.preventDefault();
            $('#logreg-forms .form-signin').toggle() // display:block or none
            $('#logreg-forms .form-reset').toggle() // display:block or none
        }

        function toggleSignUp(e) {
            e.preventDefault();
            $('#logreg-forms .form-signin').toggle(); // display:block or none
            $('#logreg-forms .form-signup').toggle(); // display:block or none
        }

        $(() => {
            // Login Register Form
            $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
            $('#logreg-forms #cancel_reset').click(toggleResetPswd);
            $('#logreg-forms #btn-signup').click(toggleSignUp);
            $('#logreg-forms #cancel_signup').click(toggleSignUp);
        })
    </script>
    <style>
        /* sign in FORM */
        #logreg-forms {
            width: 412px;
            margin: 10vh auto;
            background-color: #f3f3f3;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
        }

        #logreg-forms form {
            width: 100%;
            max-width: 410px;
            padding: 15px;
            margin: auto;
        }

        #logreg-forms .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        #logreg-forms .form-control:focus {
            z-index: 2;
        }

        #logreg-forms .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        #logreg-forms .form-signin input[type="password"] {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        #logreg-forms .social-login {
            width: 390px;
            margin: 0 auto;
            margin-bottom: 14px;
        }

        #logreg-forms .social-btn {
            font-weight: 100;
            color: white;
            width: 190px;
            font-size: 0.9rem;
        }

        #logreg-forms a {
            color: lightseagreen;
        }

        #logreg-form .lines {
            width: 200px;
            border: 1px solid red;
        }


        #logreg-forms button[type="submit"] {
            margin-top: 10px;
        }

        #logreg-forms .facebook-btn {
            background-color: #3C589C;
        }

        #logreg-forms .google-btn {
            background-color: #DF4B3B;
        }

        #logreg-forms .form-reset,
        #logreg-forms .form-signup {
            display: none;
        }

        #logreg-forms .form-signup .social-btn {
            width: 210px;
        }

        #logreg-forms .form-signup input {
            margin-bottom: 2px;
        }

        .form-signup .social-login {
            width: 210px !important;
            margin: 0 auto;
        }

        /* Mobile */

        @media screen and (max-width:500px) {
            #logreg-forms {
                width: 300px;
            }

            #logreg-forms .social-login {
                width: 200px;
                margin: 0 auto;
                margin-bottom: 10px;
            }

            #logreg-forms .social-btn {
                font-size: 1.3rem;
                font-weight: 100;
                color: white;
                width: 200px;
                height: 56px;

            }

            #logreg-forms .social-btn:nth-child(1) {
                margin-bottom: 5px;
            }

            #logreg-forms .social-btn span {
                display: none;
            }

            #logreg-forms .facebook-btn:after {
                content: 'Facebook';
            }

            #logreg-forms .google-btn:after {
                content: 'Google+';
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <?php getHeader(); ?>
        <?php getInstance('menu')->getMenu(); ?>
        <p></p>
        <div id="logreg-forms">
            <form id="login_form" action="<?php echo BASE . 'user/login'; ?>" method="post" class="form-signin">
                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> <?php echo getInstance('lang')->getLangLine('dict_login2'); ?></h1>
                <!-- <div class="social-login"> -->
                <!-- <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button> -->
                <!-- <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button> -->
                <!-- </div> -->
                <!-- <p style="text-align:center"> OR  </p> -->
                <br>
                <?php
                if (getConfig("email_based_login")) {
                    echo '<input type="email" name="login_name" class="form-control" placeholder="' . getInstance('lang')->getLangLine('user_email_address') . '" required="" autofocus="">';
                } else {
                    echo '<input type="text" name="login_name" class="form-control" placeholder="' . getInstance('lang')->getLangLine('user_name') . '" required="" autofocus="">';
                }
                ?>
                <input type="password" name="loginPassword" class="form-control" placeholder="<?php echo getInstance('lang')->getLangLine('user_newPw'); ?>" required="">
                <button class="btn btn-success btn-block submitbutton" name="loginbutton" type="submit"><?php echo getInstance('lang')->getLangLine('dict_login2'); ?></button>
                <?php
                if (getConfig("email_based_login")) {
                ?>
                    <br>
                    <a href="#" id="forgot_pswd"><?php echo getInstance('lang')->getLangLine('user_forgot_password'); ?></a>
                    <hr>
                    <!-- <p>Don't have an account!</p>  -->
                    <button class="btn btn-primary btn-block" type="button" id="btn-signup"><?php echo getInstance('lang')->getLangLine('user_sign_up_new_account'); ?></button>
                <?php
                }
                ?>
            </form>

            <form id="passwordreset_form" action="<?php echo BASE . 'user/passwordreset'; ?>" method="post" class="form-reset">
                <input type="email" name="resetEmail" class="form-control" placeholder="<?php echo getInstance('lang')->getLangLine('user_email_address'); ?>" required="" autofocus="">
                <button class="btn btn-primary btn-block submitbutton" name="pwresetbutton" type="submit"><?php echo getInstance('lang')->getLangLine('user_reset_password'); ?></button>
                <br>
                <a href="#" id="cancel_reset"><?php echo getInstance('lang')->getLangLine('dict_back'); ?></a>
            </form>

            <form id="registration_form" action="<?php echo BASE . 'user/registration'; ?>" method="post" class="form-signup">
                <!-- <div class="social-login"> -->
                <!-- <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign up with Facebook</span> </button> -->
                <!-- </div> -->
                <!-- <div class="social-login"> -->
                <!-- <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign up with Google+</span> </button> -->
                <!-- </div> -->

                <!-- <p style="text-align:center">OR</p> -->

                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> <?php echo getInstance('lang')->getLangLine('user_sign_up_new_account'); ?></h1>
                <input type="text" name="user-name" class="form-control" placeholder="<?php echo getInstance('lang')->getLangLine('user_name'); ?>" required autofocus="">
                <input type="text" name="user-fullname" class="form-control" placeholder="<?php echo getInstance('lang')->getLangLine('user_fullname'); ?>" required autofocus="">
                <input type="email" name="user-email" class="form-control" placeholder="<?php echo getInstance('lang')->getLangLine('user_email_address'); ?>" required autofocus="">
                <input type="password" name="user-pass" class="form-control" placeholder="<?php echo getInstance('lang')->getLangLine('user_newPw'); ?>" required autofocus="">
                <input type="password" name="user-repeatpass" class="form-control" placeholder="<?php echo getInstance('lang')->getLangLine('user_newPwChk'); ?>" required autofocus="">
                <!-- <select name="user-gender" class="form-control">
                    <option value="0">< ?php echo getInstance('lang')->getLangLine('user_gender'); ? ></option>
                    <option value="1">< ?php echo getInstance('lang')->getLangLine('user_gender1'); ? ></option>
                    <option value="2">< ?php echo getInstance('lang')->getLangLine('user_gender2'); ? ></option>
                </select> -->
                <!-- <input type="date" name="user-borndate" class="form-control" placeholder="Születési dátum" autofocus=""> -->
                <!-- <input id="borndate-picker" type="text" name="user-borndate" class="form-control datepicker" placeholder="< ?php echo getInstance('lang')->getLangLine('user_borndate'); ? >"> -->
                <!-- <br> -->
                <!-- <input type="checkbox" checked="checked" name="hirlevelEsAjandek"> < ?php echo getInstance('lang')->getLangLine('user_hirlevelEsAjandek'); ? > -->
                <!-- <br><br> -->
                <!-- <p>< ?php echo getInstance('lang')->getLangLine('user_aszf1'); ? > <a href="< ?php echo BASE . 'aszf'; ? >" style="color:dodgerblue">< ?php echo getInstance('lang')->getLangLine('user_aszf2'); ? ></a></p> -->
                <br>
                <button class="btn btn-primary btn-block submitbutton" name="regbutton" type="submit"><?php echo getInstance('lang')->getLangLine('user_sign_up_new_account'); ?></button>
                <br>
                <a href="#" id="cancel_signup"><?php echo getInstance('lang')->getLangLine('dict_back'); ?></a>
            </form>
            <br>
        </div>
        <br>
    </div>
</body>

</html>