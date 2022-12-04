<?php
// Start the session
session_start();

require_once 'connection.php';
?>
<section class="container">
    <form action="" method="POST">
        <center><h2>DODAJ GADŻET DO SKLEPU</h2></center>
        <p> Nazwa </p>
        <p><input type="text" name="prodName"/></p>
        <p> Opis </p>
        <p><input type="text" name="description"/></p>
        <p> Link </p>
        <p><input type="text" name="imageUrl"/></p>
        <h2></h2>
        <center>
        <p><input type="submit" value="Dodaj gadżet" name="sub"/>
        </p></center>
    </form>
</section>
<?php

$regex = "(https?:\/\/.*\.(?:png|jpg))";

if(isset($_POST['prodName']) && isset($_POST['description']) && isset($_POST['imageUrl']) && isset($_POST['sub'])){
    $name = $_POST['prodName'];
    $description = $_POST['description'];
    $imageUrl = $_POST['imageUrl'];
    if(!empty($name) && !empty($description) && !empty($imageUrl) && (preg_match($regex, strval($imageUrl)) == 1)){
        // zapytanie do bazy danych, które wstawi nowy produkt
        $sql = "INSERT INTO products(id, nazwa, opis, url_obrazu)
        VALUES (NULL, '$name', '$description', '$imageUrl')";
        if($result = mysqli_query($conn, $sql)) echo "Dodano $name";
    } 
    elseif(!isset($_POST['sub']) && empty($name) || empty($description) || empty($imageUrl)){
        echo "<h3> Podaj poprawne dane produktu </h3>";
    }
}
?>