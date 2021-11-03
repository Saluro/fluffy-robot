<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Forum;
use \Bitrix\Main;

global $USER;
global $APPLICATION;

if (CModule::IncludeModule("iblock")) {

    // ORDER

    $IBLOCK_ID = 5;

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

    $resObjects = CIBlockElement::getList([], $filter, false, ["nPageSize"=>50], $select);

    $accumulator = [];

    while ($resItem = $resObjects->GetNextElement()) {
        array_push($accumulator, $resItem->GetFields());
    }

    $arResult["COMMENTS"] = $accumulator;

    $this->IncludeComponentTemplate();
} else {
    echo "Ошибка при подключении модуля инфоблоков";
}
