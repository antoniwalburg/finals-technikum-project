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
    echo  "<form method='POST'>";
    echo "<center><p><input type='text' name='edit'/></p></center>";
    echo "<center><p><input type='submit' value='Edytuj Opis' name='sub'/></p></center>";
    echo  "</form>";
    echo "<img src=$prodImageUrl>";

    if(isset($_POST['edit']) and !empty($_POST['edit']) and isset($_POST['sub'])){
        $desc = $_POST['edit'];
        $result = $conn->query("UPDATE products set opis = '$desc' WHERE id = '$id'");
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>
    

<style>
img{
    margin-top: 5vh;
    border: 5px solid black;
    border-radius: 15px;
    height: 25vh;
    width: 25vh;
}
img:hover {
    transition: transform .2s;
    transform: scale(1.2);
}
h1{
    color: white;
    font-size: xx-large;
    font-weight: bolder;
}
</style>