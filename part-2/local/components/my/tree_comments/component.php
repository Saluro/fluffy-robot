<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Forum;
use \Bitrix\Main;

global $USER;
global $APPLICATION;

if (CModule::IncludeModule("iblock")) {
    // ORDER
    // FIO IZ authorized

    $arResult["TARGET_TYPE"] = $arParams["TARGET_TYPE"];
    $arResult["TARGET"] = $arParams["TARGET"];

//    var_dump($arResult);
//
//    echo "<hr>";
//
//    var_dump($arParams);
//
//    echo "<hr>";

    $IBLOCK_ID = 5;

    /// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

//    /*запись данных в инфоблок*/
//    $arLoadProductArray = Array( "MODIFIED_BY" => $USER->GetID(),
//        "IBLOCK_SECTION_ID" => false,
//        "IBLOCK_ID" => $IBLOCK_ID,
//        "NAME" => $USER->GetFullName(),
//        "ACTIVE_FROM" => date("d.m.Y"),
//        "ACTIVE" => "Y",
//        "DETAIL_TEXT" => $_REQUEST["COM"]["CONTENT"],
//        "PROPERTY_VALUES" => [
//            "11" => $_REQUEST["COM"]["PARENT"],
//            "9" => $arParams["TARGET_TYPE"],
//            "10" => $arParams["TARGET"]
//        ]
//    );
//
//    var_dump($_REQUEST);
//
//    $element = new CIBlockElement();
//
//    if ($element->Add($arLoadProductArray)) {
//        echo "Добавление произошло успешно";
//    } else {
//        echo "Ошибка!".$element->LAST_ERROR;
//    }

    /// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if ($arParams["TARGET_TYPE"]) {
        $filter = [
            'IBLOCK_ID' => $IBLOCK_ID,
            '=PROPERTY_TARGET_ID' => $APPLICATION->GetCurPage()
        ];
    } elseif (!$arParams["TARGET_TYPE"]) {
        $filter = [
            'IBLOCK_ID' => $IBLOCK_ID,
            '=PROPERTY_TARGET_ID' => $arParams["TARGET"]
        ];
    }

    $select = ['*', 'PROPERTY_PARENT_ID'];

    $resObjects = CIBlockElement::getList(["ACTIVE_FROM" => "ASC"], $filter, false, ["nPageSize" => 50], $select);

    $accumulator = [];

    while ($resItem = $resObjects->GetNextElement()) {
        array_push($accumulator, $resItem->GetFields());
    }

    $arResult["COMMENTS"] = $accumulator;


    $this->IncludeComponentTemplate();
} else {
    echo "Ошибка при подключении модуля инфоблоков";
}
