<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <style>
   body {
    background: #000000; /* Цвет фона */
    color: #ffffff; /* Цвет текста */
   }

.card {
  height:100%;
  width:100%;  
  padding: 15px;
  position: relative;
  z-index: 5;
  transition: all .4s;
  
}
.card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  box-shadow: 2px 2px 3px;
  transition: all .4s;
}
.card:hover::before {
  content: '';
position: absolute;
left: -5%;
width: 110%;
top: -5%;
height: 110%;
background: rgba(255, 0, 0, .3);
z-index: 3;
transition: all .4s;
}

  </style>
<?php
$file="temp/stat.log";    // файл для записи истории посещения сайта
$col_zap=4999;    // ограничиваем количество строк log-файла 
function getRealIpAddr() {  
if (!empty($_SERVER['HTTP_CLIENT_IP']))        // Определяем IP  
{ $ip=$_SERVER['HTTP_CLIENT_IP']; }  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   { $ip=$_SERVER['HTTP_X_FORWARDED_FOR']; }  else { $ip=$_SERVER['REMOTE_ADDR']; }  return $ip;}if (strstr($_SERVER['HTTP_USER_AGENT'], 'YandexBot')) {$bot='YandexBot';} //Выявляем поисковых ботов
elseif (strstr($_SERVER['HTTP_USER_AGENT'], 'Googlebot')) {
$bot='Googlebot';
}else { 
$bot=$_SERVER['HTTP_USER_AGENT']; }
$ip = getRealIpAddr();
$date = date("H:i:s d.m.Y");        // определяем дату и время события
$home = $_SERVER['HTTP_REFERER'];    // определяем страницу сайта
$lines = file($file);while(count($lines) > $col_zap) array_shift($lines);$lines[] = $date."|".$bot."|".$ip."|".$home."|\r\n";
file_put_contents($file, $lines);

echo '<div class="card">Доступ ограничен!</div>';

?>
