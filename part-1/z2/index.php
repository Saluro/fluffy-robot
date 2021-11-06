<?php

?>

<html lang="ru">

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Задание 2</title>
</head>

<body>

<form enctype="multipart/form-data" method="post" action="add.php">

    <div class="row1">
        <label class="file-1-label" for="file-1-input">Файл 1:</label>
        <input name="file-1" type="file" accept=".csv" value="Загрузить">
        <label class="sep-1-label" for="sep-1">Разделитель:</label>
        <select name="sep-1">
            <option selected value=",">Запятая (,)</option>
            <option value=";">Точка с запятой (;)</option>
        </select>
    </div>
    <div class="row2">
        <label class="file-2-label" for="file-2-input">Файл 2:</label>
        <input name="file-2" type="file" accept=".csv" value="Загрузить">
        <label class="sep-2-label" for="sep-2">Разделитель:</label>
        <select name="sep-2">
            <option selected value=",">Запятая (,)</option>
            <option value=";">Точка с запятой (;)</option>
        </select>
    </div>

    <input class="form-submit" name="form-submit" type="submit" value="Рассчитать">
</form>

</body>

</html>
