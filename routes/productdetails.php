<?php
    require_once 'connection.php';
    @$id = $_GET["id"];

    $prodName;
    $prodDescription;
    $prodImageUrl;

    $result = $conn->query("SELECT * FROM products WHERE id=$id");

    while($row = mysqli_fetch_array($result)){
        $prodName = $row['nazwa'];
        $prodDescription = $row['opis'];
        $prodImageUrl = $row['url_obrazu'];
    }
?>

<?php
    echo "<center><h1>$prodName</h1></center>";
    echo "<center><h1>$prodDescription</h1></center>";
    echo "<img src=$prodImageUrl>";
?>
    

<style>
img{
    border: 5px solid black;
    border-radius: 15px;
    height: 25vh;
    width: 25vh;
}
h1{
    color: white;
    font-size: xx-large;
    font-weight: bolder;
}
</style>