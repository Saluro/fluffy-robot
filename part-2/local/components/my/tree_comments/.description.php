<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentDescription = array(
    "NAME" => GetMessage("Древовидные комментарии"),
    "DESCRIPTION" => GetMessage("Добавляет на страницу возможность древовидного комментирования"),
    "PATH" => array(
        "ID" => "my",
        "CHILD" => array(
            "ID" => "tree_comments",
            "NAME" => "Древовидные комментарии"
        )
    ),
    "ICON" => "/images/icon.gif",
);
?>
