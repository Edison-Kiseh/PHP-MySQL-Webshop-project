<?php
    session_start();

    $user =  'Webuser';
    $password = 'Lab2021';
    $database = 'tenflixDB';
    $host = 'localhost';

    $link = mysqli_connect($host, $user, $password) or die("Error: no connection can be made to $host");

    mysqli_select_db($link, $database) or die("Error: the database could not be opened");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
    </head>

    <body>

        <?php
        //check for the user rights
            $username = $_SESSION['username'];
            $query = "SELECT permissions FROM customer WHERE username = '$username'" or die("Error fetching username from database");
            $result = mysqli_query($link, $query) or die('Error: there has been an error executing the query');
            
            $permissions = mysqli_num_rows($result);

            if($permissions == "registered user"){
                header("Location: ./home.php#container1?action=registeredUser");
            }
            
        ?>
    </body>
</html>