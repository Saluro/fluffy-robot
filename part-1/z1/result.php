<?php

if (isset($_POST["form-submit"])) {
    $set1 = "";
    $errText = "";

    $sep1 = $_POST["set-1-separator"];
    $sep2 = $_POST["set-2-separator"];

    $set1 = explode($sep1, $_POST["set-1"]);
    $set2 = explode($sep2, $_POST["set-2"]);

    $sort1 = $_POST["set-1-sort"];
    $sort2 = $_POST["set-2-sort"];

    $set1_sorted = $set1;
    $set2_sorted = $set2;
    $sort1 ? sort($set1_sorted) : rsort($set1_sorted);
    $sort2 ? sort($set2_sorted) : rsort($set2_sorted);

    $set1_shuffled = $set1;
    $set1_reverse = array_reverse($set1);
    shuffle($set1_shuffled);
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
    <label class="results-label set-1">Первое множество: <?php
        echo $_POST["set-1"]; ?></label>
    <label class="results-label set-2">Второе множество: <?php
        echo $_POST["set-2"];; ?></label>
    <hr>
    <label class="results-label set-1-size-label">Количество элементов в первом множестве: <?php
        echo count($set1); ?></label>
    <label class="results-label set-2-size-label">Количество элементов во втором множестве: <?php
        echo count($set2); ?></label>
    <label class="results-label set-1-sorted-label">Отсортированное первое множество: <?php
        echo implode(", ", $set1_sorted); ?></label>
    <label class="results-label set-2-sorted-label">Отсортированное второе множество: <?php
        echo implode(", ", $set2_sorted); ?></label>
    <label class="results-label set-1-max-label">Максимальный элемент первого множества: <?php
        echo max($set1); ?></label>
    <label class="results-label set-2-max-label">Максимальный элемент второго множества: <?php
        echo max($set2); ?></label>
    <label class="results-label set-1-min-label">Минимальный элемент первого множества: <?php
        echo min($set1); ?></label>
    <label class="results-label set-2-min-label">Минимальный элемент второго множества: <?php
        echo min($set2); ?></label>
    <label class="results-label set-intersection-label">Пересечение множеств: <?php
        echo implode(", ", array_intersect($set1, $set2)); ?></label>
    <label class="results-label set-difference-label">Разница множеств: <?php
        echo implode(", ", array_diff($set1, $set2)); ?></label>
    <label class="results-label set-1-reversed-label">Первое множество в обратном порядке: <?php
        echo implode(", ", $set1_reverse); ?></label>
    <label class="results-label set-2-multiplication-label">Произведение элементов второго множества: <?php
        echo array_product($set2); ?></label>
    <label class="results-label set-1-shuffled-label">Значения первого множества, перемешанные в случайном
        порядке: <?php
        echo implode(", ", $set1_shuffled); ?></label>
</fieldset>

</body>

</html>
