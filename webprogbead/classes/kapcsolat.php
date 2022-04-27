<?php
class kapcsolat
{
	public function __construct() 
    {
        $this->db = getInstance("db");
	}

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
