<?php

$title = 'Супер-мега сайт';
$header = "Добро пожаловать на наш сайт!";
if(isset($_GET['id'])){
         $id = strtolower(strip_tags(trim($_GET['id'])));

// Инициализация заголовков страницы
switch($id){
	case 'contact': 
		$title = 'Контакты';
		$header = 'Обратная связь';
		break;
	case 'about': 
		$title = '.000000000002 О нас';
		$header = 'О нашем сайте';
		break;
	case 'info': 
		$title = 'Информация';
		$header = 'Информация';
		break;
	case 'log': 
		$title = 'Журнал посещений';
		$header = 'Журнал посещений';
		break;
	case 'gbook': 
		$title = 'Гостевая книга';
		$header = 'Наша гостевая книга';
		break;		
} }
$visitCounter = 0;
 $lastVisit= "";


if(isset($_COOKIE["visitCounter"])){
   $visitCounter= $_COOKIE["visitCounter"];
    
$visitCounter++;
    
} 
if(isset($_COOKIE["lastVisit"])){
   $lastVisit= date("d-m-Y H-i-s", $_COOKIE["lastVisit"]);
    
}
if(date('d-m-Y', $_COOKIE['lastVisit']) != date('d-m-Y'))
{
setcookie("visitCounter", $visitCounter, time()+311600);
setcookie("lastVisit", time(), time()+360110);
}



?>