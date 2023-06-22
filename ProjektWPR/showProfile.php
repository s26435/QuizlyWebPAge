<?php
include "header.php";
require_once "symulacjaBD.php";
if(!isset($_SESSION['username'])) echo "Niezalogowano";
else{
    echo "<p>Username: ".$_SESSION['username']."</p>";
    echo "<p>Punkty: ".$_SESSION['points']."</p>";
    echo "<p>Typ konta: ".$_SESSION['acctype']."</p>";
    if($_SESSION['acctype']=='a'){
        ?>
        <a href="adminAddQuiz.php">Dodawanie Zwykłaego Quizu</a>
        <a href="adminAddMultipleQuizz.php">Dodawanie Multiple Quizu</a>
        <?php
    }
}
include "footer.php";