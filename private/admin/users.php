<?php
include_once('db_admin.php');

class Users extends DbConnection{
    public function __construct()
    {
        parent::__construct();   
    }

    public function get_users(){
        $query_all_users = $this->connection->prepare('SELECT * FROM users');
        $query_all_users->execute();
        $all_users = $query_all_users->fetchAll();
        return $all_users;
    }

    public function delete_user($user_id){
        $query_delete_user = $this->connection->prepare("DELETE FROM users WHERE user_id =:user_id");
        $query_delete_user->bindValue(':user_id', $user_id);
        $query_delete_user->execute();
        if($query_delete_user){
            return true;
        }else{
            return false;
        }
    }
}