<?php
    require_once 'connection.php';
?>

<center><h1>Dostępne gadżety</h1></center>
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
        
        $productDetailsPath = "index.php?page=./routes/productdetails&id=$id";

        echo "
        <section class = $item>
            <p> $nazwa </p>
            <img src=$url_obrazu>
            <a href=$productDetailsPath class=$button>Szczegóły produktu</a>
        </section>
        ";

	}
?>


</section>
</section>

<style>
center{
    padding-top: 10px;
}
  a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: blue;
}

.container > * {
    display: inline-block;
    /* max-height: 200px;
    height: calc(100%-10px);; */
    /* display:flex;
    flex-wrap:wrap; */
}

.wrap{
  height: 66vh;
  width: 80%;
  max-width:100%;
  max-height:50vh;

  overflow: -moz-scrollbars-vertical; 
  overflow-y: scroll;
  text-align: center;

  border: 1px solid black;
}

/* Style itemów */

.item {
  margin: 50px;
  position: relative;
  height: 100px;
  width: 100px;
    
}

.item img {
  width: 100%;
  height: auto;
}

.item .btn {
  position: absolute;
  top: 180%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #001E6C;
  color: white;
  font-size: 16px;
  padding: 6px 12px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}

.item .btn:hover {
  background-color:#E8630A; 
}

</style>