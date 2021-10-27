<?php ?>

<html lang="ru">

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Задание 1</title>
</head>

<body>

<form method="post" action="result.php">
    <div class="set-1-block">
        <input name="set-1" type="text" placeholder="Множество 1">
        <div>
            <label class="set-1-sort-label" for="set-1-sort">Сортировка: </label>
            <select name="set-1-sort">
                <option value=1>По возрастанию</option>
                <option selected value=0>По убыванию</option>
            </select>
        </div>
        <div>
            <label class="set-1-separator-label" for="set-1-separator">Разделитель: </label>
            <select name="set-1-separator">
                <option selected value=",">Запятая (,)</option>
                <option value=";">Точка с запятой (;)</option>
                <option value="-">Тире (-)</option>
                <option value=" ">Пробел ( )</option>
            </select>
        </div>
    </div>

    <div class="set-2-block">
        <input name="set-2" type="text" placeholder="Множество 2">
        <div>
            <label class="set-2-sort-label" for="set-2-sort">Сортировка: </label>
            <select name="set-2-sort">
                <option value=1>По возрастанию</option>
                <option selected value=0>По убыванию</option>
            </select>
        </div>
        <div>
            <label class="set-2-separator-label" for="set-2-separator">Разделитель: </label>
            <select name="set-2-separator">
                <option selected value=",">Запятая (,)</option>
                <option value=";">Точка с запятой (;)</option>
                <option value="-">Тире (-)</option>
                <option value=" ">Пробел ( )</option>
            </select>
        </div>
    </div>

    <input class="form-submit" name="form-submit" type="submit" value="Рассчитать">
</form>

</body>

</html>
