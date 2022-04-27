<?php if (!defined('BASE_PATH')) exit('No direct script access allowed');

// true ha van benne egy olyan tag, amelyiknek attributuma is van
function checkForHtml($str)
{
    $dom = new DOMDocument('1.0', "UTF-8");
    @$dom->loadHTML('<div>' . $str . '</div>');
    $elements = $dom->getElementsByTagName('*');
    $count = 0;

    foreach ($elements as $node) {

        foreach ($node->childNodes as $child) {

            if ($child->nodeType == 1) {

                $count++;
                if ($count > 2 && $child->hasAttributes()) return true;
            }
        }
    }

    return false;
}

function isLegalUserName($str)
{
    if (strlen($str) > 30 || strlen($str) < 3) return false;
    preg_match("/^(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/", $str, $matches);
    if (!isset($matches[0])) return false;
    return ($matches[0] == $str);
}

function isLegalName($str)
{
    if (strlen($str) > 50 || strlen($str) < 3) return false;
    preg_match("/^[A-Za-zöüóőúűéáíÖÜÓŐÚŰÉÁÍ]+(?:[ '-][A-Za-zöüóőúűéáíÖÜÓŐÚŰÉÁÍ]+)*$/", $str, $matches);
    if (!isset($matches[0])) return false;
    return ($matches[0] == $str);
}

function isLegalText($str, $maxLenght = 255)
{
    if (strlen($str) > $maxLenght || strlen($str) < 1) return false;
    if (checkForHtml($str)) return false;
    return true;
}


// Start and end with an alphanumeric character. 
// Atleast 1 uppercase letter. 
// Atleast 1 lower case letter. 
// Atleast 1 Number. 
// Atleast 1 special character from the list(!@#$%^&*_<>?|). 
// Minimum 8 and maximum 50 characters length.

function isLegalPassword($str)
{
    if (strlen($str) > 50 || strlen($str) < 8) return false;
    preg_match('/^(?=.*\d)(?=.*[!@#$%^&*_<.>?|])(?=.*[a-z])(?=.*[A-Z])[A-Za-z\d][A-Za-z\d!@#$%^&*_<.>?|]{6,}[A-Za-z\d]$/', $str, $matches);
    if (!isset($matches[0])) return false;
    return ($matches[0] == $str);
}

function isLegalEmail($str)
{
    if (strlen($str) > 255 || strlen($str) < 6) return false;
    preg_match('/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/', $str, $matches);
    if (!isset($matches[0])) return false;
    return ($matches[0] == $str);
}
