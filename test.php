<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>

<? $APPLICATION->IncludeComponent(
	"bitrix:menu",
	"main_menu",
	[
		"ALLOW_MULTI_SELECT"    => "N",
		"CHILD_MENU_TYPE"       => "main",
		"DELAY"                 => "N",
		"MAX_LEVEL"             => "1",
		"MENU_CACHE_GET_VARS"   => [
			0 => "",
		],
		"MENU_CACHE_TIME"       => "3600",
		"MENU_CACHE_TYPE"       => "N",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE"        => "main",
		"USE_EXT"               => "N"
	],
	false
); ?>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>