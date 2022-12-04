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

    public function delete_user($user_id){
        $sql = "DELETE FROM users WHERE user_id = '$user_id'";
        $query = $this->connection->query($sql);

        if($query){
            return true;
        }else{
            return false;
        }
    }
}