<?php
  $crlf=chr(13).chr(10);
  $itime=3;  // Минимальное число секунд между визитами
  $imaxvisit=10;  // Максимальное число визитов в $itime x $imaxvisits секундах
  $ipenalty=($itime * $imaxvisit);  // Минуты ожидания
  $iplogdir="./cfg/";// Папка хранения логов с IP
  $iplogfile="./AttackersIPs.Log"; //Имя файла лога
  
  // Время
  $today = date("Y-m-j,G");
  $min = date("i");
  $sec = date("s");
  $r = substr(date("i"),0,1);
  $m =  substr(date("i"),1,1);
  $minute = 0;
  
  // установка данных для администратора
  $to      = 'support@domainname.com';   //Адрес админа
  $headers = 'From: domainname.com support@domainname.com' . "\r\n" .   // 	   
    		 'X-Mailer: domainname.com защишен от DDoS';
  $subject = "Предупреждение на возможные DDOS атаки @ $today:$min:$sec";
  

  //Сообщение при бане:
  $message1='<font color="red">Временный интенсивный траффик или распознена как DDOS атака!!!</font><br>';
  $message2='Пожалуйста, подождите ... ';
  $message3=' секунд или повторите попытку входа через несколько минут.<br>';
  $message4='<font color="blue">Защита призведена DDOS скриптом на PHP!!!</font><br>Если вы человек, то смените IP и вы свободны.<br>Мы временно забанили ваш IP <b>'.$_SERVER["REMOTE_ADDR"].' </b>из-за DDOS атаки.';
  $message5=' Ваш сайт был атакован или боты захотели зайти через IP - адресов: '.$_SERVER["REMOTE_ADDR"];
  $message6='<br><img src="./ddos/images/cross.gif" alt="" border="0">';
  
include("ddos/index.php");//Включаем главный файл DDOS - защиты из диерктории ddos
?>
