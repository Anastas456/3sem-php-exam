<?php

$password='123456789';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect('std-mysql', 'std_949_3sem_php_exam', $password, 'std_949_3sem_php_exam');
    if( mysqli_connect_errno() ) 
        echo 'Ошибка подключения к БД: '.mysqli_connect_error();

    
if (isset($_GET['token']) && preg_match('/^[0-9A-F]{40}$/i', $_GET["token"])){
    $token=$_GET['token'];
    echo 'Наш токен: '.$token.'<br>';
    
}
else{
    echo 'Что-то не так с токеном(';
}

$db_token=mysqli_query($mysqli, "SELECT session_token FROM sessions");
// if ($db_token){
//     echo 'все норм';
// }
// else {
//     echo 'не норм';
// }

// while( $row=mysqli_fetch_row($db_token) ){
    $row=mysqli_fetch_row($db_token);
    for ($i = 0; $i<=count($row); $i++){
        if ($row[$i]===$token){
            echo 'Find!';
        }
    // }

    // $db=$row[0];
    // // echo $db.'<br>';
    // if ($db===$token){
    //     // echo 'Есть совпадение<br>';
    //     echo 'This is answer page<br>';
    // }
    // else{
    //     // echo 'Совпадений нет<br>';
    //     echo 'Неправильная ссылка или еще чего<br>';
    // }

}







    




?>