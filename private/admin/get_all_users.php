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

        $rows = $query->fetch_all();
        $users_encoded = json_encode($rows,true);
        return $rows;
    }
}