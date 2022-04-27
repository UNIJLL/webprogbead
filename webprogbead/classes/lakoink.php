<?php
class lakoink
{
	public function __construct() 
    {
        $this->db = getInstance("db");
	}
    
    public function index()
    {
        echo "lakoink index";
    }
}
