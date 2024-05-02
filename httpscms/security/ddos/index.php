<?php
//----------------------  ---------------------------------------  

  //     Получаем время файла:
  $ipfile=substr(md5($_SERVER["REMOTE_ADDR"]),-3);  // -3 означает 4096 возможных файлов
  $oldtime=0;
  if (file_exists($iplogdir.$ipfile)) $oldtime=filemtime($iplogdir.$ipfile);

  //     Обновляем время:
  $time=time();
  if ($oldtime<$time) $oldtime=$time;
  $newtime=$oldtime+$itime;

  //     Проверяем человек или бот:
  if ($newtime>=$time+$itime*$imaxvisit)
  {
    //     Блокируем посетителя:
    touch($iplogdir.$ipfile,$time+$itime*($imaxvisit-1)+$ipenalty);
    header("HTTP/1.0 503 Service Temporarily Unavailable");
    header("Connection: close");
    header("Content-Type: text/html");
    echo '<html><head><title>Произошла перегрузка траффиком или идентифицирована DDOS - атака!!!</title></head><body><p align="center"><strong>'
          .$message1.'</strong>'.$br;
    echo $message2.$ipenalty.$message3.$message4.$message6.'</p></body></html>'.$crlf;
   //     Отправляем сообшение о блокировке админу сайта
     {
	@mail($to, $subject, $message5, $headers);	
     }
    //     создание файла лога, если нет и запись:
    $fp=@fopen($iplogdir.$iplogfile,"a");
    if ($fp!==FALSE)
    {
      $useragent='<неизвестный юзер>';
      if (isset($_SERVER["HTTP_USER_AGENT"])) $useragent=$_SERVER["HTTP_USER_AGENT"];
      @fputs($fp,$_SERVER["REMOTE_ADDR"].' on '.date("D, d M Y, H:i:s").' as '.$useragent.$crlf);
    }
    @fclose($fp);
    exit();

  }

  //     Изменение времени файла:
  touch($iplogdir.$ipfile,$newtime);

?>
