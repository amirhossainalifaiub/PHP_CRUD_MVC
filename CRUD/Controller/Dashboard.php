<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Delete'])) {
    $Delete = trim($_POST['Delete']);

    require_once "../Model/Database.php";
    require_once "../Model/User.php";
    $userM = new UserM($con);
    if($userM->DeleteUser($Delete)){
        $_SESSION["del"] = "Delete successful";
        header("Location: http://localhost/PHP/View/Dashboard.php");
    }
    else{
        $_SESSION["del"] = "Delete Unsuccessful";
        header("Location: http://localhost/PHP/View/Dashboard.php");
    }
}


?>