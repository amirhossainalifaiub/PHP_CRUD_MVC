<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
        session_destroy();
        header("Location: ../View/Login.php");
    }
    $user = $_SESSION['user'];
    $email = $_SESSION['Email'];


    require_once "../Model/Database.php";
    require_once "../Model/User.php";
    $userM = new UserM($con);
    $result = $userM->getAllUser();

?>

<!Doctype html>
<html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>
    <h1>Welcome, <?php echo $user; ?> <h1>
    <?php
        echo isset($_SESSION['del']) ? $_SESSION['del'] : "";    
    ?>
    <form method = "post" action = "../Controller/Dashboard.php" novalidate>
        <center>
        <?php

            if ($result->num_rows > 0) {
                echo "<table border='1' style='width:80%; text-align:left;'>";
                echo "<tr><th>Name</th><th>Email</th><th>Password</th><th>Delete</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Password']) . "</td>";
                    echo "<td>
                            <input type='hidden' name='Delete' value='" . htmlspecialchars($row['Email']) . "' />
                            <input type='submit' value='Delete' />
                        </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No Data Found</p>";
            }
            ?>
        </center>
        </form>
        <form method = "post" action = "../Controller/Logout.php" novalidate>
            <button type = "submit" name = "Logout" > Logout</button>
        </form>
    </body>
</html>