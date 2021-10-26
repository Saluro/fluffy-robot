<html lang="ru">

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Задание 1</title>
</head>

<body>

<form method="post" action="result.php">

    <div class="row1">
        <label class="file-1-label" for="file-1-input">Файл 1:</label>
        <input name="set-1" type="file" accept=".csv" value="Загрузить">
    </div>
    <div class="row2">
        <label class="file-2-label" for="file-2-input">Файл 2:</label>
        <input name="set-2" type="file" accept=".csv" value="Загрузить">
    </div>

    <input class="form-submit" name="form-submit" type="submit" value="Рассчитать">
</form>

</body>

</html>
