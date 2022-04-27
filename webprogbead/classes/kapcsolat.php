<?php
class kapcsolat
{
	public function __construct() 
    {
        $this->db = getInstance("db");
	}
    
    public function elerhetoseg()
    {
        echo "elerhetoseg";
    }

    public function index()
    {
        echo "kapcsolat index";
    }
}
