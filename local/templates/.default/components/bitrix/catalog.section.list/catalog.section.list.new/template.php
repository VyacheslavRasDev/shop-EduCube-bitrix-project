<?php use Bitrix\Main\Loader;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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
$this->setFrameMode(true); ?>

<?php
$strSectionEdit        = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete      = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = ["CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')];
?>


<?php if (0 < $arResult["SECTIONS_COUNT"]) {
	?>
	<div class="main__section mb-130 mbt-150 mbm-100">
		<section class="section">
			<div class="container">
				<h2 class="title title--regular mb-30 mbm-20">
					Каталог
				</h2>
				<div class="catalog">
					<div class="catalog__content">
						<div class="grid">
							<?php foreach ($arResult["SECTIONS"] as $index => $arItem) { ?>

								<?php
								$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
								$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

								if ($index < 4) {
									$groupClass = "large-top";
									$currentCol = 6;
								} elseif ($index < 6) {
									$groupClass  = "large-bottom";
									$currentCol  = 6;
									$hiddenClass = "hidden-category";
								} else {
									$groupClass = "small";
									$currentCol = 4;
								}
								?>

								<div class="grid__col grid__col--<?= $currentCol ?> grid__col-mob--12" id="<?= $this->GetEditAreaId($arResult['SECTION']['ID']); ?>">
									<?php
									//echo '<pre>';
									//print_r($arItem);
									//?>
									<article class="article-category article-category--<?= $groupClass ?>">
										<div class="article-category__head">
											<h2 class="article-category__title">
												<?= $arItem["NAME"] ?? "Название раздела" ?>
											</h2>
											<div class="article-category__caption">
												<div class="editor-simple">
													<?= $arItem["DESCRIPTION"] ?? "Описание раздела" ?>
												</div>
											</div>
										</div>
										<div class="article-category__content">
											<div class="article-category__columns">
												<div class="article-category__column">
													<?php foreach ($arItem["SUBSECTIONS"] as $item) { ?>
														<a class="article-category__link" href="<?= $item["SECTION_PAGE_URL"] ?>">
															<?= $item['NAME'] ?>
														</a>
													<?php } ?>
												</div>
												<div class="article-category__column <?= $hiddenClass ?>">
													<a class="article-category__link" href="">
														начальная школа
													</a>
												</div>
											</div>
											<?php $APPLICATION->IncludeComponent(
												"eduCubeShop:catalog.button.link.show.all",
												".default",
												[
													"LINK_DIRECTORY"     => "/catalog/",
													"NAME_LINK"          => "Смотреть все",
													"LINK"               => "/favicons/sprite.svg",
													"SPRITE_PATH"        => "icon-next",
													"COMPONENT_TEMPLATE" => ".default",
													"CACHE_TYPE"         => "A",
													"CACHE_TIME"         => "",
													"IMAGE_PATH"         => "/favicons/sprite.svg"
												],
												false
											); ?>
										</div>
										<picture class="article-category__picture">
											<img src="<?= $arItem["PICTURE"]["SRC"] ?? "Картинка" ?>" alt="#">
										</picture>
									</article>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="catalog__pagination">
						<button class="button button--small button--grey-invert">
                    <span class="button__text">
                        Показать все категории
                    </span>
							<svg class="button__icon">
								<use href="./assets/sprite.svg#icon-drop"></use>
							</svg>
						</button>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php } ?>