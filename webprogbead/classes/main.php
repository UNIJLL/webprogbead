<?php
class main
{
	public function __construct() 
    {
        $this->db = getInstance("db");
	}
    
    public function index()
    {
        loadView("mainpage");
    }
}
