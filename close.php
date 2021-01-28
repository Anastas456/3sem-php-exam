<?php
echo 'This is close page';

$password='123456789';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  
$mysqli = mysqli_connect('std-mysql', 'std_949_3sem_php_exam', $password, 'std_949_3sem_php_exam');
if( mysqli_connect_errno() ) 
    echo 'Ошибка подключения к БД: '.mysqli_connect_error(); 

$sql_res=mysqli_query($mysqli, "SELECT * FROM sessions");
if (!$sql_res) 
    echo '<div class="error">При поиске ответов произошла ошибка '.mysqli_errno($mysqli).'.</div>';
else{
    echo '<table><tr><th>ID сессии</th><th>Статус</th><th>Ссылка</th><th></th></tr>';
        while( $row=mysqli_fetch_row($sql_res) )
        {
            echo '
                <tr>
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                    <td><a href="'.$row[2].'">'.$row[2].'</a></td>
                    <td><a href="#">Закрыть сессию</a></td>
                </tr>';
        }
        echo '</table>';
};

?>