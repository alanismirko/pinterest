<?php
include_once('db_admin.php');

class Users extends DbConnection{
    public function __construct()
    {
        parent::__construct();   
    }

    public function get_users(){
        $sql = "SELECT * FROM users";
        $query = $this->connection->query($sql);

        $all_users = $query->fetch_all();
        return $all_users;
    }
}