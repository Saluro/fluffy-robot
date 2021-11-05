<?php

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Forum;
use \Bitrix\Main;

//global $USER;
global $APPLICATION;

$errors = [];
$data = [];
$IBLOCK_ID = 5;

function renderBranch($comment, $comments): string
{

    $rendered = "";
    foreach ($comments as $item) {
        if ($item["PROPERTY_PARENT_ID_VALUE"] == $comment["ID"]) {
            $rendered .= renderBranch($item, $comments);
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

if (empty($_POST['NAME'])) {
    $errors['NAME'] = 'Name is required.';
}

if (!isset($_POST['PARENT'])) {
    $errors['PARENT'] = 'Parent id is required.';
}

if (empty($_POST['CONTENT'])) {
    $errors['CONTENT'] = 'Content is required.';
}

if (empty($_POST['TARGET'])) {
    $errors['TARGET'] = 'Target is required.';
}

if (!isset($_POST['TARGET_TYPE'])) {
    $errors['TARGET_TYPE'] = 'Target type is required.';
}

if (empty($_POST['USER_NAME'])) {
    $errors['USER_NAME'] = 'User name is required.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';

    if (CModule::IncludeModule("iblock")) {

        /// ////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /*запись данных в инфоблок*/
        $arLoadProductArray = array(
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID" => $IBLOCK_ID,
            "NAME" => htmlspecialchars($_POST["USER_NAME"]),
            "ACTIVE_FROM" => date( "d.m.Y H:i:s" ),
            "ACTIVE" => "Y",
            "DETAIL_TEXT" => htmlspecialchars($_POST["CONTENT"]),
            "PROPERTY_VALUES" => [
                "11" => htmlspecialchars($_POST["PARENT"]),
                "9" => htmlspecialchars($_POST["TARGET_TYPE"]),
                "10" => htmlspecialchars($_POST["TARGET"])
            ]
        );

        $element = new CIBlockElement();

        $element->Add($arLoadProductArray);
        /// ////////////////////////////////////////////////////////////////////////////////////////////////////////////

        /*Вывод новой информации в инфоблок*/
        $filter = [
            'IBLOCK_ID' => $IBLOCK_ID,
            '=PROPERTY_TARGET_ID' => $_POST["TARGET"]
        ];

        $select = ['*', 'PROPERTY_PARENT_ID'];

        $resObjects = CIBlockElement::getList(["ACTIVE_FROM" => "ASC"], $filter, false, ["nPageSize" => 50], $select);

        $accumulator = [];

        while ($resItem = $resObjects->GetNextElement()) {
            array_push($accumulator, $resItem->GetFields());
        }

        $data["newhtml"] = renderBranch(["ID" => 1, "NAME" => "Комментарии"], $accumulator);

    }

}



echo json_encode($data);
