<?php 

include_once('db_admin.php');

class Logout extends DbConnection{

    public function __construct()
    {
        parent::__construct();
    }
        
    public function logout($session_id){
        $query_session = $this->connection->prepare('DELETE FROM sessions WHERE session_id=:session_id');
        $query_session->bindValue(':session_id', $session_id);
        $query_session->execute();

        if(!$query_session){
            return false;
        }else{
            return true;
        }
    }

}

