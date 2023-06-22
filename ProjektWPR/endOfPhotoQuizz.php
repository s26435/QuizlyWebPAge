<?php
include "header.php";
$_COOKIE['points'] = $_COOKIE['points'] + 10;
?>
<div class="kloc">
    <h1>Dobrze!</h1>
    <p>Zdobywasz 10 punktów!</p>
</div>
<?php
setcookie('photoQuiz',1,time()+(3600*24));
include "footer.php";