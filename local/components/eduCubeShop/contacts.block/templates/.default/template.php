<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

?>

<div class="header-grid__contacts">
	<div class="header-contacts header-contacts--main">
		<a href="tel:<?= $arResult["PHONE_LINK"] ?? "Телефон компании" ?>" class="header-contacts__link">
			<?= $arResult["PHONE_NUMBER"] ?? "Телефон компании" ?>
		</a>
		<a href="mailto:<?= $arResult["EMAIL"] ?? "Почта" ?>" class="header-contacts__link header-contacts__link--accent">
			<?= $arResult["EMAIL"] ?? "Почта" ?>
		</a>
	</div>
</div>