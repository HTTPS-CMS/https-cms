<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
session_start();


include("../system/cfg/login.php"); 
$random1 = 'secret_key1';
$random2 = 'secret_key2';
$hash = md5($random1.$password.$random2); 


	if (isset($_SESSION['logged']) && $_SESSION['logged'] == $hash) { 
echo "Добро пожаловать";


} else {

echo '<meta http-equiv="Refresh" content="0; URL=nd.php">';
exit;
}


if (isset($_GET[col])) { 
$col=$_GET[col]; } else { 
$col=50; }

$file=file("temp/stat.log"); 
?>
<html>
<head>
<style type='text/css'> 
   body {
    cursor: url(../cursors/cursor.cur), pointer;

   }
a{
    cursor: url(../cursors/link.cur), pointer;

   }

td.zz {PADDING-LEFT: 3px; FONT-SIZE: 9pt; PADDING-TOP: 2px; FONT-FAMILY: Arial; }
</style>
</head>
<body>
<center>
<?php
if ($col>sizeof($file)) { $col=sizeof($file); }
echo "Последние <b>".$col."</b> попыток неправомерного доступа к системе:"; ?>

<table width="680" cellspacing="1" cellpadding="1" border="0"    STYLE="table-layout:fixed">
<tr bgcolor="#19ff19"> 
<td class="zz" width="100"><b>Время и дата</b></td> 
<td class="zz" width="200"><b>Данные о устройстве</b></td> 
<td class="zz" width="100"><b>IP/прокси</b></td> 
<td class="zz" width="280"><b>Попытка доступа к</b></td>
</tr>
<?php   
for ($si=sizeof($file)-1; $si+1>sizeof($file)-$col; $si--) {   
$string=explode("|",$file[$si]);   
$q1[$si]=$string[0]; // дата и время   
$q2[$si]=$string[1]; // имя бота   
$q3[$si]=$string[2]; // ip бота   
$q4[$si]=$string[3]; // адрес посещения
echo '<tr bgcolor="#eeeeee"><td class="zz">'.$q1[$si].'</td>';
echo '<td class="zz">'.$q2[$si].'</td>';
echo '<td class="zz">'.$q3[$si].'</td>';
echo '<td class="zz">'.$q4[$si].'</td></tr>';}
echo '</table>';
echo '<br>Просмотреть последние <a href=?col=100>100</a> <a href=?col=500>500</a>';
echo '<a href=?col=1000>1000</a> попыток неправомерного доступа.';
echo '<br>Просмотреть <a href=?col='.sizeof($file).'>все попытки неправомерного доступа</a>.</center>';
echo '</body></html>';
?>
<a href='../.././cmd.php'><h2>Новая команда</h2></a>
