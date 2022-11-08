<?php
    require_once 'connection.php';
?>

<section class="container">
    <form action="" method="POST">
        <center><h2>ZAREJESTRUJ</h2></center>
            <p>Imie i nazwisko </p>
            <p><input type="text" name="name"/></p>
            <p>Login </p>
            <p><input type="text" name="log"/></p>
            <p>Hasło </p>
            <p><input type="password" name="pwd"/></p>
            <p>Kontakt </p>
            <p><input type="text" name="description"></input></p>
            <center><p><input type="submit" value="Zarejestruj" name="sub"/></p></center>
    </form>
</section>
<?php

// Create connection


if(isset($_POST['name']) && 
isset($_POST['log']) && 
isset($_POST['pwd']) &&
isset($_POST['description']) &&
isset($_POST['sub'])){
    $name = $_POST['name'];
    $login = $_POST['log'];
    $pwd = $_POST['pwd'];
    $desc = $_POST['description'];
// Check connection
if ($conn->connect_error) {
	die("Connection failed: "
		. $conn->connect_error);
}

$sql = "INSERT INTO register VALUES
	('','$name', '$login', '$pwd', '$desc')";

if ($conn->query($sql) === TRUE) {
    echo "<h3> Your account has been created.
    Now you can log in! </h3>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>

