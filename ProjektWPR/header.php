<?php
 if(session_status() != PHP_SESSION_ACTIVE) session_start();
 if(!isset($_COOKIE['points'])) setcookie('points',strval(0));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    .kloc{
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .marign_top{
        margin-top: 10px;
    }
</style>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="https://youtu.be/dQw4w9WgXcQ">Super Quizzy 3000</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Strona Główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=Quiz.php>Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="PhotoQuiz.php">Rozpoznawanie Zdjęć</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="MultipleQuiz.php">Quiz Wielokrotnego Wyboru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="showProfile.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class ="nav-link disabled">
                        <?php   if(isset($_SESSION['username'])) echo "Zalogowano: ".$_SESSION['username'];
                                else echo "Nie zalogowano";
                        ?>
                    </a>
                </li>
                <?php
                    if(!isset($_SESSION['username'])) echo "<li class=\"nav-item\"><a class=\"nav-link btn btn-primary\" href=\"login.php\">Zaloguj Się</a></li>";
                    else echo "<li class=\"nav-item\"><a class=\"nav-link btn btn-primary\" href=\"login.php\">Wyloguj się</a></li>";
                ?>
            </ul>
        </div>
    </div>
</nav>
<div class="font-monospace">