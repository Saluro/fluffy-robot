<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */

var_dump($arResult["COMMENTS"]);

?><hr><?php

// Как-то парсить комментарии и ответы на них по массивам?

foreach ($arResult["COMMENTS"] as $item) {
    if ($item["PROPERTY_PARENT_ID_VALUE"] == 0) {
    ?>
    <fieldset class="root-comment">
        <legend><?php echo $item["NAME"]; ?></legend>
        <p><?php echo $item["DETAIL_TEXT"]; ?></p>
        <?php
        foreach ($arResult["COMMENTS"] as $child) {
            if ($child["PROPERTY_PARENT_ID_VALUE"] == $item["ID"]) {
            ?>
                <fieldset class="child_comment">
                    <legend><?php echo $child["NAME"]; ?></legend>
                    <p><?php echo $child["DETAIL_TEXT"]; ?></p>
                </fieldset>
        <?php }} ?>
    </fieldset>
    <?php } ?>
<?php } ?>
