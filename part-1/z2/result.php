<?php
$host = 'localhost';
$db_name = 'z2_db';
$db_login = 'root';
$db_pass = 'root';
$charset = 'utf8';

$DB = db_singleton::getInstance();

$DB->initializeConnection($host, $db_name, $db_login, $db_pass, $charset);

$query = "INSERT INTO info_short (h_ip, h_browser, h_os) VALUES ('{$itemData[0]}', '{$itemData[1]}', '{$itemData[2]}')";

$stmt = $DB->__call('query', [$query]);
?>

<html lang="ru">

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Задание 2</title>
</head>

<body>

<a href="index.php">Назад</a>

<table>
    <thead>
        <tr>
            <th>Первая колонка</th>
            <th>Вторая колонка</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                Первая колонка
            </td>
            <td>
                Вторая колонка
            </td>
        </tr>
        <tr>
            <td>
                Первая колонка
            </td>
            <td>
                Вторая колонка
            </td>
        </tr>
    </tbody>
</table>

</body>

</html>
