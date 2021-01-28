<?php
echo 'This is admin-page';

// if (isset($_POST['enterButton'])){
   echo '
    <div>
        
            <a href="add.php">Создать экспертную сессию</a><br>
        
        <a href="#">Закрыть экспертную сессию</a><br>
        <a href="#">Удалить экспертную сессию</a><br>
    </div>
'; 
// }
// else{
//     echo 'Вы не вошли в кабинет администратора';
// }
if (isset($_POST['toAdd'])){
    include 'add.php';
}

?>