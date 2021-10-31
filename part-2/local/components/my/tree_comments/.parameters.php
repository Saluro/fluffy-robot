<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentParameters = array(
	"GROUPS" => array(),
	"PARAMETERS" => array(
		"TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => "Тип объекта для комментирования (страница или инфоблок)",
			"TYPE" => "STRING",
			"MULTIPLE" => "N",
			"DEFAULT" => "PAGE",
		),
		"ID" => array(
			"PARENT" => "BASE",
			"NAME" => "Идентификатор комментируемого объекта",
			"TYPE" => "STRING",
			"MULTIPLE" => "N",
		),
	),
);
?>
