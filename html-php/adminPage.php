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
        <title>Admin page</title>
        <link href="../css/reset.css" rel="stylesheet"/>
        <link href="../css/contact.css" rel="stylesheet"/>
        <link href="../css/style.css" rel="stylesheet"/>
        <link href="../css/footer.css" rel="stylesheet"/>
        <link href="../css/adminPage.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="page">
            <div class="container-trui" id="header-parent-container">
                <div class="container" id="header-container">
                    <div col="6" class="left-side">
                        <a href="./index.php"><img src="../images/tenflix-white.png" alt="logo" class="logo"/></a>
                        <ul>
                            <a href="./home.html"><li>Shop</li></a>
                            <a href="#"><li>Contact</li></a>
                        </ul>
                    </div>
        
                    <div col="6" class="right-side">
                        <a href="./login.html" class="login"><button class="button-login">login</button></a>
                    </div>
                </div>
            </div>
    
            <div class="container">
                <h1>Administrator page</h1>
    
                    <!--<fieldset>
                        <legend>Add or remove users</legend>
                        <label for="user">Enter user first name or last name:</label><br/>
                        <input type="text" id="user" name="name" /><br/>
                        
                        <input type="submit" name="addUser" value="Add user"/>
                        <input type="submit" name="deleteUser" value="Delete user"/>
                        
                    </fieldset>

                    <fieldset>
                        <legend>Modify user rights</legend>
                        <label for="userMod">Enter user first name or last name:</label><br/>
                        <input type="text" id="userMod" name="userMod" />

                        <p>Which privileges do want to give the user</p>
                        <div>
                            <input type="submit" name="adminRights" value="Admin rights"/>
                            <input type="submit" name="normalUser" value="Normal user"/>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Add, delete or modify products</legend>
                        <label for="products">Enter the name of the product:</label><br/>
                        <input type="text" id="prodMod" name="prodMod" />

                        <p>Do you want to:</p>
                        <div>
                            <input type="submit" name="addProduct" value="Add product"/>
                            <input type="submit" name="delProduct" value="Delete product"/>
                            <input type="submit" name="modProduct" value="Modify product"/>
                        </div>
                    </fieldset>-->
                
            </div>

            <?php
                if(isset($_POST['addUser']) || isset($_POST['deleteUser'])){
                    if(isset($_POST['name'])){
                        $name = htmlspecialchars($_POST['name']);

                        $query = "SELECT * FROM customer WHERE name = $name" or die("Error: There was an error executing the query");

                        $result = mysqli_query($link, $query) or die('Error: there has been an error executing the query');

                        $row = mysqli_num_rows($result);


                    }
                    else{
                        echo("Please enter a name first");
                    }
                }
            ?>

            
            <footer id="container-trui">
                <div id="container">
                    <div class="web-logo">
                        <img src="../images/tenflix-white.png" alt="web logo" width="120px"/>
                    </div>
    
                    <div class="text">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>
        
                    <div>
                        <div class="links">
                            <a href="./terms.html">Terms</a>
                            <a href="./privacy.html">Privacy</a>
                            <a href="#">Contact</a>
                        </div>
                        
                    </div>
        
                    <div class="social-media-links">
                        <div class="social-media-logos">
                            <div><a href="https://www.facebook.com/edison.kiseh" target="_blank"><img src="../images/facebook_icon_white.png" alt="facebook logo"></a></div>
                            <div><a href="https://www.instagram.com/the_awesome_lord/" target="_blank"><img src="../images/instagram_icon_white.png" alt="instagram logo"></a></div>
                            <div><a href="mailto::r0937121@student.thomasmore.be" target="_blank"><img src="../images/email_icon_white.png" alt="email icon"></a></div>
                            <div><a href="https://www.linkedin.com/in/edison-kiseh-392731271" target="_blank"><img src="../images/linkedin_icon_white.png" alt="linked-in"></a></div>
                        </div>
                    </div>
    
                    <div>
                        <div class="copyright" style="font-size: 12px;">Copyright &copy; Thomas More Mechelen-Antwerp vzw - Campus De Nayer - Professional bachelor electronics-ict - 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>