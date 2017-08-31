<?php
if(is_file(PATH_LOG)){
$f = fopen( PATH_LOG , "r") or die("Не могу открыть файл!");
 
while ($lines[] = fgets($f) );
fclose($f);


echo "<ol>";
foreach($lines as $line){
    list($dt, $page, $ref)=explode(";", $line);
    if(isset($ref)&isset($page)&isset($dt)){
    $dt=date("d-m-Y H:i:s", $dt);
    echo <<<FFF
    <li>
    [$dt]: $ref -> $page;
</li>
FFF;
}}
echo "</ol>";
}
