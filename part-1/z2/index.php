<?php

require_once("db_singleton.php");

//$deleteID = $_POST['deleteID'];

$host = 'localhost';
$db_name = 'z2_db';
$db_login = 'root';
$db_pass = 'root';
$charset = 'utf8';

$query = "DELETE FROM info_long WHERE id=1";

$DB = db_singleton::getInstance();

//$DB->initializeConnection($host, $db_name, $db_login, $db_pass, $charset);

//$stmt = $DB->__call('query', [$query]);

?>

<html lang="ru">

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Задание 1</title>
</head>

<body>

<form method="post" action="result.php">

    <div class="row1">
        <label class="file-1-label" for="file-1-input">Файл 1:</label>
        <input name="file-1" type="file" accept=".csv" value="Загрузить">
    </div>
    <div class="row2">
        <label class="file-2-label" for="file-2-input">Файл 2:</label>
        <input name="file-2" type="file" accept=".csv" value="Загрузить">
    </div>

    <input class="form-submit" name="form-submit" type="submit" value="Рассчитать">
</form>

</body>

</html>
