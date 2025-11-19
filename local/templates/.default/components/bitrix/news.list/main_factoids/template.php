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
<?php
//echo '<pre>';
//print_r($arResult["ITEMS"]);
//echo '<pre>';
//?>

<?php if (!empty($arResult["ITEMS"])) { ?>
	<div class="main__section mb-180 mbt-150 mbm-100">
		<section class="section">
			<div class="container">
				<div class="grid">
					<?php foreach ($arResult["ITEMS"] as $arItem) { ?>
						<?php
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
						?>
						<div class="grid__col grid__col--3 grid__col-tab--6 grid__col-mob--4" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
							<article class="article-factoid article-factoid__text">
								<svg class="article-factoid__icon">
									<use href="<?= CFile::GetPath($arItem["PROPERTIES"]["ICON_FACTOID"]["VALUE"]) ?? ""; ?>#<?= $arItem["PROPERTIES"]["ID_ICON"]["VALUE"] ?? ""; ?>"></use>
								</svg>
								<?= $arItem["PREVIEW_TEXT"]; ?>
							</article>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
	</div>
<?php } ?>