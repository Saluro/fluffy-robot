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

    $respond = $comment["ID"] == 1 ? "" : "<input class=\"respond-button\" id=\"{$comment["ID"]}\" type=\"button\" value=\"Ответить\">";

    return  '<fieldset class="child_comment">
                    <legend>'.$comment["NAME"]." ".$comment["DATE_ACTIVE_FROM"].'</legend>
                    <p>'.$comment["DETAIL_TEXT"].'</p><br>
                    '.$respond.'
                    '.$rendered.'
                </fieldset>';

}

?>

<form id="com_form" method="post" action="<?=POST_FORM_ACTION_URI?>" name="comform" enctype="multipart/form-data">
    <?php if($arResult["BACKURL"] <> ''): ?>
        <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
    <?php endif; ?>

    <input type="hidden" id="TARGET_TYPE" value="<?=$arResult["TARGET_TYPE"]?>">
    <input type="hidden" id="TARGET" value="<?=$arResult["TARGET"]?>">
    <input type="hidden" id="USER_ID" value="<?=$USER->GetID();?>">
    <input type="hidden" id="USER_NAME" value="<?=$USER->GetFullName();?>">

    <input <?php echo $USER->IsAuthorized() ? "disabled" : "" ?> type="text" id="NAME" name="COM[NAME]" placeholder="Ваше имя" value="<?php echo $USER->GetFullName(); ?>">
    <br>
    <input type="text" disabled id="PARENT" name="COM[PARENT]" value="1"><br>
    <input type="text" id="CONTENT" name="COM[CONTENT]" placeholder="Оставьте комментарий..."><br>
    <input type="submit" value="Отправить комментарий"><br>
</form>

<div id="comments-container">
<?php

echo renderBranch(['ID' => '1', 'NAME' => "Комментарии"], $arResult);

//(array_map(fn($item) => renderBranch($item, $arResult), array_filter($arResult["COMMENTS"], fn($item) => ($item["PROPERTY_PARENT_ID_VALUE"] == $comment["ID"]))))
?>
</div>
