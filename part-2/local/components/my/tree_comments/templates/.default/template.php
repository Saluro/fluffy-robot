<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */

//var_dump($arResult["COMMENTS"]);

?><hr><?php

function renderBranch($comment, $arResult): string
{

    $rendered = "";
    foreach ($arResult["COMMENTS"] as $item) {
        if ($item["PROPERTY_PARENT_ID_VALUE"] == $comment["ID"]) {
            $rendered .= renderBranch($item, $arResult);
        }
    }

    return  '<fieldset class="child_comment">
                    <legend>'.$comment["NAME"]." ".$comment["DATE_ACTIVE_FROM"].'</legend>
                    <p>'.$comment["DETAIL_TEXT"].'</p>
                    '.$rendered.'
                </fieldset>';

}

echo renderBranch(['ID' => '0', 'NAME' => "Комментарии"], $arResult);
//(array_map(fn($item) => renderBranch($item, $arResult), array_filter($arResult["COMMENTS"], fn($item) => ($item["PROPERTY_PARENT_ID_VALUE"] == $comment["ID"]))))
?>
