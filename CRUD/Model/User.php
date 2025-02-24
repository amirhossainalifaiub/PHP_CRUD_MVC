<?php
class UserM{
    private $con;

    public function __construct($con){
        $this->con = $con;
    }

    public function create($Name, $Email, $Password){
        $hashed_password = password_hash($Password, PASSWORD_DEFAULT);
        $stmt = $this->con->prepare("insert into user (Name, Email, Password) values (?, ?, ?)");
        $stmt->bind_param("sss", $Name, $Email, $hashed_password);
        return $stmt->execute();
    }

    public function getUser($Email){
        $stmt = $this->con->prepare("select Name, Email, Password from user where Email = ?");
        $stmt -> bind_param("s", $Email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getAllUser(){
        $stmt = $this->con->prepare("select * from user ");
        //$stmt -> bind_param("s", $Email);
        $stmt->execute();
        $result = $stmt->get_result();
        //return $result->fetch_assoc();
        return $result;
    }

    public function DeleteUser($Email){
        $stmt = $this->con->prepare("DELETE FROM user WHERE Email = ?");
        $stmt -> bind_param("s", $Email);
        return $stmt->execute();
        // $result = $stmt->get_result();
        // return $result->fetch_assoc();
    }

}


?>