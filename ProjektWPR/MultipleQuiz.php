<?php
include "header.php";

class MultipleQuestion{

    private $text;
    private $correctAnswer;

    /**
     * @param $text
     * @param $correctAnswer
     */
    public function __construct($text, $correctAnswer)
    {
        $this->text = $text;
        $this->correctAnswer = $correctAnswer;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getCorrectAnswer()
    {
        return $this->correctAnswer;
    }



}
function getMQuestionsFromFile()
{
    $quest = [];
    $plik = fopen("Daily\MultipleQuiz\multipleQuiz.txt", 'r');
    if ($plik) {
        for ($i = 0; $i < 3; $i++) {
            $teqzd = fgets($plik);
            $trueOdp = trim(fgets($plik));
            $quest[$i] = new MultipleQuestion($teqzd,$trueOdp);
        }
    }
    fclose($plik);
    return $quest;
}

echo "<div class=\"kloc\">";
$questions = getMQuestionsFromFile();
if(!isset($_SESSION['iterator'])) $_SESSION['iterator']=0;
if(!isset($_SESSION['points'])) $_SESSION['points']=0;


if(isset($_COOKIE['quiz.txt'])){
    echo "Już dzisiaj rozwiązłeś zwykły Quiz.<br> Poczekaj albo spróbuj inne quizy. <br>";
    $czas_wygasniecia = $_COOKIE['quiz.txt'] - time();
    echo "Pozostały czas do następnego quizu: " . gmdate("H:i:s", $czas_wygasniecia);
} else if(isset($_POST['submit'])){
    if(isset($_POST['odp'])){
        if(strtolower($_POST['odp'])==strtolower($questions[$_SESSION['iterator']]->getCorrectAnswer()))$_SESSION['points']+=5;
        else $_SESSION['points']--;
        $_SESSION['iterator']++;
    }
    if(!isset($questions[$_SESSION['iterator']])){
        header("Location: endOfQuizz.php");
    }
    echo "<h1>".$questions[$_SESSION['iterator']]->getText()."</h1>"
    ?>
    <form method="post" action="">
        <div class="mb-3">
            <input type="text" class="form-control marign_top half" id="formGroupExampleInput" placeholder="Odpowiedź" name="odp">
        </div>
        <div class="marign_top"><input type="submit" class="btn btn-primary" name="submit" value="Zatwierdź"></div>
    </form>
    <?php
    echo "Your points: " . $_SESSION['points'];
}else{
    ?>
    <form method="POST" action="">
        <h3>Quiz Otwarty</h3>
        <p>
            Po naciśnięciu prycisku "Zacznij" wyświetlą ci sie 3 pytania otwarte.<br>
            Za każdą dobrą odpowiedź dostaniesz 5punktów ale za każdą błędną odejmiemy ci jeden punkt.
        </p>
        <input class="btn btn-primary margin_top" type="submit" name="submit" value="ZACZNIJ">
    </form>
    <?php
}
echo "</div>";
include "footer.php";
?>

