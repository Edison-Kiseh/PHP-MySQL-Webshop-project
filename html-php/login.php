<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="../css/style.css" rel="stylesheet"/>
        <link href="../css/reset.css" rel="stylesheet"/>
        <link href="../css/login.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script>
            function check()//To make sure that the form has been filled
            {
                var username = document.getElementById('user').value;
                var password = document.getElementById('pass').value;

                if(username == "" || password == "")
                {
                    if(username == "")
                    {
                        document.getElementById("user").placeholder = "This field is required!"
                    }
                    if(password == "")
                    {
                        document.getElementById("pass").placeholder = "This field is required!"
                    }
                    
                return false;
                }

                return true;

            }
            </script>
    </head>

    <body style="background-color: #041d2f;">
        <div class="content">
            <img src="../images/cancel_icon.png" alt="cancel" class="cancel"/>
            <h1>Sign in</h1>
            <p>No account? <a href="./signup.php">Sign up now!</a></p>
            <?php 
                if(isset($_GET['action'])){
                    if($_GET['action'] == "not_found"){
                        echo("This user doesn't exist, create an account first.");
                    }
                }
            ?>

            <form action="./loginProcess.php" method="post" onsubmit="return check()">
                <div class="fields">
                    <span><i>Username</i></span><br/>
                    <input type="text" name="username" placeholder="Account username" id="user"/>
                </div>

                <div class="fields">
                    <span><i>Password</i></span><br/>
                    <input type="password" name="password" placeholder="Your password" id="pass"/>
                </div>

                <input type="submit" name="login" value="Login" class="login"/>
            </form>
        </div>
    </body>
</html>