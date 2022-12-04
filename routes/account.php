<?php
// Start the session
session_start();
?>
<?php
    require_once 'connection.php';
?>
<?php
if(!empty($_SESSION['loginSession'])){
echo "<section class='container'>".
    "<form action='' method='POST'>".
        "<center><h2>WITAJ ".@strtoupper($_SESSION["nameSession"])."</h2></center>".
            "<p> Edytuj Login </p>".
            "<p><input type='text' name='log'/></p>".
            "<p> Edytuj Hasło </p>".
        "<p><input type='password' name='pwd'/></p>".
        "<h2></h2>".
        "<center><p><input type='submit' value='Edytuj Dane' name='sub'/></p></center>".
    "</form>".
"</section>";
function message(){
    echo "<h2> User Data Changed Successfully </h2>".
    "<h2> You can log in now to your updated account! </h2>";
}
function errorMessage(){
    echo "<h2> Incorrect password or login </h2>";
}
    if(isset($_POST["log"]) && isset($_POST["pwd"])
    && isset($_POST["sub"]) && !empty($_POST["log"])
    && !empty($_POST["pwd"])){
        $userId = $_SESSION["userId"];
        $accountLogin = $_POST["log"];

        $resultLog = $conn->query("SELECT log FROM register WHERE
        log = '$accountLogin'");

        if ($resultLog->num_rows == 0){

            $accountPassword = password_hash($_POST["pwd"],PASSWORD_DEFAULT);
            $result = $conn->query("UPDATE register set log = '$accountLogin',
            pwd = '$accountPassword' WHERE id = '$userId'");
            message();
            $_SESSION["status"] = 'False';
            unset($_SESSION['nameSession']);
            unset($_SESSION['loginSession']);
            unset($_SESSION['contactSession']);
        } else {
            errorMessage();
        }
    } elseif(isset($_POST["sub"]) 
        && (empty($_POST["log"]) || empty($_POST["pwd"]))) {
        @errorMessage();
    }
} else{
    echo "<section class='container'>".
    "<h2> Please Log In First To Enter This Section </h2>".
    "</section>";
}
?>