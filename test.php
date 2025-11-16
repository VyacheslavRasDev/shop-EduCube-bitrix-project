<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>

<?php $APPLICATION->IncludeComponent(
	"eduCubeShop:contacts.block", 
	".default", 
	[
		"PHONE_TEXT" => "+7 (902) 416-34-28",
		"EMAIL" => "ablazeyang@yandex.ru",
		"COMPONENT_TEMPLATE" => ".default",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => ""
	],
	false
); ?>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>