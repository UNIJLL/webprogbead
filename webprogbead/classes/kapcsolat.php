<?php
class kapcsolat
{
	public function __construct() 
    {
        $this->db = getInstance("db");
	}

    public function elerhetoseg()
    {
        echo "kapcsolat elerhetoseg";
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
