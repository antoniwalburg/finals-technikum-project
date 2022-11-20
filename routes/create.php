<?php
// Start the session
session_start();
?>
<section class="container">
    <form action="" method="POST">
        <center><h2>DODAJ GADŻET DO SKLEPU</h2></center>
        <p> Nazwa </p>
        <p><input type="text" name="name"/></p>
        <p> Opis </p>
        <p><input type="text" name="desc"/></p>
        <p> Link </p>
        <p><input type="text" name="link"/></p>
        <h2></h2>
        <center>
        <p><input type="submit" value="Dodaj gadżet" name="sub"/>
        </p></center>
    </form>
</section>
<?php
    if(isset($_POST['sub']) && isset($_POST['name'])
    && isset($_POST['desc']) && isset($_POST['link'])){
        $nameGadget = $_POST['name'];
        $descGadget = $_POST['desc'];
        $linkGadget = $_POST['link'];
        if(!empty($nameGadget) && !empty($descGadget)
        && !empty($linkGadget)){

        $_SESSION["nameGadget"] = $nameGadget;
        $_SESSION["descGadget"] = $descGadget;
        $_SESSION["linkGadget"] = $linkGadget;

        echo "<h3> Pomyślnie dodano gadżet do skelpu </h3>";
        } else {
            echo "<h3> Podaj poprawne dane gadżetu </h3>";
        }
    }
?>