<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?php if (!empty($arResult["ITEMS"])){ ?>
<div class="main__section mb-60 mbm-25">
	<section class="section">
		<div class="container">
			<?php foreach ($arResult["ITEMS"] as $arItem) { ?>
				<?php
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
				?>
				<article class="promo promo--large bg-green"
				         id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
					<div class="promo__header">
						<h2 class="title title--regular">
							<?= $arItem["PREVIEW_TEXT"] ?? $arItem["NAME"] ?>
						</h2>
					</div>
					<div class="promo__content">
						<div class="editor editor--promo">
							<?= $arItem["DETAIL_TEXT"] ?? "" ?>
						</div>
						<div class="promo__control">
							<a href="<?= $arItem["PROPERTIES"]["BUTTON_LINK"]["VALUE"] ?? "#" ?>" class="button button--middle button--blue-invert button__text">
								<?= $arItem["PROPERTIES"]["BUTTON_TEXT"]["VALUE"] ?? "Перейти" ?>
							</a>
						</div>
					</div>
					<div class="promo__footer">
						<img src="<?= CFile::GetPath($arItem["PROPERTIES"]["LOGO_IMAGE"]["VALUE"]);?>" alt="<?=$arItem["NAME"]?>">
					</div>
					<div class="promo__age">
						<div class="age age__text">
							<?= html_entity_decode($arItem["PROPERTIES"]["AGE_TEXT"]["VALUE"]["TEXT"]);?>
						</div>
					</div>
					<picture class="promo__picture">
						<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?? "PUT IMAGE" ?>" alt="<?=$arItem["NAME"]?>">
					</picture>
				</article>
			<?php } ?>
		</div>
	</section>
</div>
<?php } ?>




