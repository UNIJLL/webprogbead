<?php if (!defined('BASE_PATH')) exit('No direct script access allowed');

class kapcsolat
{
    public function __construct() 
    {
        loadClass("string_helper");
        getInstance('lang')->loadLang('input');
    }

    public function elerhetoseg()
    {
        loadView('elerhetoseg');
    }

    public function messageformvalidate()
    {
        if (isset($_POST['button']) && $_POST['button'] == 'send_msg_button') {

            if (!isset($_SESSION['user']['id'])) {

                if (isLegalName($_POST['name']) === false) {

                    echo getInstance("messages")->getHtml(
                        array(
                            'line1' => getInstance('lang')->getLangLine('dict_!'),
                            'line2' => getInstance('lang')->getLangLine('input_nameRules'),
                            'color' => '#f44336'
                        )
                    );
                    return;
                }
    
                if (isLegalEmail($_POST['email']) === false) {
    
                    echo getInstance("messages")->getHtml(
                        array(
                            'line1' => getInstance('lang')->getLangLine('dict_!'),
                            'line2' => getInstance('lang')->getLangLine('input_notValidEmail'),
                            'color' => '#f44336'
                        )
                    );
                    return;
                }
            }

            if (isLegalText($_POST['subject'], 100) === false) {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('input_textNotValid'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            if (isLegalText($_POST['message'], 1000) === false) {

                echo getInstance("messages")->getHtml(
                    array(
                        'line1' => getInstance('lang')->getLangLine('dict_!'),
                        'line2' => getInstance('lang')->getLangLine('input_textNotValid'),
                        'color' => '#f44336'
                    )
                );
                return;
            }

            // minden adat rendben
            getInstance("db")->insert(
                'messages',
                array(
                    'user_id'    => (isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0),
                    'received'   => timeNow(),
                    'name'       => $_POST['name'],
                    'email'      => (isset($_SESSION['user']['id']) ? $_SESSION['user']['email'] : $_POST['email']),
                    'subject'    => $_POST['subject'],
                    'message'    => $_POST['message'],
                )
            );

            getInstance("messages")->infoMsg('Üzenetét rögzítettük.', false);
            echo '|redirect|' . BASE.'kapcsolat/utolsouzenet';
        }
    }

    public function uzenet()
    {
        loadView('uzenetkuldes');
    }

    public function utolsouzenet()
    {
        loadView('utolsouzenet');
    }

    public function uzenetek()
    {
        loadView('uzenetek');
    }
}
