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

<div class="main__section mb-125 mbt-160 mbm-100">
	<section class="section">
		<div class="container">
			<?php $APPLICATION->IncludeComponent(
				"eduCubeShop:previews.text.block",
				".default",
				[
					"CACHE_TIME"         => "3600",
					"CACHE_TYPE"         => "A",
					"LINE1"              => "Мы растим в России новое поколение гениальных инженеров",
					"LINE2"              => "Наша миссия",
					"LINE3"              => "Мы работаем для того, чтобы в России подрастало новое поколение талантливых и влюблённых в своё дело юных инженеров, робототехников и пилотов.",
					"WRAPPER_CLASS"      => "three-lines",
					"COMPONENT_TEMPLATE" => ".default"
				],
				false
			); ?>
			<?php if (!empty($arResult["ITEMS"])) { ?>
				<div class="grid">
					<?php foreach ($arResult["ITEMS"] as $arItem) { ?>
						<?php
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
						?>
						<div class="grid__col grid__col--4 grid__col-tab--12 grid__col-mob--12" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
							<article class="article-feature">
								<svg class="article-feature__icon">
									<use href="<?= CFile::GetPath($arItem["PROPERTIES"]["ICON"]["VALUE"]) ?? ""; ?>#<?= $arItem["PROPERTIES"]["ID_ICON"]["VALUE"] ?? ""; ?>"></use>
								</svg>
								<div class="article-feature__content">
									<h3 class="article-feature__title">
										<?= $arItem["PREVIEW_TEXT"] ?? ""; ?>
									</h3>
									<div class="article-feature__caption">
										<div class="editor-simple">
											<?= $arItem["DETAIL_TEXT"] ?? ""; ?>
										</div>
									</div>
								</div>
							</article>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</section>
</div>
