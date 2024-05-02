<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <style>
   body {
    cursor: url(httpscms/cursors/cursor.cur), pointer;
    background: #000000; /* Цвет фона */
    color: #ffffff; /* Цвет текста */
   }
button {
    cursor: url(httpscms/cursors/link.cur), pointer;

}  </style>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    #console {
    cursor: url(httpscms/cursors/cursor.cur), pointer;
        width: 80%;
        height: 300px;
        border: 1px solid #ccc;
        padding: 10px;
        overflow-y: scroll;
        margin-bottom: 10px;
    }
    #input {
    cursor: url(httpscms/cursors/text.cur), pointer;
        width: 80%;
        padding: 5px;
    }
</style>

<?php

session_start();

setlocale(LC_ALL, 'ru_RU.utf8');




if(isset($_GET['logout'])) {
	unset($_SESSION['logged']);

echo "<h2>Обновите страницу</h2>";
exit;
}


$login = 'httpscms/system/cfg/login.php';
include("httpscms/system/cfg/login.php"); 

$random1 = 'secret_key1';
$random2 = 'secret_key2';
$hash = md5($random1.$password.$random2); 


	if (isset($_SESSION['logged']) && $_SESSION['logged'] == $hash) { 
echo "Добро пожаловать";


} else {

echo '<meta http-equiv="Refresh" content="0; URL=httpscms/security/nd.php">';

exit;
}


if ($_GET['cmd']==ucash) {

$cash = glob('httpscms/security/temp/*'); // получаем список файлов в папке
array_map('unlink', $cash); // удаляем файлы


echo"<a href='cmd.php'><h2>Кэш очищен!</h2></a>"; 
exit( );

}

if ($_GET['cmd']==sqled) {


echo'<meta http-equiv="Refresh" content="0; URL=httpscms/scripts/phpminiadmin.php">'; 

exit( );

}






if ($_GET['cmd']==secinf) {


echo'<meta http-equiv="Refresh" content="0; URL=httpscms/security/ndinf.php">'; 
exit( );

}


		


if ($_GET['cmd']==dir) {
 

$directory = './';

$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

while($it->valid()) {

    if (!$it->isDot()) {

        echo '<br>Файла: ' . $it->getSubPathName() . "\n";
        echo 'Папка:     ' . $it->getSubPath() . "\n";
        echo'Выполнить: <a href="'.$it->key().'">'.$it->key().'</a>';          
        echo' - '; 
        echo'<a href="textolite/'.$it->key().'">Textolite</a><br>';          

 }

    $it->next();
}


echo "<a href='cmd.php'><h2>Новая команда</h2></a>";

exit( );

}


if ($_GET['cmd']==help) {

echo "<h2>Команды(выполнять в нижнем регистре)</h2>";
echo "..........................................................";
echo "<p>SEC - Сменить пароль</p>";
echo "..........................................................";
echo "<p>DIR - Все файлы</p>";
echo "..........................................................";
echo "<p>SQLED - PhpMiniAdmin for MySQL</p>";
echo "..........................................................";
echo "<p>SECINF - Журнал попыток неправомерного доступа </p>";
echo "..........................................................";
echo "<p>EXIT - выйти из системы</p>";
echo "..........................................................";
echo "<p>UCASH - Очистить кэш</p>";
echo "..........................................................";
echo "<p>CLS - Очистить экран</p>";
echo "..........................................................";
echo "<p>VER - О CMS</p>";
echo "..........................................................";




echo "<a href='cmd.php'><h2>Новая команда</h2></a>";

exit( );

}


if ($_GET['cmd']==sec) {

?>
<h2>Смена пароля</h2>
<dialog open>

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

</dialog>


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
<?

echo "<a href='cmd.php'><h2>Новая команда</h2></a>";

exit( );

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Командная строка HTTPS-CMS</title>
</head>
<body>
    <div id="console"></div>
    <input type="text" id="input" placeholder="Введите команду">
    <button onclick="executeCommand()">Выполнить</button>

<script src='httpscms/system/js/jquery-1.12.4.min.js'></script>

    <script>
        const consoleElement = document.getElementById("console");
        const inputElement = document.getElementById("input");
    logToConsole("Терминал управления HTTPS-CMS v 1.0");
    logToConsole("Copyleft Семенцул Максим 2024");
    logToConsole("Здравствуйте <?php echo $username; ?>");
    logToConsole("help - Справка");
  function executeCommand() {
            const command = inputElement.value.trim();
            logToConsole("> " + command);
            switch(command) {
                case "ucash":
                    logToConsole("Очистка кэша");
                    
                  window.location.replace("?cmd=ucash");
                   // Здесь можно добавить логику для выполнения команды dir
                    break;
                case "ver":
                    logToConsole("HTTPS-CMS ver: 1.0 CMD ver: 1.0 PHP ver: <?php echo phpversion(); ?>");
                    // Здесь можно добавить логику для выполнения команды cd
                    break;

                case "help":
                    logToConsole("Справка");
                    window.location.replace("?cmd=help");
                    // Здесь можно добавить логику для выполнения команды mkdir
                    break;

                case "exit":
                    logToConsole("Exit");
                    window.location.replace("cmd.php?logout=true");
                    // Здесь можно добавить логику для выполнения команды mkdir
                    break;

                case "cls":
                    logToConsole("Очистка экрана...");
                    window.location.replace("cmd.php");
                    // Здесь можно добавить логику для выполнения команды mkdir
                    break;

                case "sec":
                    logToConsole("Сменить пароль...");
                    window.location.replace("?cmd=sec");
                    // Здесь можно добавить логику для выполнения команды mkdir
                    break;


                case "dir":
                    logToConsole("Dir");
                    window.location.replace("?cmd=dir");
                    // Здесь можно добавить логику для выполнения команды mkdir
                    break;

                case "sqled":
                    logToConsole("sqled");
                    window.location.replace("?cmd=sqled");
                    // Здесь можно добавить логику для выполнения команды mkdir
                    break;

                case "secinf":
                    logToConsole("secinf");
                    window.location.replace("?cmd=secinf");
                    // Здесь можно добавить логику для выполнения команды mkdir
                    break;

                // Добавьте обработку других команд здесь...
                default:
                    logToConsole("Неизвестная команда.");
                    
            }
            inputElement.value = "";
        }

        function logToConsole(message) {
            consoleElement.innerHTML += message + "<br>";
            consoleElement.scrollTop = consoleElement.scrollHeight;
        }
    </script>
</body>
</html>
