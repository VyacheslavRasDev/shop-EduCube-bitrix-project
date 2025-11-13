<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>

<?php $APPLICATION->IncludeComponent(
	"bitrix:menu",
	"",
	[
		"ALLOW_MULTI_SELECT"    => "N",
		"CHILD_MENU_TYPE"       => "global",
		"DELAY"                 => "N",
		"MAX_LEVEL"             => "1",
		"MENU_CACHE_GET_VARS"   => [""],
		"MENU_CACHE_TIME"       => "3600",
		"MENU_CACHE_TYPE"       => "N",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE"        => "left",
		"USE_EXT"               => "N"
	]
); ?>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>