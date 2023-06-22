<?php
include "header.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Logowanie</title>
</head>
<style>
    .login_form{
        width: 50%;
        margin: 10% 0 0 25%;
    }
</style>
<body>
<?php
$ADMIN_USERNAME = 'admin';
$ADMIN_PASSWORD = 'admin123';

$USER_USERNAME = 'user';
$USER_PASSWORD = 'user123';

if(isset($_SESSION['username'])){
    unset($_SESSION['username']);
    unset($_SESSION['points']);
    unset($_SESSION['acctype']);
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === $ADMIN_USERNAME  && $password === $ADMIN_PASSWORD) {
        $_SESSION['username'] = $username;
        $_SESSION['points'] = 0;
        $_SESSION['acctype'] = 'a';
        header("Location: index.php");
    }else if($username === $USER_USERNAME  && $password === $USER_PASSWORD){
        $_SESSION['username'] = $username;
        $_SESSION['points'] = 10;
        $_SESSION['acctype'] = 'u';
        header("Location: index.php");
    }
    else {
        echo "Błędne dane logowania.";
    }
}
?>
<div class="login_form">
    <h2>Zaloguj się do serwisu</h2>
<form method="POST" action="">
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">@</span>
        <input name="username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">@</span>
        <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
    <input class="btn btn-primary margin_top" type="submit" name="submit" value="Login">
</div>
</form>
</body>
</html>
<?php
include "footer.php";