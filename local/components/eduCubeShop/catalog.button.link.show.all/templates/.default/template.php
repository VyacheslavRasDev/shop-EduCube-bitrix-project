<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
?>
<a href="<?= $arResult["LINK_DIRECTORY"] ?>" class="article-category__button">
<span>
<?= $arResult["NAME_LINK"] ?>
</span>
	<svg>
		<use href="<?= DEFAULT_TEMPLATE_PATH ?><?= $arResult["LINK"] ?>#<?= $arResult["SPRITE_PATH"] ?>"></use>
	</svg>
</a>