<?php
include "header.php";
?>
<div class="kloc">
<?php
echo "<h1>Koniec kłizu</h1>";
echo "Zdobyte punkty: ". $_SESSION['points'];
$_COOKIE['points'] = $_COOKIE['points'] + $_SESSION['points'];
unset($_SESSION['points']);
unset($_SESSION['iterator']);
setcookie("quiz.txt",1,time() + (24 * 60 * 60));
?>
</div>
<?php
include "footer.php";
