<?php
//start session
session_start();
Class User 
{
    var $token_login = "islogin";
    //thiet lap login
    function set_logged($username)
    {
        $_SESSION[$this->token_login] = [
            'username' => $username
        ];
    }

    function set_not_logged() 
    {
        if (isset($_SESSION[$this->token_login])) 
        {
            unset($_SESSION[$this->token_login]);
        }

    }
    //kiem tra logged in
    function is_logged()
    {
        return !empty($_SESSION[$this->token_login]);
    }
}

$user = new User();
?>