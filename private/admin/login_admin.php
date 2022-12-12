<?php 

include_once('db_admin.php');

class Login extends DbConnection{

    public function __construct()
    {
        parent::__construct();
    }
        
    public function check_login($email, $password){

            if ($email == "admin@admin.com" and $password == "admin123"){
                return "admin@admin.com";
            }else{
                $this->errors[] = "Wrong email or password";
                return false;
            }    
    }

    public function create_session($email){
        $session_id = rand();
        $current_date = date("Y-m-d");
        $query_session = $this->connection->prepare('INSERT INTO sessions VALUES (:session_id, :session_user_email, :session_created_at)');
        $query_session->bindValue(':session_id', $session_id);
        $query_session->bindValue(':session_user_email', $email);
        $query_session->bindValue(':session_created_at', $current_date);
        $query_session->execute();
        return $session_id;
    }

}

