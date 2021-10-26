<?php
if (isset($_POST["form-submit"])) {
    $set1 = "";
    $errText = "";

    $sep1 = $_POST["set-1-separator"];
    $sep2 = $_POST["set-2-separator"];

    $set1 = explode($sep1, $_POST["set-1"]);
    $set2 = explode($sep2, $_POST["set-2"]);

//    try {
//
//    } catch (Exception $e) {
//        $errText = "Вы некорректно указали одно из множеств";
//    }


}
?>

<html lang="ru">

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Задание 1</title>
</head>

<body>

<a href="index.php">Назад</a>

<fieldset class="results-fieldset">
    <legend class="results-legend">Результаты</legend>
    <label class="results-label set-1">Первое множество: <?php echo $_POST["set-1"]; ?></label>
<label class="results-label set-2">Второе множество: <?php echo $_POST["set-2"];; ?></label>
<hr>
<label class="results-label set-1-size-label">Количество элементов в первом множестве: <?php //переменная, рассчитанная выше?></label>
<label class="results-label set-2-size-label">Количество элементов во втором множестве: <?php //переменная, рассчитанная выше?></label>
<label class="results-label set-1-sorted-label">Отсортированное первое множество: <?php //переменная, рассчитанная выше?></label>
<label class="results-label set-2-sorted-label">Отсортированное второе множество: <?php //переменная, рассчитанная выше?></label>
<label class="results-label set-1-max-label">Максимальный элемент первого множества: <?php //переменная, рассчитанная выше?></label>
<label class="results-label set-2-max-label">Максимальный элемент второго множества: <?php //переменная, рассчитанная выше?></label>
<label class="results-label set-1-min-label">Минимальный элемент первого множества: <?php //переменная, рассчитанная выше?></label>
<label class="results-label set-2-min-label">Минимальный элемент второго множества: <?php //переменная, рассчитанная выше?></label>
<label class="results-label set-intersection-label">Пересечение множеств: <?php //переменная, рассчитанная выше?></label>
<label class="results-label set-difference-label">Разница множеств: <?php //переменная, рассчитанная выше?></label>
<label class="results-label set-1-reversed-label">Первое множество в обратном порядке: <?php //переменная, рассчитанная выше?></label>
<label class="results-label set-2-multiplication-label">Произведение элементов второго множества: <?php //переменная, рассчитанная выше?></label>
<label class="results-label set-1-shuffled-label">Значения первого множества, перемешанные в случайном порядке: <?php //переменная, рассчитанная выше?></label>
</fieldset>

</body>

</html>
