<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <style>
   body {
    cursor: url(../cursors/cursor.cur), pointer;
   }

button{
    cursor: url(../cursors/cursor.cur), pointer;
   }
input{
    cursor: url(../cursors/link.cur), pointer;
   }
select{
    cursor: url(../cursors/link.cur), pointer;
   }
</style>
<?php
	
session_start();


include("cfg/login.php");
$random1 = 'secret_key1';
$random2 = 'secret_key2';
$hash = md5($random1.$password.$random2); 


	if (isset($_SESSION['logged']) && $_SESSION['logged'] == $hash) { 
echo "Добро пожаловать";


} else {
echo'<meta http-equiv="Refresh" content="0; URL=../security/ndinf.php">'; 

exit;
}		

		$adm=1;


if($adm==1){
if(isset($_POST['pagename'])){
	$_SESSION['pagename']=$_POST['pagename']; // Получаем имя страницы для редактирования

};	
if(isset($_SESSION['pagename'])){	
	$pagename=$_SESSION['pagename'];
} else {
	$pagename='sbackground.jpeg';	// Если его нет в куках и нет в POST запросе то ставим его=index.html	

};




// В переменную $template поместим код редактируемой странички
// Выводим шапку админки
echo('
<html>
<head>
<style>
	body, html {
	padding: 0px; margin: 0px;
	background: #eee; 
	text-align: center;
}
textarea {
	padding: 10px; 
	width: 600px; height: 400px;
}
a {
	text-decoration: none;
}
.kartinka {
	display: inline-block; 
	text-decoration: none;
	padding: 20px; padding-bottom: 5px;
	text-align: center; 
	cursor: pointer;
}
.kartinka:hover {
	background: #fffff0; 
	border-radius: 5px;
}
.kartinka img {
	height: 100px; 
	margin-bottom: 10px;
}
.bigkartinka {
	height: 300px; 
	padding: 50px;
}
#menu {
	background: #fffff0;
	padding-top: 15px; padding-bottom: 10px; padding-left: 10px;
	margin-bottom: 30px;
	height: 50px;
	line-height: 50px;
	text-align: center;
	font-size: 20px;
	border-bottom: 1px solid silver;
}
#myform {
	height: 40px; line-height: 40px;
	display: inline-block;
	vertical-align: top;
	padding-left: 20px; padding-right: 20px;
	margin-right: 3px;
	text-align: center;
	font-size: 90%;
}
#menu a {
	height: 40px; line-height: 40px;
	text-decoration: none;
	display: inline-block;
	vertical-align: top;
	background: #558;
	padding-left: 20px; padding-right: 20px;
	color: white;
	margin-right: 3px;
	text-align: center;
	width: 80px;
	font-size: 90%;
	-webkit-box-shadow: 0 10px 6px -6px #777;
	-moz-box-shadow: 0 10px 6px -6px #777;
	box-shadow: 0 10px 6px -6px #777;
}
.mytext, .cssjs {
	display: block;
	border-radius: 5px;
	padding: 10px; padding-left: 20px; padding-right: 20px;
	margin: 20px;
	background: #fffff9;
	color: black;
}
.mytext:hover, .cssjs:hover {
	background: #fffff0;
	cursor: pointer;
}
#help {
	max-width: 700px; margin: 0 auto; text-align: left; font-size: 120%;
}
</style>
<style>
   .btn {
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
<body><h1>Установка обоев</h1>');

if(isset($_POST['pagename'])){
unlink("Wallpaper/background.jpeg");
copy($pagename, 'Wallpaper/background.jpeg');
echo '<img width="600" height="400" src=' . $pagename . '?t=' . (microtime(true).rand()) . ' />';
};

echo('<center> <p>   <button class="btn info"><h1><form action="desk.php" id="myform" method="POST">
<select name="pagename">');
// Создаем список страниц в корневой папке доступных для редактирования
$filelist1 = glob("*.jpeg");
$ddd=0;
$ssss='';
for ($j=0; $j<count($filelist1); $j++) {
	if($filelist1[$j]==$_SESSION['pagename']){
		$ssss.=('<option selected>'.$filelist1[$j].'</option>');
		$ddd=1;
	} else {
		$ssss.=('<option>'.$filelist1[$j].'</option>');
	};
};
if($ddd==0){
	$ssss='';
	for ($j=0; $j<count($filelist1); $j++) {
		if($filelist1[$j]=='sbackground.jpeg'){
			$ssss.=('<option selected>'.$filelist1[$j].'</option>');
			$ddd=1;
		} else {
			$ssss.=('<option>'.$filelist1[$j].'</option>');
		};
	};
};
echo($ssss);
echo('</select>
<input type="submit" value="Выбрать" title="Выбрать">
</form>

</h1></button>
     </p></center>
');



echo('</body></html>');
};

?>
