<?php
echo 'This is add page<br>';

$password='123456789';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = mysqli_connect('std-mysql', 'std_949_3sem_php_exam', $password, 'std_949_3sem_php_exam');
if( mysqli_connect_errno() ) 
    echo 'Ошибка подключения к БД: '.mysqli_connect_error(); 


$forLink='0123456789qwertyuiopasdfghjklzxcvbnm';
$token = sha1(uniqid($forLink, true));
$url='http://php-3sem-exam.std-949.ist.mospolytech.ru/answer.php?token='.$token;


$sql_res=mysqli_query($mysqli, "INSERT INTO sessions(is_open, session_link, session_token) VALUES ('1', '$url', '$token')");
$session_id=mysqli_query($mysqli, "SELECT session_id FROM sessions ORDER BY sessions.session_id DESC LIMIT 1");
while( $row=mysqli_fetch_row($session_id) ){
    $last_session_id=$row[0];
}

if (!$sql_res)
    echo '<div class="error">При создании сессии произошла ошибка '.mysqli_errno($mysqli).'. Повторите попытку</div>';
else
    echo '<p>Сессия успешно создана.</p>';

echo '<form method="get" action="">
    <input type="submit" name="addQuestion" id="addQuestion" value="Добавить вопрос (пока работает правильно только с добавлением одного)">

</form>';

if (isset($_GET['addQuestion'])){
    echo '
    <form name="add-question-form" method="get" action="">
        <label for="inputQuestText">Введите текст вопроса</label>
        <input type="text" name="inputQuestText" id="inputQuestText"><br>

        <label for="inputQuestType">Выберите тип вопроса</label>
        <select name="inputQuestType">
            <option selected value="1">с открытым ответом (число)</option>
            <option value="2">с открытым ответом (положительное число)</option>
            <option value="3">с открытым ответом (строка)</option>
            <option value="4">с открытым ответом (текст)</option>
        </select><br>

        <input type="submit" value="Добавить" name="addButton">
    </form>
    ';
}

    

if (isset($_GET['addButton'])){
    $text=$_GET['inputQuestText'];
    $type=$_GET['inputQuestType'];

    $sql_res_for_quest=mysqli_query($mysqli, "INSERT INTO questions(question_type, session_id, question_text) VALUES ('$type', '$last_session_id', '$text')");

    if (!$sql_res_for_quest)
        echo '<div class="error">При добавлении вопроса произошла ошибка '.mysqli_errno($mysqli).'. Повторите попытку</div>';
    else 
        echo '<p>Вопрос успешно добавлен</p><br>
        <p>Ссылка на форму для сбора ответов: <a target="_blank" href="'.$url.'"> $url</a></p>';
}
    


?>