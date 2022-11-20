<?php
// Start the session
session_start();
?>
<?php
    require_once 'connection.php';
?>
<section class="container">
    <form action="" method="POST">
            <center><h2>PODAJ KOD WERYFIKACYJNY</h2></center>
            <p><input type="text" name="code"/></p>
        <h2></h2>
        <center><p><input type="submit" value="Wyślij kod" name="sub"/></p></center>
    </form>
</section>
<?php
    if(isset($_POST['code']) && isset($_POST['sub'])
    && $_POST['code'] ==  $_SESSION["codeEmail"]){
        $codeEmail = $_SESSION["codeEmail"];
        $email = $_SESSION["email"];
        $result = $conn->query("SELECT id,name,log,pwd,description 
        FROM register WHERE description = '$email'");
        while ($r = mysqli_fetch_object($result)) {
            $id = $r->id;
            $name = $r->name;
            $log = $r->log;
            $pwd = $r->pwd;
            $description = $r->description;
            }

            $_SESSION["nameSession"] = $name;
            $_SESSION["loginSession"] = $log;
            $_SESSION["contactSession"] = $description;
            $_SESSION["userId"] = $id;
            $_SESSION["status"] = 'True';

            echo "<h3> Zalogowano użytkownika: ". $log ."</h3>";
            header("Location: strona.php?page=./routes/account");
    } 
    elseif (isset($_POST['code']) && isset($_POST['sub'])
    && $_POST['code'] != $_SESSION["codeEmail"]) {
        echo "<h3> Enter correct 6-digit code from your email </h3>";
    }
?>