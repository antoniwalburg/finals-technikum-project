<?php
// Start the session
session_start();
?>
<?php
    require_once 'connection.php';
?>
<section class="container">
    <form action="" method="POST">
            <center><h2>ZALOGUJ</h2></center>
            <p>Login </p>
            <p><input type="text" name="log"/></p>
            <p>Hasło </p>
        <p><input type="password" name="pwd"/></p>
        <center><p><input type="submit" value="Zaloguj" name="sub"/></p></center>
    </form>
</section>
<?php
if(isset($_POST['log']) && 
isset($_POST['pwd']) && 
isset($_POST['sub'])){
    $loginLog = $_POST['log'];
    $passwordLog = $_POST['pwd'];

if ($conn->connect_error) {
	die("Connection failed: "
		. $conn->connect_error);
}
$result = $conn->query("SELECT log,pwd FROM register WHERE
 log = '$loginLog' and pwd = '$passwordLog'");
if($result->num_rows == 0) {
     echo "<h3> Incorrect password or login  </h3>";
} else {
    echo "<h3> Loged in! </h3>";
    $result = $conn->query("SELECT name,log,pwd,description 
FROM register WHERE log = '$loginLog' AND pwd = '$passwordLog'");
    while ($r = mysqli_fetch_object($result)) {
        $name = $r->name;
        $log = $r->log;
        $pwd = $r->pwd;
        $description = $r->description;
    }
    $_SESSION["nameSesion"] = $name;
    $_SESSION["loginSession"] = $log;
    $_SESSION["passwordSession"] = $pwd;
    $_SESSION["contactSession"] = $description;
    
}
}
?>

