<?php
// Start the session
session_start();
?>
<?php
    echo "<div class='shop'>".
    "Nazwa gadżetu: ".@$_SESSION["nameGadget"]. "<br>".
    "Opis gadżetu: ".@$_SESSION["descGadget"]. "<br>".
    "Link gadżetu: ".@$_SESSION["linkGadget"]. "<br>".
    "</div>";

?>