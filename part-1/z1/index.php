<?php
//Рассчёты
?>

<html lang="ru">

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Задание 1</title>
</head>

<body>

<form method="post" action="index.php">
    <div class="set-1-block">
        <input id="set-1" type="text" placeholder="Множество 1">
        <div>
            <label class="set-1-sort-label" for="set-1-sort">Сортировка: </label>
            <select id="set-1-sort">
                <option value=1>По возрастанию</option>
                <option selected value=0>По убыванию</option>
            </select>
        </div>
        <div>
            <label class="set-1-separator-label" for="set-1-separator">Разделитель: </label>
            <select id="set-1-separator">
                <option selected value=",">Запятая (,)</option>
                <option value=";">Точка с запятой (;)</option>
                <option value="-">Тире (-)</option>
            </select>
        </div>
    </div>

    <div class="set-2-block">
        <input id="set-2" type="text" placeholder="Множество 2">
        <div>
            <label class="set-2-sort-label" for="set-2-sort">Сортировка: </label>
            <select id="set-2-sort">
                <option value=1>По возрастанию</option>
                <option selected value=0>По убыванию</option>
            </select>
        </div>
        <div>
            <label class="set-2-separator-label" for="set-2-separator">Разделитель: </label>
            <select id="set-2-separator">
                <option selected value=",">Запятая (,)</option>
                <option value=";">Точка с запятой (;)</option>
                <option value="-">Тире (-)</option>
            </select>
        </div>
    </div>

    <input class="form-submit" type="submit" value="Рассчитать">
</form>

<?//Если _POST не пустой?>
<fieldset class="results-fieldset">
    <legend class="results-legend">Результаты</legend>
    <label class="results-label set-1-size-label">Количество элементов в первом множестве: <?//переменная, рассчитанная выше?></label>
    <label class="results-label set-2-size-label">Количество элементов во втором множестве: <?//переменная, рассчитанная выше?></label>
    <label class="results-label set-1-sorted-label">Отсортированное первое множество: <?//переменная, рассчитанная выше?></label>
    <label class="results-label set-2-sorted-label">Отсортированное второе множество: <?//переменная, рассчитанная выше?></label>
    <label class="results-label set-1-max-label">Максимальный элемент первого множества: <?//переменная, рассчитанная выше?></label>
    <label class="results-label set-2-max-label">Максимальный элемент второго множества: <?//переменная, рассчитанная выше?></label>
    <label class="results-label set-1-min-label">Минимальный элемент первого множества: <?//переменная, рассчитанная выше?></label>
    <label class="results-label set-2-min-label">Минимальный элемент второго множества: <?//переменная, рассчитанная выше?></label>
    <label class="results-label set-intersection-label">Пересечение множеств: <?//переменная, рассчитанная выше?></label>
    <label class="results-label set-difference-label">Разница множеств: <?//переменная, рассчитанная выше?></label>
    <label class="results-label set-1-reversed-label">Первое множество в обратном порядке: <?//переменная, рассчитанная выше?></label>
    <label class="results-label set-2-multiplication-label">Произведение элементов второго множества: <?//переменная, рассчитанная выше?></label>
    <label class="results-label set-1-shuffled-label">Значения первого множества, перемешанные в случайном порядке: <?//переменная, рассчитанная выше?></label>
</fieldset>
<?//}?>

</body>

</html>

<?php
//Очистить $_POST
?>
