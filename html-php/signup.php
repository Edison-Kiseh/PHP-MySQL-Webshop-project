<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="../css/style.css" rel="stylesheet"/>
        <link href="../css/reset.css" rel="stylesheet"/>
        <link href="../css/signup.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
        <script>
            function checkPassword(){
                var password1 = document.getElementById('pass').value;
                var password2 = document.getElementById('pass2').value;

                if(password1 == password2){
                    return 1;
                }
                else{
                    return 0;
                }
            }

            function check()//To make sure that the form has been filled
            {
                var username = document.getElementById('user').value;
                var email = document.getElementById('email').value;
                var password1 = document.getElementById('pass').value;
                var password2 = document.getElementById('pass2').value;
                var fieldCheck = 0;

               if(username == "" || email == "" || password1 == "" || password2 == "")
                {
                    if(username == "")
                    {
                        document.getElementById("user").placeholder = "This field is required!"
                    }
                    else
                    {
                        document.getElementById("user").placeholder = ""
                        fieldCheck++;
                    }

                    if(email == "")
                    {
                        document.getElementById("email").placeholder = "This field is required!"
                    }
                    else
                    {
                        document.getElementById("email").placeholder = ""
                        fieldCheck++;
                    }
                    
                    if(password1 == "")
                    {
                        document.getElementById("pass").placeholder = "This field is required!"
                    }
                    else
                    {
                        document.getElementById("pass2").placeholder = ""
                        fieldCheck++;
                    }

                    if(password2 == "")
                    {
                        document.getElementById("pass2").placeholder = "This field is required!"
                    }
                    else
                    {
                        document.getElementById("pass2").placeholder = ""
                        fieldCheck++;
                    }
                    
                    return false;
                }

                return true;
                /*passCheck = checkPassword();

                if(fieldCheck == 4 && passCheck == 1){
                    return true;
                }
                else{
                    return false;
                }*/
            }
            </script>
    </head>

    <body style="background-color: #041d2f;">
        <div class="content">
            <h1>Sign up</h1>
            <?php
            //message to display if the user already exists
                if(isset($_GET['action'])){
                    if($_GET['action'] == "found"){
                        echo("The user already exists, login instead.");
                    }
                }
            ?>

            <form action="./signupProcess.php" method="post" onsubmit="return check()">
                <div class="fields">
                    <span><i>Username</i></span><br/>
                    <input type="text" name="username" placeholder="Your username" id="user"/>
                </div>

                <div class="fields">
                    <span><i>Email</i></span><br/>
                    <input type="email" name="email" placeholder="Your email" id="email"/>
                </div>

                <div class="fields">
                    <span><i>Password</i></span><br/>
                    <input type="password" name="password" placeholder="Your password" id="pass"/>
                </div>

                <div class="fields">
                    <span><i>Password confirmation</i></span><br/>
                    <input type="password" name="password2" placeholder="Repeat your password" id="pass2"/>
                </div>

                <input type="submit" name="register" value="Register" class="register"/>
            </form>
            <p style="text-align: center;">Already have an account?<a href="./login.php"> Sign in!</a></p>
        </div>
    </body>
</html>