<?php
if (is_numeric($_POST["obj_id"])) $obj=$_POST["obj_id"]; 
else $obj='';
if ($_POST["rating"]>=0 and $_POST["rating"]<=5) $ocenka=$_POST["rating"];
else $ocenka='';
if ($ocenka!='' and $obj>0) {
mail("mail@linuxtosha.ru", "Rating 'Установка Linux'", date("d.m.Y H:i") . "\n". $_SERVER["REMOTE_ADDR"] . "\n". $ocenka);}
if (isset($ocenka)) {
$date=date('z');
setcookie('old_date', $date, time()+3600*12);}
if (isset($old_date)) {
 $dl="Вы уже голосовали";
 echo $dl;
return $dl;
}else{
$fp = fopen("", "a+");
$mytext = "\n" . date("d.m.Y H:i") . "\n". $_SERVER["REMOTE_ADDR"] . "\n". $ocenka;
fwrite($fp, $mytext);
fclose($fp);
$dl = 'Спасибо. Ваш голос услышан!';
echo $dl;
return $dl; 
}
?>
