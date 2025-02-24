<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        header("Location: ../View/Deshboard.php");
        exit();
    }
    else{
        session_destroy();
    }
?>

<!Doctype html>
<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        <form method ="post" action = "../Controller/Reg.php">
        Registration
            <table>
                <tr>
                    <th> Name : </th>
                    <td> <input type = "text" id = "name" name = "name" ></td>
                </tr>
                <tr>
                    <th> Email : </th>
                    <td> <input type = "text" id = "email" name = "email" ></td>
                </tr>
                <tr>
                    <th> Password : </th>
                    <td> <input type = "password" id="password" name="password"> </td>
                </tr>
            </table>
            <br>
            <button type="submit" name= "submit" > Registration </button>
            <br><br>
            <a href = "Login.php">Login</a>
        <form>
    </body>
</html>