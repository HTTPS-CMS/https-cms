HTTPS-CMS - Простая, многофункциональная оконная система для редактирования и разработки лендингов,
обеспечивающий управление контентом веб-сайта через защищенное соединение по протоколу HTTPS.
Она предоставляет администраторам возможность управлять различными аспектами веб-сайта, такими как создание, редактирование и удаление контента,
, настройка дизайна и функциональности сайта, а также мониторинг и анализ статистики.

HTTPS-CMS представляет собой систему объединяющую инструменты сторонних разработчиков в удобном оконном интерфейсе
и позволяющую безопасно использовать инструменты без необходимости вводить пароль от каждого инструмента, благодаря центральной системе авторизации.

![screenshot](https://raw.githubusercontent.com/Windows-Mining-Edition/https-cms/main/screenshots/view.png)

Официальный сайт HTTPS-CMS: https://https-cms.ru/

Данная система поставляется с такими инструментами как:
1)Textolite
2)PhpMiniAdmin for MySQL
3)CMSLAND
4)PHP File Manager


Плюсы:
1)Не требует SQL
2)Можно подключить авторизацию через HTTPS-CMS, на страницах сайта, предназначенных только для администрации. Пример:
```
<?php
session_start();

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
```

Попытки доступа 3-х лиц, к  страницам настроенным на авторизацию через HTTPS-CMS,
как и внутренним страницам системы будут фиксироваться в журнале попыток неправомерного доступа, открыть который можно выполнив в терминале команду secinf.

Для очистки журнала попыток неправомерного доступа, достаточно выполнить команду очистки кэша ucash.







Дополнительно:
1)Есть возможность смены обоев, для нескучной разработки
2)Можно установить свои курсоры
3)Можно кастомизировать систему для установки других инструментов
