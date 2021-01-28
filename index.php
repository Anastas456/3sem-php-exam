<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Экзамен</title>
</head>
<body>
<?php

// session_start();
// if (isset ($_GET['logout'])){
//     unset ($_SESSION['user']);
//     // header('Location: /');
//     // exit();
// }
// if(!isset($_SESSION['user']) && !isset($_POST['password']) && !isset($_POST['button'])){
    
    if(isset($_POST['password']) && isset($_POST['button'])){
        if ($_POST['password']=='12345'){
//             $_SESSION['user']='admin';
//             // header('Location: index.php');
//             //         exit();
            // echo '<a href="?logout">Выход</a>';
            // echo '<p >Добро пожаловать, '.$_SESSION['user'].'!</p>';
            include 'admin-page.php';
        }
         else{
        echo '
        <h3>Войти в кабинет администратора</h3>
        <form method="post" action="">
            <label>Введите пароль</label>
            <input type="text" name="password" id="password">
            <input type="submit" name="button" value="Войти">
        </form>
    ';     
        echo 'Неправильный пароль';
        }
    }
    else{
        echo '
        <h3>Войти в кабинет администратора</h3>
        <form method="post" action="">
            <label>Введите пароль</label>
            <input type="text" name="password" id="password">
            <input type="submit" name="button" value="Войти">
        </form>
    ';     
    }
   


?>
</body>
</html>