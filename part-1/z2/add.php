<?php

if (isset($_POST["form-submit"])) {
    require_once("db_singleton.php");

    if ($_FILES['file-1']['error'] == UPLOAD_ERR_OK
        && $_FILES['file-2']['error'] == UPLOAD_ERR_OK
        && is_uploaded_file($_FILES['file-1']['tmp_name'])
        && is_uploaded_file($_FILES['file-2']['tmp_name'])) {
        $host = 'localhost';
        $db_name = 'z2_db';
        $db_login = 'root';
        $db_pass = 'root';
        $charset = 'utf8';

        $file1 = fopen($_FILES['file-1']['tmp_name'], "r");
        $file2 = fopen($_FILES['file-2']['tmp_name'], "r");

        $file1_iterator = fgetcsv($file1, 1000, ",");
        $file2_iterator = fgetcsv($file2, 1000, ",");

        $file1_data_array = [];
        $file2_data_array = [];

        while ($data = fgetcsv($file1, 1000, ",")) {
            array_push($file1_data_array, $data);
        }

        while ($data = fgetcsv($file2, 1000, ",")) {
            array_push($file2_data_array, $data);
        }

        fclose($file1);
        fclose($file2);

        $DB = db_singleton::getInstance();

        $DB->initializeConnection($host, $db_name, $db_login, $db_pass, $charset);

        foreach ($file1_data_array as $item) {
            $itemData = explode(";", $item[0]);

            $query = "INSERT INTO info_long (r_ip, r_date, r_time, r_url_from, r_url_to) VALUES ('{$itemData[0]}', '{$itemData[1]}', '{$itemData[2]}', '{$itemData[3]}', '{$itemData[4]}')";

            $stmt = $DB->__call('query', [$query]);
        }

        foreach ($file2_data_array as $item) {
            $itemData = explode(";", $item[0]);

            $query = "INSERT INTO info_short (h_ip, h_browser, h_os) VALUES ('{$itemData[0]}', '{$itemData[1]}', '{$itemData[2]}')";

            $stmt = $DB->__call('query', [$query]);
        }

        header("Location: result.php");
    } else {
        ?>
        <html lang="ru">

        <head>
            <link rel="stylesheet" type="text/css" href="styles.css">
            <title>Задание 1</title>
        </head>

        <body>
            <h1 class="error-text">Произошла ошибка при обработке файлов. <br>Загрузите, пожалуйста, все файлы и убедитесь в том, что они содержат корректные данные</h1>
        </body>

        </html>
        <?php
    }
} else {
    ?>
    <html lang="ru">

    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Задание 1</title>
    </head>

    <body>
        <h1 class="error-text">Переход на эту страницу не стоит совершать вручную</h1>
    </body>

    </html>
    <?php
}
?>
</body>

</html>
