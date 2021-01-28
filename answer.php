<?php

$password='123456789';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('std-mysql', 'std_949_3sem_php_exam', $password, 'std_949_3sem_php_exam');
if( mysqli_connect_errno() ) 
    echo 'Ошибка подключения к БД: '.mysqli_connect_error();

    
if (isset($_GET['token']) && preg_match('/^[0-9A-F]{40}$/i', $_GET["token"])){
    $token=$_GET['token'];
    // echo 'Наш токен: '.$token.'<br>';   
}
else{
    echo 'Что-то не так с токеном(';
}

$db_token=mysqli_query($mysqli, "SELECT session_token FROM sessions");

while( $row=mysqli_fetch_row($db_token) ){
    // $row=mysqli_fetch_row($db_token);
    // echo count($row);
    // for ($i = 0; $i<=count($row); $i++){
    //     if ($row[$i]===$token){
    //         echo 'Find!';
    //     }
    // }

    $db=$row[0];
    // echo $db.'<br>';
    if ($db===$token){
        // echo 'Есть совпадение<br>';
        echo 'This is answer page<br>';

        $session_id=mysqli_query($mysqli, "SELECT session_id FROM sessions WHERE sessions.session_token ='$token'");
        while( $arr=mysqli_fetch_row($session_id) ){
            $our_session_id=$arr[0];
            echo $our_session_id.'<br>';
        }

        $question_id=mysqli_query($mysqli, "SELECT question_id FROM questions WHERE questions.session_id ='$our_session_id'");
        while( $arr=mysqli_fetch_row($question_id) ){
            $our_question_id=$arr[0];
            echo $our_question_id.'<br>';
        }

        $question_text=mysqli_query($mysqli, "SELECT question_text FROM questions WHERE questions.session_id ='$our_session_id'");
        while( $arr=mysqli_fetch_row($question_text) ){
            $our_question_text=$arr[0];
            echo $our_question_text.'<br>';
        }

        $question_type=mysqli_query($mysqli, "SELECT question_type FROM questions WHERE questions.session_id ='$our_session_id'");
        while( $arr=mysqli_fetch_row($question_type) ){
            $our_question_type=$arr[0];
            echo $our_question_type.'<br>';
        }

        switch ($our_question_type) {
            case 1:
                $for_type='<input name="answer" type="number">';
                break;
            case 2:
                $for_type='<input name="answer" type="number" min="1">';
                break;
            case 3:
                $for_type='<input name="answer" type="text">';
                break;
            case 4:
                $for_type='<textarea name="answer"></textarea>';
                break;
        }

        echo '
            <form method="post" action="">
                <h3>'.$our_question_text.'</h3>
                '.$for_type.'<br>
                <input type="submit" name="addAnswer" value="Отправить ответы">
            </form>
        ';

        if (isset($_POST['addAnswer'])){
            $user_answer=$_POST['answer'];
            $sql_res=mysqli_query($mysqli, "INSERT INTO answers(question_id, answer_itself) VALUES ('$our_question_id', '$user_answer')");

        if (!$sql_res)
            echo '<div class="error">При добавлении ответа произошла ошибка '.mysqli_errno($mysqli).'. Повторите попытку</div>';
        else // если все прошло нормально – выводим сообщение
            echo '<p>Ответ успешно добавлен</p>';
        }



    }
    // else{
    //     // echo 'Совпадений нет<br>';
    //     echo 'Неправильная ссылка или еще чего<br>';
    // }

}







    




?>