<?php
include "header.php";
echo "<div class=\"kloc\">";
class Question{
    private $text;
    private $ansA;
    private $ansB;
    private $ansC;
    private $answer;
    private $correct;
    public function __construct($text, $ansA, $ansB, $ansC, $correct)
    {
        $this->text = $text;
        $this->ansA = $ansA;
        $this->ansB = $ansB;
        $this->ansC = $ansC;
        $this->correct = $correct;
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
    public function getAnsA()
    {
        return $this->ansA;
    }

    /**
     * @return mixed
     */
    public function getAnsB()
    {
        return $this->ansB;
    }

    /**
     * @return mixed
     */
    public function getAnsC()
    {
        return $this->ansC;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @return mixed
     */
    public function getCorrect()
    {
        return $this->correct;
    }
}
function getQuestionsFromFile()
{
    $quest = [];
    $plik = fopen("Daily\Quiz\quiz.txt", 'r');
    if ($plik) {
        for ($i = 0; $i < 5; $i++) {
            $teqzd = fgets($plik);
            $odpA = fgets($plik);
            $odpB = fgets($plik);
            $odpC = fgets($plik);
            $trueOdp = trim(fgets($plik));
            $quest[$i] = new Question($teqzd,$odpA,$odpB,$odpC,$trueOdp);
        }
    }
    fclose($plik);
    return $quest;
}
$questions = getQuestionsFromFile();
if(!isset($_SESSION['iterator'])) $_SESSION['iterator']=0;
if(!isset($_SESSION['points'])) $_SESSION['points']=0;
if(isset($_COOKIE['quiz.txt'])){
    echo "Już dzisiaj rozwiązłeś zwykły Quiz.<br> Poczekaj albo spróbuj inne quizy. <br>";
    $czas_wygasniecia = $_COOKIE['quiz.txt'] - time();
    echo "Pozostały czas do następnego quizu: " . gmdate("H:i:s", $czas_wygasniecia);
} else if(isset($_POST['submit'])){
    if(isset($_POST['odp'])){
        if(strtolower($_POST['odp'])==strtolower($questions[$_SESSION['iterator']]->getCorrect()))$_SESSION['points']++;
        else $_SESSION['points']--;
        $_SESSION['iterator']++;
    }
    if(!isset($questions[$_SESSION['iterator']])){
        header("Location: endOfQuizz.php");
    }
        echo "<h1>".$questions[$_SESSION['iterator']]->getText()."</h1>"
?>
    <form method="post" action="">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="odp" id="flexRadioDefault1" value="A" checked>
        <label class="form-check-label" for="flexRadioDefault1">
           <?php echo $questions[$_SESSION['iterator']]->getAnsA()?>
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="odp" value="B" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
            <?php echo $questions[$_SESSION['iterator']]->getAnsB()?>
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="odp" value="C" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
            <?php echo $questions[$_SESSION['iterator']]->getAnsC()?>
        </label>
    </div>
        <input class="btn btn-primary margin_top" type="submit" name="submit" value="Zatwierdź">
    </form>
    <?php
    echo "Your points: " . $_SESSION['points'];
}else{
    ?>
<form method="POST" action="">
    <h3>Rozpocznij Quiz</h3>
    <p>
        Przed tobą 5 pytań na zasadach klasycznego quizu.<br>
        Za każdą poprawną odpowiedź dostaniesz punkt, ale za każdą błędną<br>
        odejmiemy jeden.
    </p>
    <input class="btn btn-primary margin_top" type="submit" name="submit" value="ZACZNIJ">
</form>
    <?php
    getQuestionsFromFile();
}
echo "</div>";
include "footer.php";