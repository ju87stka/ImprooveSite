<?php
$visitCounter = 0;
 $lastVisit= "";
if(isset($_COOKIE["visitCounter"])){
   $visitCounter= $_COOKIE["visitCounter"];
    
$visitCounter++;
    
} 
if(isset($_COOKIE["lastVisit"])){
   $lastVisit= date("d-m-Y H-i-s", $_COOKIE["lastVisit"]);
    
}
setcookie("visitCounter", $visitCounter, time()+3600);
setcookie("lastVisit", time(), time()+3600);
?>
   