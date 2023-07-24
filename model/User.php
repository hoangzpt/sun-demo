<?php

class User
{
    private $id;
    private $username;
    private $password;
    private $email;

    public function __construct($row)
    {
        $this->id = $row['id'] ?? '';
        $this->username = $row['username'];
        $this->password = $row['password'];
        $this->email =$row['email'];
    }

    public function get_id() {
        return $this->id;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_username() {
        return $this->username;
    }

    public function set_username($username) {
        $this->username = $username;
    }

    public function get_password() {
        return $this->password;
    }

    public function set_password($password) {
        $this->password = $password;
    }
    public function get_email() {
        return $this->email;
    }

    public function set_email($email) {
        $this->email = $email;
    }


}