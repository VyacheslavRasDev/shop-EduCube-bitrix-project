<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php if (!empty($arResult)) { ?>
	<section class="section tab-hidden">
		<div class="container">
			<nav class="nav">
				<div class="nav__controls">
					<button class="button-burger" data-menu="button">
						<svg class="button-burger__icon">
							<use href="<?= DEFAULT_TEMPLATE_PATH?>/favicons/sprite.svg#icon-menu"></use>
						</svg>
					</button>
				</div>
				<?php foreach($arResult as $arItem) { ?>
				<a href="<?= $arItem["LINK"] ?>" class="nav__link">
					<?= $arItem["TEXT"] ?>
				</a>
				<?php } ?>
			</nav>
		</div>
	</section>
<?php } ?>