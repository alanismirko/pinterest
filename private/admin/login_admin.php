<?php 


class Login {
    
    public function check_login($email, $password){

            if ($email == "admin@admin.com" and $password == "admin123"){
                return "admin@admin.com";
            }else{
                $this->errors[] = "Wrong email or password";
                return false;
            }

        
    }

}

