<?php if(!defined('BASE_PATH')) exit('No direct script access allowed');

class lang
{
    private $lang;

    public function __construct()
    {
        $this->lang = array();
    }

    function loadLang($langFileId)
    {
        if (file_exists(LANG_PATH . $langFileId . '.' . $_SESSION['lang'] . '.php')) {
            require_once(LANG_PATH . $langFileId . '.' . $_SESSION['lang'] . '.php');
            $this->lang = array_merge($this->lang, $lang);
        } else {
            trigger_error("Language file not found: " . $langFileId . '.' . $_SESSION['lang'], E_USER_ERROR);
        }
    }

    function getLangLine($line)
    {
        return isset($this->lang[$line]) ? $this->lang[$line] : "($line)";
    }
}
