<?php
/* Основные настройки */
define ("DB_HOST","localhost");
define ("DB_LOGIN","root");

define ("DB_PASSWORD","root");
define ("DB_NAME","gbook");
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
if(!$link ){
echo 'Ошибка: '
. mysqli_connect_errno() . ':' . mysqli_connect_error(); 
}
$name=$email=$msg="";

/* Основные настройки */

/* Сохранение записи в БД */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($link, $_POST["name"]); 
     $email = mysqli_real_escape_string($link, $_POST["email"]);
     $msg = mysqli_real_escape_string($link, $_POST["msg"]);
    

    
    
    $result = mysqli_query($link, "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')");
// Отслеживаем ошибки при исполнении запроса


}

/* Сохранение записи в БД */

/* Удаление записи из БД */
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['del'])){
     $del=trim( strip_tags($_GET['del']));   

 $del = mysqli_query($link, "DELETE FROM msgs WHERE id = $del");
}}else{
    $del="";

}


/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД */
 $result = mysqli_query($link, "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as dt   FROM msgs   ORDER BY id DESC");
  
while($row = mysqli_fetch_array($result)){
   $id=$row['id'];
   $email= $row['email'];
   $name= $row['name'];
    $dt=date("d-m-Y H:i:s",$row['dt']);
    $msg=$row['msg'];
   echo "<br>";
   echo  "<p>";
   echo "<a href='";
    echo   "$email";
    echo "'>$name</a>"; 
   echo "$dt написал <br>$msg";
   echo "</p>";
  echo "<p align='right'>";
      echo "<a href='http://localhost/mysite2/index.php?id=gbook&del=$id'> Удалить</a> </p>";
      
       
}      
        
    
$row_count = mysqli_num_rows($result); 
      echo "Всего записей ".$row_count;
  ?>
      
      
      
      
 <?php
mysqli_close($link);

/* Вывод записей из БД */
?>