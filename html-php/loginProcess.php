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
            if(isset($_POST['login']) && !empty($_POST['password']) && !empty($_POST['username'])){
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);

                //search to see if the username exists
                $query = "SELECT * FROM customer WHERE username = '$username'" or die("Error fetching username from database");
                $result = mysqli_query($link, $query) or die('Error: there has been an error executing the query');
                $user = mysqli_num_rows($result);
                
                if($user){
                    $query2 = "SELECT password FROM customer WHERE username = '$username'" or die("Error fetching password from database");
                    $result2 = mysqli_query($link, $query2) or die('Error: there has been an error executing the query');
                    $password_result = mysqli_num_rows($result2);

                    $password_match = password_verify($password, $password_result);

                    if($password_match){
                        session_start();
                        $_SESSION['username'] = $username;
                        echo("The user has successfully been signed in");
                    }
                   // else{
                        
                    //}
                }
                /*$numberOfRows = mysqli_num_rows($result);
    
                if($numberOfRows != 0 && $result2 != NULL){
                    while($row = mysqli_fetch_array($result)){
                        session_start();
                        $_SESSION['name'] = $username;
                        echo("The user has successfully been signed in");
                    }
                }*/
                else{
                    header("Location: ./login.php?action=not_found");
                }
            }
            /*else{
                header("Location: ./login.php");
            }*/

            mysqli_close($link);
        ?>
    </body>
</html>