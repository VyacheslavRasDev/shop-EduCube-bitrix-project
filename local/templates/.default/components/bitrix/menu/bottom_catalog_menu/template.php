<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>

<?php if (!empty($arResult)) { ?>
	<div class="links-column__stack">
		<?php foreach ($arResult as $arItem) { ?>
		<a href="<?= $arItem["LINK"] ?>" class="link-footer">
			<?= $arItem["TEXT"] ?>
		</a>
		<?php } ?>
	</div>
<?php } ?>