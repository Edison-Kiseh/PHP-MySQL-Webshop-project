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
        <title>Shop</title>
        <link href="../css/reset.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="../css/home.css" rel="stylesheet" />
        <link href="../css/style.css" rel="stylesheet"/>
        <link href="../css/footer.css" rel="stylesheet"/>
        <script src="../js/jquery.js"></script>

        <script>
            /*$(document).ready(function(){
                var items = new Array();

                $(".card").hover(function(){
                    $("img").fadeTo(1000, 0.5);
                });
            });*/


            var array = ["../images/movies/dune-movie-poster.jpg", "../images/movies/dead reckoning.jpg", "../images/movies/john-wick-landscape.jpg", "../images/movies/james-bond.jpg"];
            var slides;

            var i = 0;

            function load(){
                slides = document.getElementById('slideshow');
            }
            function showSlide(){
                slides.src = array[i];
                i++;
                if(i >= array.length)
                {
                    i = 0;
                }
            }
        
            function startSlideShow()
            {
            setInterval(showSlide, 3000);
            clearInterval(showSlide, 3000);
            }

            function registeredUser(){
                document.getElementById('loginLink').href = "./logout.php";
                document.getElementById('loginButton').innerHTML = "logout";

            }

            function administrator(){

            }

        </script>
    </head>

    <body onload="startSlideShow(), load()">

        <div class="container-trui" id="header-parent-container">
            <div class="container" id="header-container">
                <div col="6" class="left-side">
                    <a href="./index.php"><img src="../images/tenflix-white.png" alt="logo" class="logo"/></a>
                    <ul>
                        <a href="#"><li>Shop</li></a>
                        <a href="./contact.html"><li>Contact</li></a>
                    </ul>
                </div>
    
                <div col="6" class="right-side">
                    <a href="./adminPage.html">Admin page</a>
                    <a href="#" class="cart"><img src="../images/shopping-cart-icon.png" alt="shopping cart icon" class="shopping-cart" title="your cart"/></a>
                    <a href="./login.php" class="login" id="loginLink"><button class="button-login" id="loginButton">login</button></a> 
                    
                    <script>
                        $response = <?php
                            if(isset($_GET['action'])){
                                if($_GET['action'] == "registeredUser"){
                                    return 1;
                                }
                            }
                        ?>

                        if($response == 1){
                            registeredUser();
                        }
                        else{
                            administrator();
                        }

                    </script>

                </div>
            </div>
        </div>

        <div class="top">
            <img src="../images/movies/james-bond.jpg" alt="slideshow" id="slideshow"/>
            <a href="#container1" class="shopnow"><button>Shop now</button></a>
        </div>

        <p class="message"><span class="msg1">Browse our unique collection of movies...</span><br/><br/><br/><span class="msg2">A collection so wide that you'll never be left unentertained and all at very affrodable prices! Please feel free to explore and feast you eyes.</span></p>

        <div class="container-trui" id="parent-container">

            <!--            <select>
                <option value="all">All</option>
            </select>-->
            <div class="sortandsearch">
                <p style="color: white;">Sort by:</p>
                <div class="search">
                    <input type="text" name="search" placeholder="Search movies..."  class="search-bar"/>
                    <div class="icon"><a href="#"><img src="../images/search-icon.png" alt="search icon" class="search-icon"/></a></div>
                </div>
            </div>

            <div class="container" id="container1">
                <a href="./movieInfo/inceptionInfo.php">
                    <div class="card" col="2">
                        <?php
                            $query = "SELECT * FROM products WHERE image like '%inception%'" or die("Error: there was an error fetching the image");
                            $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                            //fetching the content
                            $row = mysqli_fetch_array($result);

                            $image = htmlspecialchars($row['image']);
                            $title = htmlspecialchars($row['productName']);
                            $price = htmlspecialchars($row['price']);

                            echo("<img src=\"$image\" id=\"img1\"/>");
                            echo("<div class=\"image-info\">");
                            echo("<p>$title</p>");
                            echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/missionImpossibleInfo.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%impossible%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/freeGuyInfo.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%free%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/interstellar.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%interstellar%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/theManFromUncleInfo.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%U.N.C.L.E%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/tenetInfo.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%tenet%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>
            </div>

            <!--Second row-->
            <div class="container" id="container2">
                <a href="./movieInfo/johnWickInfo.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%john%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/duneInfo.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%dune%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/mrAndMrsSmithInfo.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%smith%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/theTouristInfo.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%tourist%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/skyfallInfo.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%skyfall%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/theEqualizerInfo.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%equalizer%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>
            </div>

            <!--Third row-->
            <div class="container" id="container3">
                <a href="./movieInfo/theCreatorInfo.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%creator%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/sherlockHolmesInfo.php">
                <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%sherlock%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/theMatrixInfo.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%matrix%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/theDarkKnight.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%batman%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/knightAndDay.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%knight%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>

                <a href="./movieInfo/jumanjiInfo.php">
                    <div class="card" col="2">
                    <?php
                        $query = "SELECT * FROM products WHERE image like '%jum%'" or die("Error: there was an error fetching the image");
                        $result = mysqli_query($link, $query) or die("Error: the query could not be executed");

                        //fetching the content
                        $row = mysqli_fetch_array($result);

                        $image = htmlspecialchars($row['image']);
                        $title = htmlspecialchars($row['productName']);
                        $price = htmlspecialchars($row['price']);

                        echo("<img src=\"$image\" id=\"img1\"/>");
                        echo("<div class=\"image-info\">");
                        echo("<p>$title</p>");
                        echo("<p><b>$price$</b></p></div>");

                        ?>
                    </div>
                </a>
            </div>
        </div>

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
                        <a href="./contact.html">Contact</a>
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
    </body>
</html>