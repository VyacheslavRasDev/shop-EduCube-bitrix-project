<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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


<?php if (!empty($arResult['ITEMS'])) { ?>
	<div class="main__section mb-95 mbt-150 mbm-100">
		<section class="section">
			<div class="container">
				<div class="grid">
					<?php foreach ($arResult['ITEMS'] as $arItem) { ?>
						<?php
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
						?>
						<div class="grid__col grid__col--4 grid__col-tab--6 grid__col-mob--4" >
							<article class="article-partner" id="<?= $this->GetEditAreaId($arItem['ID']); ?>" >
								<div class="article-partner__header">
									<div class="article-partner__wrapper">
										<picture class="article-partner__picture">
											<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>">
										</picture>
									</div>
									<h3 class="article-partner__title">
										<?= $arItem["PREVIEW_TEXT"] ?? $arItem['NAME'] ?>
									</h3>
								</div>
								<div class="article-partner__main">
									<div class="editor-simple">
										<?= $arItem["DETAIL_TEXT"] ?? $arItem['NAME'] ?>
									</div>
								</div>
							</article>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
	</div>
<?php } ?>