<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Forum;
use \Bitrix\Main;

global $USER;
global $APPLICATION;

if (CModule::IncludeModule("iblock")) {

    $arResult['jij'] = $APPLICATION->GetPageProperty("is_static");

    if ($APPLICATION->GetPageProperty("is_static")) {

        $IBLOCK_ID = 5;

        $filter = ['IBLOCK_ID' => $IBLOCK_ID];
        $select = ['*', 'PROPERTY_PARENT_ID'];

        $resObjects = CIBlockElement::getList([], $filter, false, ["nPageSize"=>50], $select);

        $accumulator = [];

        while ($resItem = $resObjects->GetNextElement()) {
            array_push($accumulator, $resItem->GetFields());
        }

        $arResult["COMMENTS"] = $accumulator;
    }

    $this->IncludeComponentTemplate();
} else {
    echo "Ошибка при подключении модуля инфоблоков";
}
