<?php if(!defined('BASE_PATH')) exit('No direct script access allowed');

class kapcsolat
{
	// public function __construct() 
    // {
	// }

    public function elerhetoseg()
    {
        loadView('elerhetoseg');
    }
    
    public function uzenet()
    {
        echo "uzenet";
    }
    
    public function uzenetek()
    {
        echo "uzenetek";
    }
}
