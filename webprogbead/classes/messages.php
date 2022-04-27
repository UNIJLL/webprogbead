<?php if (!defined('BASE_PATH')) exit('No direct script access allowed');

class messages
{
    public function __construct()
    {
        if (!isset($_SESSION['messages'])) $_SESSION['messages'] = array();
    }

    public function infoMsg($line, $getLangText = true)
    {
        $_SESSION['messages'][] = array(
            'line1' => '',
            'line2' => ($getLangText ? getInstance('lang')->getLangLine($line) : $line),
            'color' => '#4CAF50'
        );
    }

    public function warningMsg($line1, $line2, $getLangText = true)
    {
        $_SESSION['messages'][] = array(
            'line1' => ($getLangText ? getInstance('lang')->getLangLine($line1) : $line1),
            'line2' => ($getLangText ? getInstance('lang')->getLangLine($line2) : $line2),
            'color' => '#ff9800'
        );
    }

    public function alertMsg($line1, $line2, $getLangText = true)
    {
        $_SESSION['messages'][] = array(
            'line1' => ($getLangText ? getInstance('lang')->getLangLine($line1) : $line1),
            'line2' => ($getLangText ? getInstance('lang')->getLangLine($line2) : $line2),
            'color' => '#f44336'
        );
    }

    public function blueMsg($line1, $line2, $getLangText = true)
    {
        $_SESSION['messages'][] = array(
            'line1' => ($getLangText ? getInstance('lang')->getLangLine($line1) : $line1),
            'line2' => ($getLangText ? getInstance('lang')->getLangLine($line2) : $line2),
            'color' => '#2196F3'
        );
    }

    public function getHtml($msgDef)
    {
        $html = '<div style="padding:12px;font-size:15px;background-color:' . $msgDef['color'] . ';color:#fff">';
        $html .= '<div style="margin-left:1%;">';
        if ($msgDef['line1'] > '') $html .= '<strong>' . $msgDef['line1'] . '&nbsp;&nbsp;</strong>';
        return $html . $msgDef['line2'] . '</div></div>';
    }

    public function getMessages()
    {
        $result = array();

        foreach ($_SESSION['messages'] as $key => $msg) {
            $result[] = $this->getHtml($msg);
            unset($_SESSION['messages'][$key]);
        }

        return $result;
    }
}
