<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Forum;
use \Bitrix\Main;

global $USER;
global $APPLICATION;

/**
 * @var $arParams;
 */

    //TODO: С помощью идентификатора и типа из параметров, достать идентификатор комментария и его contents
    // И затем передать в $arResult, чтобы потом отобразить его в шаблоне

$arResult['ID'] = $arParams['ID'];

$this->IncludeComponentTemplate();
