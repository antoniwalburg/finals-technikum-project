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
        <a href="#news">News</a>
        <a href="#gadgets">Gadgets</a>
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
                <h1> Main Page Navbar</h1>
            </article>
        </section>
      </main>
      
    <!-- Footer Section -->
    <footer>Made By Antoni Walburg</footer>
</body>
</html>