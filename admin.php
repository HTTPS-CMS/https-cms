<?php
require("httpscms/security/conf_ddos.php");

session_start();

// ***************************************** //
// **********	DECLARE VARIABLES  ********** //
// ***************************************** //
$login = 'httpscms/system/cfg/login.php';
include("httpscms/system/cfg/login.php"); 
$random1 = 'secret_key1';
$random2 = 'secret_key2';

$hash = md5($random1.$password.$random2); 

$self = $_SERVER['REQUEST_URI'];


// ************************************ //
// **********	USER LOGOUT  ********** //
// ************************************ //

if(isset($_GET['logout'])) {
	unset($_SESSION['logged']);

}

//<link rel="stylesheet" type="text/css" href="style.css" />
//https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css
// ******************************************* //
// **********	USER IS LOGGED IN	********** //
// ******************************************* //

if (isset($_SESSION['logged']) && $_SESSION['logged'] == $hash) {
$_SESSION['auth'] = true;
			


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="httpscms/system/css/jquery-ui.css">
	<link rel="canonical" href="admin.php" />
        <script src="httpscms/system/js/jquery-1.12.4.min.js"></script>
        <script src="httpscms/system/js/ui/jquery-ui.js"></script>
	<script src="httpscms/system/js/system.js"></script>
	<link rel="stylesheet" href="httpscms/system.css?t=<?php echo(microtime(true).rand()); ?>" type="text/css" />	

<title>https-cms</title>




<style>


#desktop {
    cursor: url(httpscms/cursors/cursor.cur), pointer;
    font-family: Arial, Helvetica, sans-serif;
    position: fixed;
    height: 100%;
    width: 100%;
    background-image: url("httpscms/system/Wallpaper/background.jpeg?t=<?php echo(microtime(true).rand()); ?>"); /* Замените URL на путь к вашему изображению */
    background-repeat: no-repeat;
    overflow: hidden;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
}

object {
    /* Главный герой нашей сцены! */
    position: absolute;
    height: 97%;
    width: 97%; /* Используем весь доступный горизонтальный простор */
    /* Прощай, ограничивающая рамка! */
    border: 5;
    padding: 5; /* Отступы внутри блока? Для нас это нерационально. */
    margin: 5; /* Внешние отступы? Нам этого слишком. */
}

iframe {
    /* Главный герой нашей сцены! */
    position: absolute;
    height: 97%;
    width: 97%; /* Используем весь доступный горизонтальный простор */
    /* Прощай, ограничивающая рамка! */
    border: 5;
    padding: 5; /* Отступы внутри блока? Для нас это нерационально. */
    margin: 5; /* Внешние отступы? Нам этого слишком. */
}

/* The whole thing */
.custom-menu {
    display: none;
    z-index: 1000;
    position: absolute;
    overflow: hidden;
    border: 1px solid #CCC;
    white-space: nowrap;
    font-family: sans-serif;
    background: #FFF;
    color: #333;
    border-radius: 5px;
    padding: 0;
}

/* Each of the items in the list */
.custom-menu li {
    padding: 8px 12px;
    cursor: pointer;
    list-style-type: none;
    transition: all .3s ease;
    user-select: none;
}

.custom-menu li:hover {
    cursor: url(httpscms/cursors/link.cur), pointer;
    background-color: #DEF;
}

</style>

<style>

.window {
cursor: url(httpscms/cursors/alternate.cur), pointer;
    position: absolute;
    border: 2px solid #000;
    background: #EEE;
    border-radius: 5px;
    z-index: 1000;
    display: flex; /* Добавляем эту строку */
    flex-direction: column; /* Добавляем эту строку */
}

#icons {
	position: absolute;
	z-index: 10;
	top: 20px;
	left: 20px;
}

#icons a {
    display: block;
    cursor: pointer;
    padding: 2px 10px;
}
#icons a:hover {
cursor: url(httpscms/cursors/link.cur), pointer;
	background: #000;
	color: #FFF;
}

.taskbarPanel.activeTab {
	background: #FFF;
}
.taskbarPanel.minimizedTab {
	background: #AAA;	
}
.taskbarPanel.minimizedTab:hover {
	background: #DDD;
}

.activeWindow .windowHeader {
    background-color: #8888d6;
cursor: url(httpscms/cursors/precision.cur), pointer;
}

.windowHeader {
    background-color: #b7b7e0;
    text-align: right;
    border-bottom: 2px solid #000;
    padding: 2px;
    cursor: url(httpscms/cursors/precision.cur), pointer;
    height: 28px;
}

.windowHeader > span.winclose:hover {
	background: #f15454;
cursor: url(httpscms/cursors/link.cur), pointer;
}

.winmaximize > span {
	border: 2px solid #000;
	border-top: 3px solid #000;
cursor: url(httpscms/cursors/link.cur), pointer;
}

.winminimize > span {
	border-bottom: 3px solid #000;
cursor: url(httpscms/cursors/link.cur), pointer;
}

.winmaximize > span:nth-child(2) {
	display: none;
cursor: url(httpscms/cursors/link.cur), pointer;
}
.fullSizeWindow .winmaximize > span:nth-child(1) {
	margin: 2px 0 0 -4px;
cursor: url(httpscms/cursors/link.cur), pointer;
}
.fullSizeWindow .winmaximize > span:nth-child(2) {
    display: inline-block;
    top: 3px;
    left: 12px;
cursor: url(httpscms/cursors/link.cur), pointer;
}


.wincontent {
    padding: 10px;
    min-width: 200px;
    min-height: 140px;
    border: 2px solid #000;
    margin: 2px;
	border-radius: 0 0 5px 5px;

}
.windowHeader > strong {
    float: left;
    margin: 0px 3px 0 10px;
    line-height: 29px;
    font-size: 17px;

}


.taskbarPanel.closed {
	display: none;
cursor: url(httpscms/cursors/link.cur), pointer;
}

.windowHeader > span:hover {
	background: rgba(255,255,255,0.3);
cursor: url(httpscms/cursors/link.cur), pointer;
}

.windowHeader > span > span {
    display: inline-block;
    height: 8px;
    width: 10px;
    position: absolute;
    top: 6px;
    left: 10px;

}



#templateLink {
cursor: url(httpscms/cursors/link.cur), pointer;
    position: absolute;
    display: inline-block;
    bottom: 10px;
    right: 20px;
    font-weight: bold;
    font-size: 15px;
    color: #30478c;
}

#taskbar {
	position: absolute;
	height: 32px;
	border-top: 2px solid #000;
	bottom: 0;
	left: 0;
	right: 0;
	background: #EEE;
}

.taskbarPanel {
    display: inline-block;
    border: 2px solid #000;
    border-radius: 5px;
    line-height: 24px;
    margin: 2px 0 0 10px;
    font-size: 17px;
    padding: 0 10px;
    background: #CCC;
    font-weight: bold;
	cursor: url(httpscms/cursors/link.cur), pointer;
}
   .btn {
    cursor: url(httpscms/cursors/link.cur), pointer;
    padding: 0.5em 1.5em; /* Поля по вертикали и горизонтали */
    background-color: #9e9e9e; /* Цвет фона */
    color: #fff; /* Белый цвет текста */
    font-size: 0.9em; /* Размер текста */
    border-width: 0; /* Убираем рамку */
    margin-bottom: 1rem; /* Отступ снизу */
   }
   .btn.primary { background-color: #3f51b5; }
   .btn.success { background-color: #4cb050; }
   .btn.info { background-color: #607d8b; }
   .btn.warning { background-color: #ff9700; }
   .btn.danger { background-color: #f44236; 
  </style>

</head>
<body>




  <script>
   function digitalClock() {
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();
       //* добавление ведущих нулей */
      if (hours < 10) hours = "0" + hours;
      if (minutes < 10) minutes = "0" + minutes;
      if (seconds < 10) seconds = "0" + seconds;
        document.getElementById("id_clock").innerHTML = hours + ":" + minutes + ":" + seconds;
        setTimeout("digitalClock()", 1000);
   }
  </script>



	<div id="desktop">
		<div class="window closed" data-title="CmsLand">
	





<div><object data="cmsland.php" width="1900" height="1900" sandbox="allow-scripts allow-same-origin"></object></div>





</div>
		<div class="window closed" data-title="Файлы">
		<div>

<object data="httpscms/scripts/filemanager.php?p=" width="500" height="100"></object>
</div>
		</div>

		<div class="window closed" data-title="Терминал">
<object data="cmd.php" width:100% height:100% sandbox="allow-scripts allow-same-origin"></object>



</div>


		<div class="window closed" data-title="Сервис">
			<div><object data="httpscms/scripts/information/checkup.php" width="1900" height="1900" sandbox="allow-scripts allow-same-origin"></object></div>
		</div>

	
		

		<div class="window closed" data-title="Прочее">
			


		
		<div id="icons">
                        <a class="openWindow" data-id="7">Сейчас админку используют</a>
                        <a class="openWindow" data-id="5">Поддержать</a>
                        <a style="background-color:DodgerBlue;" href="https://textolite.ru/">Textolite site</a><br><br>
		</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
		</div>


		
		<div class="window closed" data-title="Поддержать">
<iframe src="https://yoomoney.ru/quickpay/fundraise/button?billNumber=121SA01S6PA.240411&" width="330" height="50" frameborder="0" allowtransparency="true" scrolling="no"></iframe>​<br><br><br>
<iframe src="https://yoomoney.ru/quickpay/fundraise/button?billNumber=121SD34KPQC.240411&" width="330" height="50" frameborder="0" allowtransparency="true" scrolling="no"></iframe>​<br><br><br><br>
<iframe src="https://yoomoney.ru/quickpay/fundraise/button?billNumber=121SDVODK9C.240411&" width="330" height="50" frameborder="0" allowtransparency="true" scrolling="no"></iframe>​
			
<div>



</div></div>




<div class="window closed" data-title="Справки">

<div style="width:100%; height:100%; overflow: auto;">
<h2>Автор админки <a href="https://https-cms.ru/">Семенцул Максим</a> 2024</h2><br>
Поддержать разработчика можно перейдя: <br>
Прочее > Поддержать<br><br><br>


            <h2>1)Пароли</h2><br>
         По умолчанию везде используется пароль: admin<br>
         Крайне важно сменить пароль, после установки админки,<br>
         дабы не допустит неправомерного доступа.<br>
         Для изменения пароля перейдите:<br>
         Безопасность > Изменить пароль.<br><br>
         Так же стоит установить пароль в Textolite:<br>
         Textolite > Настройки<br><br>

         <h2>2)Безопасность</h2><br>
         Во избежание доступа 3-х лиц к админке и сервисам,<br>
         обязательно завершайте сеанс работы админки и сервисов<br><br>

         <h2>3)Лицензия</h2><br>
         Данная админка является бесплатной<br>
         и распространяется по открытой лицензии GPL-3,<br>
         за исключением некоторых входящих в нее проектов<br>
         таких как Textolite и т.д <br>

</div>



</div>

<div class="window closed" data-title="Сейчас админку используют">
<script type="text/javascript" src="//rf.revolvermaps.com/0/0/8.js?i=53tdnxijjo3&amp;m=8&amp;c=ff0000&amp;cr1=ffffff&amp;f=arial&amp;l=33" async="async"></script>
</div>

<div class="window closed" data-title="Программы">
<div id="icons">
			<a class="openWindow" data-id="1">Filemanager</a>

                        <a class="openWindow" data-id="12">Textolite</a>

		</div></div>



<div class="window closed" data-title="Filemanager">






<div><object data="filemanager/filemanager.php?p=" width="1900" height="1900" sandbox="allow-scripts allow-same-origin"></object></div>


		</div>




<div class="window closed" data-title="Изменить пароль">
		

<form method="POST">
<label>Введите логин</label><br>
<input style="display: inline;" type='text' name='ousername' size='20' maxlength='30' value='<? echo "$username"; ?>'  required><br>
<label>Введите пароль</label><br>
<input style="display: inline;" type="password" name='opassword' size='20' maxlength='30'  required><br>
<label>Введите новый логин</label><br>
<input style="display: inline;" type='text' name='nusername' size='20' maxlength='30'  required><br>
<label>Введите новый пароль</label><br>
<input style="display: inline;" type="password" name='npassword' size='20' maxlength='30'  required><br>

<p><input style="cursor:pointer;display: inline;" type="submit" name="button_id" value="Применить" /></p>
</form>
<?php

# Если кнопка нажата
 if(isset( $_POST['button_id']))
{
$ousername = $_POST['ousername'];
$opassword = $_POST['opassword'];
$nusername = $_POST['nusername'];
$npassword = $_POST['npassword'];



$ouser = hash ('sha256', $_POST['ousername']);
$opass = hash ('sha256', $_POST['opassword']);
$user = hash ('sha256', $username);
$pass = hash ('sha256', $opassword);




if ($ousername == $username){ 

if ($opass == $pass){

 print "Все ок"; 

#смена пароля

// Открываем файл, чтобы получить существующее содержимое
$current = file_get_contents($file);

// Обновляем данные для входа
$current .= '<? 
$password = ' . $npassword . ';
$username = ' . $nusername . ';';

// Записываем содержимое обратно в файл
file_put_contents($login, $current);





}    
else { print "Логин или пароль не верны"; }

 }    
else { print "Логин или пароль не верны"; }


}
?>

</div>

<div class="window closed" data-title="Безопасность">
<div id="icons">
        <a class="openWindow" data-id="10">Изменить пароль</a>
</div></div>

<div class="window closed" data-title="Textolite">
			<div><object data="textolite/textolite.php" width="1900" height="1900" sandbox="allow-scripts allow-same-origin"></object></div>
		</div>	

		<div class="window closed" data-title="О системе">
            <div><object data="httpscms/info.php" width="1900" height="1900" sandbox="allow-scripts allow-same-origin"></object></div>
              		</div>	


<div class="window closed" data-title="Настройки">
         <div id="icons">
  <a class="openWindow" data-id="11">Безопасность</a>
 <a class="openWindow" data-id="15">Установка обоев</a>
</div></div>	


<div class="window closed" data-title="Установка обоев">
<object data="httpscms/system/desk.php" width="1900" height="1900" sandbox="allow-scripts allow-same-origin"></object>
</div>



		
		<div id="taskbar">		
		</div>
		
		<div id="icons">
              	        <a class="openWindow" data-id="2">Терминал</a>
			<a class="openWindow" data-id="0">CmsLand</a>
                        <a class="openWindow" data-id="12">Textolite</a>
			<a class="openWindow" data-id="1">Файлы</a>
                        <a class="openWindow" data-id="3">Сервис</a>
			
		</div>




<center> <p>
   <a class="openWindow" data-id="4"><button class="btn primary">Прочее</button></a>
   <a class="openWindow" data-id="11"><button class="btn success">Безопасность</button></a>
   <button class="btn info"><h1><div id="id_clock"></div></h1></button>
   <a class="openWindow" data-id="6"><button class="btn warning">Справка</button></a>
   <a href="?logout=true"><button class="btn danger">Выйти</button></a>
  </p></center>

<?
if(isset($_GET['analize'])){	
echo ('<div class="window" data-title=' . $_SERVER['SERVER_NAME'] . '><object data=https://www.cy-pr.com/a/' . $_SERVER['SERVER_NAME'] . ' width="1900" height="1900" sandbox="allow-scripts allow-same-origin"></object></div>');


} 


?>
       

		
<center><h1><div id="id_clock"></div></h1></center>
    <script>digitalClock();</script>

<br><p id="templateLink">Здравствуйтt <?php echo $username; ?> </p>
		
	</div>

<script>
// JAVASCRIPT (jQuery)

// Trigger action when the contexmenu is about to be shown
$(document).bind("contextmenu", function (event) {
    
    // Avoid the real one
    event.preventDefault();
    
    // Show contextmenu
    $(".custom-menu").finish().toggle(100).
    
    // In the right position (the mouse)
    css({
        top: event.pageY + "px",
        left: event.pageX + "px"
    });
});


// If the document is clicked somewhere
$(document).bind("mousedown", function (e) {
    
    // If the clicked element is not the menu
    if (!$(e.target).parents(".custom-menu").length > 0) {
        
        // Hide it
        $(".custom-menu").hide(100);
    }
});


// If the menu element is clicked
$(".custom-menu li").click(function(){
    
    // This is the triggered action name
    switch($(this).attr("data-action")) {
        
        // A case for each action. Your actions here
        case "first": alert("first"); break;
        case "second": alert("second"); break;
        case "third": alert("third"); break;
    }
  
    // Hide it AFTER the action was triggered
    $(".custom-menu").hide(100);
  });
</script>

<ul class='custom-menu'>
  <a class="openWindow" data-id="15"><li data-action="first">Изменить обои</li></a>
  <a class="openWindow" data-id="14"><li data-action="first">Настройки</li></a>
  <a class="openWindow" data-id="13"><li data-action="third">О ситеме</li></a>
  <li data-action="second"></li>
  
</ul>

</body>

</html>

<?php
}


// *********************************************** //
// **********	FORM HAS BEEN SUBMITTED	********** //
// *********************************************** //

else if (isset($_POST['submit'])) {
$p1 = hash ('sha256', $password);
$p2 = hash ('sha256', $_POST['password']);

$pa1 = password_hash($p1, PASSWORD_DEFAULT, ['cost' => 12]);


	if ($_POST['username'] == $username){

if (password_verify($p2, $pa1)) {
    // Success! Log the user in here.
		//IF USERNAME AND PASSWORD ARE CORRECT SET THE LOG-IN SESSION
		$_SESSION["logged"] = $hash;
		header("Location: $_SERVER[PHP_SELF]");
                echo '<meta http-equiv="Refresh" content="0; URL=admin.php">';		
	} else {
		
		// DISPLAY FORM WITH ERROR
		display_login_form();
		echo '<p>Username or password is invalid</p>';
		
	}
}
	}
	
// *********************************************** //
// **********	SHOW THE LOG-IN FORM	********** //
// *********************************************** //

else {
	display_login_form();
}


function display_login_form() { ?>


    <style>
    html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#141e30, #243b55);
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box a:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.login-box a span {
  position: absolute;
  display: block;
}

.login-box a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}
    </style>

<div class="login-box">
  <h2>Login</h2>
  <form action="<?php echo $self; ?>" method='post' id="login">
    <div class="user-box">
      <input type="text" name="username" id="username" required="">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" id="password" required="">
      <label>Password</label>
    </div>
    <a href="#" onclick="document.getElementById('login').submit(); return false;">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      -->
<input type="submit" name="submit" value="Submit">
    </a>
  </form>
</div>


<?php } ?>


