<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Экзамен</title>
</head>
<body>
<?php

session_start();

if (isset($_GET['logout'])){
    unset ($_SESSION['user']);
    header('Location: index.php');
    exit();
}

if (!isset($_SESSION['user']) && !isset($_POST['password'])){
    echo '<form name="auth" method="post" action="">
        <label for="password" class="header">Введите пароль (12345):</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" name="enterBtn" value="Войти">
        </form>'; 
}

if (!isset($_SESSION['user']) && isset($_POST['password'])) {
    if ($_POST['password'] == '12345'){
        $_SESSION['user'] = 'admin';
    }
    else {
        echo '<form name="auth" method="post" action="">
        <label for="password" class="header">Введите пароль (12345):</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" name="enterBtn" value="Войти">
        </form>';
        echo '<p>Неверный пароль</p>';
    }
}

if (isset($_SESSION['user'])){
    echo '<a href="?logout">Выход</a>';
    echo '<p >Добро пожаловать, '.$_SESSION['user'].'!</p>';
    include 'admin-page.php';
}
   


?>
</body>
</html>