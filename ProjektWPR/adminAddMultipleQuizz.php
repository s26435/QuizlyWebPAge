<?php
include "header.php";
?>
    <form method="post" action="">
        <?php
        for ($i = 0; $i < 3; $i++){
            echo "<p>Quiz Nr.".$i."</p>"
            ?>
            <label><input type="text" name="text<?php echo $i?>">Text field</label><br>
            <label><input type="text" name="Correct<?php echo $i?>">Correct Answer Field</label><br><br>
        <?php }
        ?>
        <input type="submit" name="submit">
    </form>
<?php

if(isset($_POST['submit'])){
    file_put_contents("Daily/MultipleQuiz/multipleQuiz.txt", "");
    $pliczek = fopen("Daily/MultipleQuiz/multipleQuiz.txt",'w');
    for($i = 0; $i < 3; $i++) {
        fwrite($pliczek,$_POST['text' . $i]."\n");
        fwrite($pliczek,$_POST['Correct' . $i]."\n");
    }
    echo "Pomyslnie dodano quiz!";
}
include "footer.php";
