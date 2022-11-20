<?php
// Start the session
session_start();
?>
<?php
    require_once 'connection.php';
?>
<section class="container">
    <form action="" method="POST">
            <center><h2>PODAJ ADRES E-MAIL</h2></center>
            <p><input type="text" name="ef"/></p>
        <h2></h2>
        <center><p><input type="submit" value="Wyślij nowe hasło" name="sub"/></p></center>
    </form>
</section>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['ef']) && isset($_POST['sub'])){

    $code = random_int(100000, 999999);
    $_SESSION["codeEmail"] = $code;

    $adressEmailName = $_POST['ef'];
    $email = $_POST['ef'];
    $_SESSION["email"] = $email;
    $mainMsg = "Password Recovery";
    $msg = "Your code: ". $code;

    // SMTP
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'antek.walburg1989@gmail.com'; // Your gmail
    $mail->Password = 'nzkbiwvmexczwjuz'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('antek.walburg1989@gmail.com'); // Your gmail
    $mail->addAddress($_POST["ef"]);
    
    $mail->isHTML(true);

    $mail->Subject = $mainMsg;
    $mail->Body = wordwrap($msg);
    $mail->send();
    
    // REST
    if(isset($_POST['sub'])){
        header("Location: strona.php?page=./routes/code");
    }

}
?>