<?php

require_once "db_singleton.php";

$host = 'localhost';
$db_name = 'z2_db';
$db_login = 'root';
$db_pass = 'root';
$charset = 'utf8';

$DB = db_singleton::getInstance();

$DB->initializeConnection($host, $db_name, $db_login, $db_pass, $charset);

$query = "SELECT h_ip, h_browser, h_os, sel2.r_url_to, sel2.maxtime, sel2.r_url_from, sel2.mintime, sel2.dif, sel3.count
FROM info_short
left JOIN
((select max2.r_ip, TIMESTAMPDIFF(SECOND, min2.mintime, max2.maxtime) as dif, max2.r_url_to, max2.maxtime, min2.r_url_from, min2.mintime from  (SELECT max1.r_ip, infomax.r_url_to, max1.maxtime 
FROM (select r_ip, max(TIMESTAMP(r_date, r_time)) as maxtime 
from info_long group by r_ip) max1, info_long infomax 
where max1.r_ip=infomax.r_ip and max1.maxtime=(TIMESTAMP(infomax.r_date, infomax.r_time))) max2,

(SELECT min1.r_ip, infomin.r_url_from, min1.mintime 
FROM (select r_ip, min(TIMESTAMP(r_date, r_time)) as mintime 
from info_long group by r_ip) min1, info_long infomin 
where min1.r_ip=infomin.r_ip and min1.mintime=(TIMESTAMP(infomin.r_date, infomin.r_time))) min2
 where max2.r_ip=min2.r_ip)) sel2 
 on sel2.r_ip=info_short.h_ip 
left join 
(select DISTINCT r_ip, count(r_url_to) as count from
((SELECT r_ip, r_url_to FROM info_long) 
union
(SELECT r_ip,  r_url_from  FROM info_long)order by r_ip) t1
group by r_ip) sel3 
on sel3.r_ip=info_short.h_ip
WHERE h_id IN (SELECT MAX(inn.h_id)
               FROM info_short inn
               GROUP BY inn.h_ip)";

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
            <th>ip</th>
            <th>Браузер</th>
            <th>ОС</th>
            <th>URL From</th>
            <th>URL To</th>
            <th>Первая дата входа</th>
            <th>Последняя дата входа</th>
            <th>Разница между датами (дней)</th>
        </tr>
    </thead>
    <tbody>
    <?php
    while ($line = $stmt->Fetch()) {
        echo '<tr>';
            echo '<td>';
                echo $line["h_ip"];
            echo '</td>';
            echo '<td>';
                echo $line["h_browser"];
            echo '</td>';
            echo '<td>';
                echo $line["h_os"];
            echo '</td>';
            echo '<td>';
                echo $line["r_url_from"];
            echo '</td>';
            echo '<td>';
                echo $line["r_url_to"];
            echo '</td>';
            echo '<td>';
                echo $line["mintime"];
            echo '</td>';
            echo '<td>';
                echo $line["maxtime"];
            echo '</td>';
            echo '<td>';
                echo round($line["dif"]/84600);
            echo '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>

</body>

</html>
