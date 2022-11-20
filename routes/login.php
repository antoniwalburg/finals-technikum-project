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
        <h2></h2>
        <center><p><input type="submit" value="Zaloguj" name="sub"/>
        <input type="submit" value="Wyloguj" name="out"/>
        <p><input type="submit" value="Zapomniałem hasła" name="fp"/>
    </p></center>
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
$result = $conn->query("SELECT pwd,name FROM register WHERE
log = '$loginLog'");
while($r = mysqli_fetch_object($result)){
    $pwdEnc = $r->pwd;
    $nameMessage = $r->name;
}

if(@password_verify($passwordLog,$pwdEnc)){
    echo "<h3> Loged in as ". $nameMessage ."</h3>";
    $resultNext = $conn->query("SELECT id,name,log,description FROM register WHERE log = '$loginLog'");
    while ($r = mysqli_fetch_object($resultNext)) {
        $name = $r->name;
        $log = $r->log;
        $description = $r->description;
        $id = $r->id;
        }
        $_SESSION["nameSession"] = $name;
        $_SESSION["loginSession"] = $log;
        $_SESSION["contactSession"] = $description;
        $_SESSION["userId"] = $id;
        $_SESSION["status"] = 'True';

    }
else {
    @$_SESSION["status"] = 'False';
    echo "<h3> Incorrect password or login  </h3>";
    unset($_SESSION['nameSession']);
    unset($_SESSION['loginSession']);
    unset($_SESSION['contactSession']);
        }
}
function logOutMessageError(){
    echo "<h3> Please log in first to log out</h3>";
}
function logOutMessage($userName){
    echo "<h3> Wylogowano użytkownika ".$userName."</h3>";
}
if(isset($_POST['out']) && !empty($_SESSION['loginSession'])){
    logOutMessage(@$_SESSION["nameSession"]);
    @$_SESSION["status"] = 'False';
    unset($_SESSION['nameSession']);
    unset($_SESSION['loginSession']);
    unset($_SESSION['contactSession']);
} elseif (isset($_POST['out']) && empty($_SESSION['loginSession'])){
    logOutMessageError();
}
if(isset($_POST['fp']) && $_SESSION["status"] == 'False'){
    header("Location: strona.php?page=./routes/passwordRecover");
} elseif (isset($_POST['fp']) && $_SESSION["status"] == 'True') {
    echo "<h3> You have to log out first </h3>";
}
?>

