<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Экзамен</title>
</head>
<body>
<?php
if ((!isset($_POST['password']) || $_POST['password'] != '12345') && !isset($_POST['enterButton']))
{
    echo '
    <h3>Войти в кабинет администратора</h3>
    <form method="post" action="">
        <label>Введите пароль (12345)</label>
        <input type="text" name="password" id="password">
        <input type="submit" name="button" value="Войти">
    </form>
';
}
else {
    include 'admin-page.php';
}
?>
</body>
</html>