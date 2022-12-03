<?php 


class Login {
    protected $errors = array();
    private string $email;
    private string $password;


    
    public function check_login($email, $password){
        $this->errors = array();

        if(empty($username)){
            $this->errors[] = "Wrong email or password";
        }

        if(empty($password)){
            $this->errors[] = "Wrong email or password";
        }

        if(count($this->errors) == 0){
            if ($email == "admin@admin.com" and $password == "admin123"){
                return $_SESSION['user'] == "admin";
            }else{
                $this->errors[] = "Wrong email or password";
            }

            return $this->errors;
        }
    }

}

