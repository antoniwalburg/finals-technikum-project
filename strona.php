<?php
    @$page = $_GET["page"];
    if($page == ""){
        $page = "./routes/home";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Layout</title>
    <link rel="stylesheet" href="style.css">
</head>
  
<body>
      
    <!-- Header Section -->
    <header>
        <div class="head">Pogoń Szczecin Gadgets

        </div>
    </header>
      
    <!-- Menu Navigation Bar -->
    <nav class="menu">
        <a href="strona.php?page=./routes/home">Home</a>
        <a href="#news">Create Gadgets</a>
        <a href="#gadgets">Gadgets Shop</a>
        <div class="menu-log">
        <a href="strona.php?page=./routes/login">Login</a>
        </div>
        <div class="menu-reg">
        <a href="strona.php?page=./routes/reg">Register</a>
        </div>
      </nav>
      
    <!-- Body section -->
    <main class = "body_sec">
        <section id="Content">
            <article class="right">
            <?php
                include($page.".php");
            ?>
            </article>
            <article class="left">
            <?php
            // Start the session
                @session_start();
                echo "<div class='text'>". 
                "<a> User information </a>". "<br>" 
                ."Name: ".$_SESSION["nameSesion"]. "<br>"
                ."Login: ".$_SESSION["loginSession"]. "<br>"
                ."Password: ".$_SESSION["passwordSession"]. "<br>"
                ."Contact: ".$_SESSION["contactSession"];
                "</div>";
            ?>
            </article>
        </section>
      </main>
      
    <!-- Footer Section -->
    <footer>Made By Antoni Walburg</footer>
</body>
</html>