<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Main\Application;

define("DEFAULT_TEMPLATE_PATH", "/local/templates/.default");
include_once Application::getDocumentRoot() . DEFAULT_TEMPLATE_PATH . "/init.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<?php $APPLICATION->ShowHead(); ?>
	<title><?php $APPLICATION->ShowTitle(); ?></title>
</head>
<body class="body body--white body--front">
	<div id="panel">
		<?php $APPLICATION->ShowPanel(); ?>
	</div>

						