<?php
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
        <title>Login Process</title>
    </head>

    <body>
        <?php
            if(isset($_POST['register'])){
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                //check if user exists
                $query = "SELECT * FROM customer WHERE username = '$username'" or die("Error fetching username from database");
                $result = mysqli_query($link, $query) or die('Error: there has been an error executing the query');
                $user = mysqli_num_rows($result);

                if($user){
                    header("Location: ./signup.php?action=found");
                }
                else{
                    $insert_query = "INSERT INTO customer(username, email, password, permissions, removeCustomer) 
                    VALUES ('".$username."', '".$email."', '".$hashed_password."', 'registered user', 0)";

                    $insert_query_result = mysqli_query($link, $insert_query) or die('Error: there has been an error executing the query');

                    session_start();
                    $_SESSION['username'] = $username;

                    echo("Your account has been registered successfully");
                    
                }
            }
            /*else{
                header("Location: ./signup.html?action=login");
            }*/

            mysqli_close($link);
        ?>
    </body>
</html>