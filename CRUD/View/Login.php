<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        header("Location: ../View/Dashboard.php");
        exit();
    }else{
        session_destroy();
    }
?>

<!Doctype html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form method = "post" action = "../Controller/Login.php" novalidate>
            Login
            <table>
                <br><br>
                <tr>
                    <?php
                        echo isset($_SESSION['loginError']) ? $_SESSION['loginError'] : "";    
                    ?>
                </tr.
                <tr>
                    <th> Email : </th>
                    <td> 
                        <input type = "text" id = "email" name = "email" >
                        <?php
                            echo isset($_SESSION['EmailErrorMess']) ? $_SESSION['EmailErrorMess'] : "";    
                        ?>
                    </td>
                </tr>
                <tr>
                    <th> Password : </th>
                    <td> 
                        <input type = "password" id="password" name="password"> 
                        <?php
                            echo isset($_SESSION['PasswordError']) ? $_SESSION['PasswordError'] : "";    
                        ?>
                    </td>
                </tr>
            </table>
            <br>
            <button type="submit" name= "submit" > LOGIN </button>
            <br><br>
            <a href = "Reg.php">Create a new account</a>
        </form>
    </body>
</html>