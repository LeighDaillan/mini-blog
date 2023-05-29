<?php

class dbConn
{
    private $db_host = 'localhost';
    private $db_username = 'leigh';
    private $db_password = 'password';
    private $db_name = 'mini_blog';

    public function connect()
    {
        try {
            $conn = mysqli_connect($this->db_host, $this->db_username, $this->db_password, $this->db_name);
            return $conn;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}