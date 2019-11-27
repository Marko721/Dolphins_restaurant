<?php

class Session {

    private $signed_in = false;
    public  $user_id;
    public  $message;
    public  $username;
    public  $status;

function __construct() {

    session_start();
    $this->check_the_login();
    $this->check_message();
    
}

public function is_signed_in() {

    return $this->signed_in;

}

public function login($user) {

    if($user) {

        $this->signed_in = true;
        $this->user_id  = $_SESSION['user_id'] = $user->id;
        $this->username = $_SESSION['username'] = $user->username;
        $this->status = $_SESSION['status'] = $user->status;
        //obrnuo
    }

}

public function logout() {

    $this->signed_in = false;
    unset($this->user_id);
    unset($this->username);
    unset($this->status);
    unset($_SESSION['user_id']);
    
}

private function check_the_login() {

    if(isset($_SESSION['user_id'])) {

        $this->user_id = $_SESSION['user_id'];
        $this->username = $_SESSION['username'];
        $this->signed_in = true;
        $this->status = $_SESSION['status'];

    } else {

        unset($this->user_id);
        unset($this->username);
        $this->signed_in = false;
        unset($this->status);
        
    }

}

    public function message($msg="") {

        if(!empty($msg)) {

            $_SESSION['message'] = $msg;

        } else {

            return $this->message;

        }

    }

    private function check_message() {

        if(isset($_SESSION['message'])) {

            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);

        } else {

            $this->message = "";

        }

    }






}



$session = new Session();


































?>