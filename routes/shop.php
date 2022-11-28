<?php
    require_once 'connection.php';
?>

<center><h1>Dostępne gadżety Pogoni Szczecin</h1></center>
<section class ="wrap">
<section class="container">

<?php
    // zmienne do itemu
    $item = "item";
    $image = "image";
    $button = "btn";
    // query, które wyświetli obecne produkty, które znajdują się w bazie
    $query = "SELECT * FROM products";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result)){
        $nazwa = $row['nazwa'];
        $url_obrazu = $row['url_obrazu'];
        $id = $row['id'];
        
        $productDetailsPath = "strona.php?page=./routes/productdetails&id=$id";

        echo "
        <section class = $item>
            <p> $nazwa </p>
            <img src=$url_obrazu>
            <a href=$productDetailsPath class=$button>INFORMACJE</a>
            </section>";

	}
?>


</section>
</section>

<style>

h1{
  color: white;
  font-size: xx-large;
}

.container > * {
    display: inline-block;
}

.item p{
  color: white;
  text-aligin: center;
  font-weight: bolder;
  font-size: x-large;

}
.item a{
  color: white;
  text-aligin: center;
  font-weight: bolder;
  font-size: x-large;

}

.item {
  margin: 0 50px;
  position: relative;
  height: 100px;
  width: 150px;
    
}

.item img {
  width: 100%;
  height: auto;
  border: solid 5px black;
  border-radius: 25px;
}

</style>