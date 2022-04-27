<?php
class user
{
	public function __construct() 
    {
        $this->db = getInstance("db");
	}
    
    public function login()
    {
        echo "user login";
    }
    
    public function logout()
    {
        echo "user logout";
    }
}
