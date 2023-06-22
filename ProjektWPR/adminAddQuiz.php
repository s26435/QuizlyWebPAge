<?php
include "header.php";
?>
<form method="post" action="">
    <?php
    for ($i = 0; $i < 5; $i++){
        echo "<p>Quiz Nr.".$i."</p>"
    ?>
    <label><input type="text" name="text<?php echo $i?>">Text field</label><br>
    <label><input type="text" name="A<?php echo $i?>">A field</label><br>
    <label><input type="text" name="B<?php echo $i?>">B field</label><br>
    <label><input type="text" name="C<?php echo $i?>">C field</label><br>
    <label><input type="text" name="Correct<?php echo $i?>">Correct Answer Field</label><br><br>
    <?php }
    ?>
    <input type="submit" name="submit">
</form>
<?php

if(isset($_POST['submit'])){
    file_put_contents("Daily/Quiz/quiz.txt", "");
    $pliczek = fopen("Daily/Quiz/quiz.txt",'w');
    for($i = 0; $i < 5; $i++) {
        fwrite($pliczek,$_POST['text' . $i]."\n");
        fwrite($pliczek,$_POST['A' . $i]."\n");
        fwrite($pliczek,$_POST['B' . $i]."\n");
        fwrite($pliczek,$_POST['C' . $i]."\n");
        fwrite($pliczek,$_POST['Correct' . $i]."\n");
    }
    echo "Pomyslnie dodano quiz!";
}
include "footer.php";