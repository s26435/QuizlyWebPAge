<?php
include "header.php";
?>
<style>

    #carouselExample{
        width: 50%;
        height: 50%;
    }
    .carousel{
        margin-left: 20px;
    }
</style>
<?php
unset($_COOKIE['photoQuiz']);
if(!isset($_COOKIE['photoQuiz'])){
if(isset($_POST['odp'])){
    if($_POST['odp']==file_get_contents("Daily/PhotoQuiz/townName.txt",true)) {
        header("Location: endOfPhotoQuizz.php");
    }
}
if(isset($_POST['submit'])){
    ?>
    <div class="kloc">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Daily/PhotoQuiz/photo_one.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Daily/PhotoQuiz/photo_two.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Daily/PhotoQuiz/photo_three.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <form method="post" action="">
        <div class="mb-3">
            <input type="text" class="form-control marign_top" id="formGroupExampleInput" placeholder="Nazwa Miasta" name="odp">
        </div>
       <div class="marign_top"><input type="submit" class="btn btn-primary" name="submit" value="Zatwierdź"></div>
    </form>
    </div>
    <?php
}else{
    ?>
        <div class="kloc">
        <h1>Quiz Rozpoznawania Miast</h1>
        <p>Po kliknięciu "Rozpocznij" Zostaną wyświetlone trzy zdjęcia miast<br> Twoim zadaniem jest rozpoznać jakie to miasto i
        wpisać nazwe w pole tekstowe.</p>
        <form method="post" action="">
            <input class="btn btn-primary" type="submit" name="submit" value="Rozpocznij">
        </form>
        </div>
<?php
}
}else{
    echo "<div class=\"kloc\">";
    echo "Już dzisiaj rozwiązłeś Photo Quiz.<br> Poczekaj albo spróbuj inne quizy. <br>";
    $czas_wygasniecia = $_COOKIE['photoQuiz'] - time();
    echo "Pozostały czas do następnego quizu: " . gmdate("H:i:s", $czas_wygasniecia);
    echo "</div>";
}
include "footer.php";
?>