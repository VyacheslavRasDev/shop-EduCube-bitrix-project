<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>

<?php if (!empty($arResult)) { ?>
	<div class="header-grid__nav">
		<nav class="header-nav header-nav--regular">
			<?php foreach ($arResult as $arItem) { ?>
				<a href="<?= $arItem["LINK"] ?>" class="header-nav__link">
					<?= $arItem["TEXT"] ?>
				</a>
			<?php } ?>
		</nav>
	</div>
<?php } ?>
