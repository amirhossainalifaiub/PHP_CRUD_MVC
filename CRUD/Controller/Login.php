<?php
session_start();

if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $isValid = true;
    $Email = $_POST['email'];
    $EmailErrorMess = "";
    $Password = $_POST['password'];
    $PasswordError = "";
    $loginError = "";

    if(empty($Email))
    {
        $_SESSION['EmailErrorMess']= "Ëmail is empty";
        $isValid = false;
    }
    else{
        $_SESSION['EmailErrorMess'] = "";
    }

    if(empty($Password))
    {
        $_SESSION['PasswordError']= "Password is empty";
        $isValid =false;
    }
    else{
        $_SESSION['PasswordError'] = "";
    }

    if($isValid === true)
    {
        if(!empty($Email) && !empty($Password))
        {
            require_once "../Model/Database.php";

            
            require_once "../Model/User.php";
            $userM = new UserM($con);

            $user = $userM->getUser($Email);

            if($user && password_verify($Password, $user['Password'])){
                $_SESSION['Email'] = $Email;
                $_SESSION['user'] = $user['Name'];
                
                $_SESSION["loginError"] = "";
                header("Location: http://localhost/PHP/View/Dashboard.php");
                exit();
            }
            else{
                $_SESSION["loginError"] = "Login Error";
                //echo "Error User Name or Password. <a href='../View/Login.php'>Login</a>";
                $isValid =false;
                header("Location: ../View/Login.php");
            }
        }
        else{
            
            $_SESSION['PasswordError'] = "Enter Email or password";
        }
    }
    else{
        header("Location: ../View/Login.php");
    }
}
else{
    echo "Invalid Request";
}


?>