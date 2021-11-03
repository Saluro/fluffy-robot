<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentParameters = array(
	"GROUPS" => array(),
	"PARAMETERS" => [
		"TARGET_TYPE" => [
			"NAME" => "Тип объекта",
			"MULTIPLE" => "N",
			"TYPE" => "LIST",
			"VALUES" => ["Элемент инфоблока", "Страница"],
			"ADDITIONAL_VALUES" => "N",
			"DEFAULT" => "PAGE"
		],
		"TARGET" => [
			"NAME" => "Объект комментирования",
			"TYPE" => "STRING",
			"DEFAULT" => "/",
			"PLACEHOLDER" => "Для страницы укажите адрес"
		]
	]
);
?>
