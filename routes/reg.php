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
            <p>Powtórz Hasło </p>
            <p><input type="password" name="pwd-repeat"/></p>
            <p>E-mail </p>
            <p><input type="text" name="description"></input></p>
            <center><p><input type="submit" value="Zarejestruj" name="sub"/></p></center>
    </form>
</section>
<?php

if(isset($_POST['name']) && 
isset($_POST['log']) && 
isset($_POST['pwd']) &&
isset($_POST['description']) &&
isset($_POST['sub'])){
    $name = $_POST['name'];
    $login = $_POST['log'];
    $pwd = password_hash($_POST['pwd'],PASSWORD_DEFAULT);
    $desc = $_POST['description'];
// Check connection
if ($conn->connect_error) {
	die("Connection failed: "
		. $conn->connect_error);
}
function notEmpty($funname,$funlogin,$funpwd,$fundesc){
    if (! empty($funname and $funlogin and $funpwd and $fundesc)){
        return TRUE;
    } else{
    return FALSE;
    }
}
function errorMessagePassword() {
    echo " <h3> Incorrect Password </h3> ";
}
function errorMessage() {
    echo " <h3> Please fill correct user data </h3> ";
}
function successMessage($userName) {
    echo "<h3> Welcome ". $userName .". Your account has been created.
        Now you can log in! </h3>";
}
$emptyCheck = notEmpty($name,$login,$pwd,$desc);

$result = $conn->query("SELECT log FROM register WHERE
 log = '$login'");

$resultNext = $conn->query("SELECT description FROM register WHERE
description = '$desc'");

if($result->num_rows == 0 and $resultNext->num_rows == 0) {

    if ($emptyCheck && ($_POST['pwd'] == $_POST['pwd-repeat']) && filter_var($desc, FILTER_VALIDATE_EMAIL)){
    $sql = "INSERT INTO register VALUES('','$name', '$login', '$pwd', '$desc')";
    if ($conn->query($sql)) {
        successMessage($name);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
} 
elseif ($emptyCheck && ($_POST['pwd'] != $_POST['pwd-repeat']) && filter_var($desc, FILTER_VALIDATE_EMAIL)){
    errorMessagePassword();
}
  else {
    errorMessage();
    } 
} else {
    errorMessage();
    } 
}
?>

