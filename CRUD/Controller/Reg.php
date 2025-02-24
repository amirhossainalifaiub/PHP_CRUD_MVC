<?php
session_start();

if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $isValid = true;
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $NameError = "";
    $EmailErrorMess = "";
    $PasswordError = "";
    $RegError = "";

    if(empty($Name))
    {
        $_SESSION['NameError']= "Name is empty";
        $isValid = false;
    }
    else{
        $_SESSION['NameError'] = "";
    }

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

            if(!$user)
            {
                if($userM->create($Name, $Email, $Password)){
                    header("Location: http://localhost/PHP/View/Login.php");
                    exit();
                }else{
                    $_SESSION["RegError"] = "Registration error";
                    $isValid = false;
                }
            }
            else{
                $_SESSION["RegError"] = "User Already Registred";
                    $isValid = false;
            }
        }
    }
}

?>