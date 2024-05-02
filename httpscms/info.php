<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <style>
   body {
    cursor: url(cursors/cursor.cur), pointer;
    background: #000000; /* Цвет фона */
    color: #ffffff; /* Цвет текста */
   }

</style>

<?
include("system/cfg/sysinf.php");


session_start();


include("system/cfg/login.php"); 

$random1 = 'secret_key1';
$random2 = 'secret_key2';
$hash = md5($random1.$password.$random2); 


	if (isset($_SESSION['logged']) && $_SESSION['logged'] == $hash) { 
echo "Добро пожаловать";


} else {

echo '<meta http-equiv="Refresh" content="0; URL=security/nd.php">';

exit;
}



?>



<center><h1>О системе</h1><p style="background-color: #F4FC03; border:3px #00B344 ridge;width: 500px; height:140px; padding: 5px 0 5px 15px; margin:20px 0 0 20px;"><? echo $sysinfo; ?> - Оконная система управления лэндингом<br><br>Copyleft Sementsul Maxim 2024-<? echo date('Y'); ?><br>Данный продукт распространяется по лицензии GPL-3,<br>за исключением некоторых программ, поставляемых с системой</p></center>
<?php

// Показывать всю информацию, по умолчанию INFO_ALL
phpinfo();

// Показывать информацию только о загруженных модулях.
// phpinfo(8) выдаёт тот же результат.
phpinfo(INFO_MODULES);

?>
