<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

/**
 * @global CMain                 $APPLICATION
 * @var array                    $arParams
 * @var array                    $arResult
 * @var CatalogSectionComponent  $component
 * @var CBitrixComponentTemplate $this
 * @var string                   $templateName
 * @var string                   $componentPath
 * @var string                   $templateFolder
 */

$this->setFrameMode(true);

$templateLibrary = [
	'popup',
	'fx',
	'ui.fonts.opensans'
];
$currencyList    = '';

if (!empty($arResult['CURRENCIES'])) {
	$templateLibrary[] = 'currency';
	$currencyList      = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$haveOffers = !empty($arResult['OFFERS']);

$templateData = [
	'TEMPLATE_THEME'   => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES'       => $currencyList,
	'ITEM'             => [
		'ID'        => $arResult['ID'],
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
	],
];
if ($haveOffers) {
	$templateData['ITEM']['OFFERS_SELECTED'] = $arResult['OFFERS_SELECTED'];
	$templateData['ITEM']['JS_OFFERS']       = $arResult['JS_OFFERS'];
}
unset($currencyList, $templateLibrary);

$mainId  = $this->GetEditAreaId($arResult['ID']);
$itemIds = [
	'ID'                    => $mainId,
	'DISCOUNT_PERCENT_ID'   => $mainId . '_dsc_pict',
	'STICKER_ID'            => $mainId . '_sticker',
	'BIG_SLIDER_ID'         => $mainId . '_big_slider',
	'BIG_IMG_CONT_ID'       => $mainId . '_bigimg_cont',
	'SLIDER_CONT_ID'        => $mainId . '_slider_cont',
	'OLD_PRICE_ID'          => $mainId . '_old_price',
	'PRICE_ID'              => $mainId . '_price',
	'DESCRIPTION_ID'        => $mainId . '_description',
	'DISCOUNT_PRICE_ID'     => $mainId . '_price_discount',
	'PRICE_TOTAL'           => $mainId . '_price_total',
	'SLIDER_CONT_OF_ID'     => $mainId . '_slider_cont_',
	'QUANTITY_ID'           => $mainId . '_quantity',
	'QUANTITY_DOWN_ID'      => $mainId . '_quant_down',
	'QUANTITY_UP_ID'        => $mainId . '_quant_up',
	'QUANTITY_MEASURE'      => $mainId . '_quant_measure',
	'QUANTITY_LIMIT'        => $mainId . '_quant_limit',
	'BUY_LINK'              => $mainId . '_buy_link',
	'ADD_BASKET_LINK'       => $mainId . '_add_basket_link',
	'BASKET_ACTIONS_ID'     => $mainId . '_basket_actions',
	'NOT_AVAILABLE_MESS'    => $mainId . '_not_avail',
	'COMPARE_LINK'          => $mainId . '_compare_link',
	'TREE_ID'               => $mainId . '_skudiv',
	'DISPLAY_PROP_DIV'      => $mainId . '_sku_prop',
	'DISPLAY_MAIN_PROP_DIV' => $mainId . '_main_sku_prop',
	'OFFER_GROUP'           => $mainId . '_set_group_',
	'BASKET_PROP_DIV'       => $mainId . '_basket_prop',
	'SUBSCRIBE_LINK'        => $mainId . '_subscribe',
	'TABS_ID'               => $mainId . '_tabs',
	'TAB_CONTAINERS_ID'     => $mainId . '_tab_containers',
	'SMALL_CARD_PANEL_ID'   => $mainId . '_small_card_panel',
	'TABS_PANEL_ID'         => $mainId . '_tabs_panel'
];
$obName  = $templateData['JS_OBJ'] = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name    = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title   = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt     = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];

if ($haveOffers) {
	$actualItem         = $arResult['OFFERS'][$arResult['OFFERS_SELECTED']] ?? reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer) {
		if ($offer['MORE_PHOTO_COUNT'] > 1) {
			$showSliderControls = true;
			break;
		}
	}
} else {
	$actualItem         = $arResult;
	$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps     = [];
$price        = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

if ($arParams['SHOW_SKU_DESCRIPTION'] === 'Y') {
	$skuDescription = false;
	foreach ($arResult['OFFERS'] as $offer) {
		if ($offer['DETAIL_TEXT'] != '' || $offer['PREVIEW_TEXT'] != '') {
			$skuDescription = true;
			break;
		}
	}
	$showDescription = $skuDescription || !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
} else {
	$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
}

$showBuyBtn          = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName  = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn          = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe       = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY']           = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');

if ($arResult['MODULES']['catalog'] && $arResult['PRODUCT']['TYPE'] === ProductTable::TYPE_SERVICE) {
	$arParams['~MESS_NOT_AVAILABLE_SERVICE'] ??= '';
	$arParams['~MESS_NOT_AVAILABLE']         = $arParams['~MESS_NOT_AVAILABLE_SERVICE']
		?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE_SERVICE');

	$arParams['MESS_NOT_AVAILABLE_SERVICE'] ??= '';
	$arParams['MESS_NOT_AVAILABLE']         = $arParams['MESS_NOT_AVAILABLE_SERVICE']
		?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE_SERVICE');
} else {
	$arParams['~MESS_NOT_AVAILABLE'] ??= '';
	$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE']
		?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');

	$arParams['MESS_NOT_AVAILABLE'] ??= '';
	$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE']
		?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
}

$arParams['MESS_BTN_COMPARE']            = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE']     = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB']        = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB']         = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB']           = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY']      = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW']  = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = [
	'left'   => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right'  => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top'    => 'product-item-label-top'
];

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
	}
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
	}
}
?>


	<div id="<?= $itemIds['ID'] ?>" itemscope itemtype="http://schema.org/Product">
		<div class="main__section mb-40">
			<section class="section">
				<div class="container">
					<div class="grid ">
						<div class="grid__col grid__col--6 grid__col-mob--4">
							<div class="intro-product">
								<div>
									<?php if (!empty($arResult['DISPLAY_PROPERTIES'])) { ?>
										<span class="intro-product__caption">
										<?= $arResult['DISPLAY_PROPERTIES']['ATT_ARTICLE']['VALUE'] ?>, базовый набор
										</span>
									<?php } ?>
									<?php if ($arParams['DISPLAY_NAME'] === 'Y') { ?>
										<h1 class="intro-product__title title title--page">
											<?= $name ?>
										</h1>
									<?php } ?>
								</div>
								<div class="intro-product__picture">
									<div class="slider-sync" data-slider="sync">
										<div class="swiper slider-sync__main-container" data-slider="sync-main">
											<div class="swiper-wrapper slider-sync__main-wrapper">
												<?php if (!empty($actualItem['MORE_PHOTO'])) { ?>
													<?php foreach ($actualItem['MORE_PHOTO'] as $photos) { ?>
														<div class="swiper-slide slider-sync__slide">
															<picture class="picture">
																<img src="<?= $photos['SRC'] ?>" alt="">
															</picture>
														</div>
													<?php } ?>
												<?php } ?>
											</div>
										</div>
										<div class="slider-sync__pagination" data-slider="sync-pagination">
											<button class="slider-sync__button" data-button="prev">
												<svg class="slider-sync__icon">
													<use href="<?= DEFAULT_TEMPLATE_PATH ?>/favicons/sprite.svg#icon-slider-left"></use>
												</svg>
											</button>
											<div class="swiper slider-sync__pagination-main" data-slider="sync-pagination-content">
												<div class="swiper-wrapper slider-sync__pagination-wrapper">
													<?php if (!empty($actualItem['MORE_PHOTO'])) { ?>
														<?php foreach ($actualItem['MORE_PHOTO'] as $photos) { ?>
															<div class="swiper-slide slider-sync__pagination-slide">
																<button class="picture" type="button">
																	<img src="<?= $photos['SRC'] ?>" alt="">
																</button>
															</div>
														<?php } ?>
													<?php } ?>
												</div>
											</div>
											<button class="slider-sync__button" data-button="next">
												<svg class="slider-sync__icon">
													<use href="<?= DEFAULT_TEMPLATE_PATH ?>/favicons/sprite.svg#icon-slider-right"></use>
												</svg>
											</button>
										</div>
									</div>
								</div>
								<div class="intro-product__editor editor-simple">
									<?php if ($showDescription) { ?>
										<div data-entity="tab-container" data-value="description"
										     itemprop="description" id="<?= $itemIds['DESCRIPTION_ID'] ?>">
											<?php
											if (
												$arResult['PREVIEW_TEXT'] != ''
												&& (
													$arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'S'
													|| ($arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'E' && $arResult['DETAIL_TEXT'] == '')
												)
											) {
												echo $arResult['PREVIEW_TEXT_TYPE'] === 'html' ? $arResult['PREVIEW_TEXT'] : '<p>' . $arResult['PREVIEW_TEXT'] . '</p>';
											}

											if ($arResult['DETAIL_TEXT'] != '') {
												echo $arResult['DETAIL_TEXT_TYPE'] === 'html' ? $arResult['DETAIL_TEXT'] : '<p>' . $arResult['DETAIL_TEXT'] . '</p>';
											}
											?>
										</div>
									<?php } ?>
								</div>
								<div class="intro-product__price price-product">
									<div class="price-product__main">
										<?php
										foreach ($arParams['PRODUCT_PAY_BLOCK_ORDER'] as $blockName) {
											switch ($blockName) {
												case 'price':
													?>
													<div id="<?= $itemIds['PRICE_ID'] ?>">
														<strong>
															<?= $price['PRINT_RATIO_PRICE'] ?>
														</strong>
													</div>
													<div>
														<?php if ($arParams['SHOW_OLD_PRICE'] === 'Y') { ?>
														<div id="<?= $itemIds['OLD_PRICE_ID'] ?>">
															<?php foreach ($arResult['OLD_PRICE'] as $oldPrice) { ?>
																<?php if ($oldPrice['PRICE'] > $price['PRICE']) { ?>
																	<del>
																		<?= CCurrencyLang::CurrencyFormat($oldPrice['PRICE'], $oldPrice['CURRENCY'], true); ?>
																	</del>
																<?php } ?>
																</div>
															<?php } ?>
														<?php } ?>
													</div>
													<?php break; ?>
												<?php } ?>
										<?php } ?>
									</div>
								</div>
								<div class="intro-product__toolbar mob-hidden">
									<?php
									foreach ($arParams['PRODUCT_PAY_BLOCK_ORDER'] as $blockName) {
										switch ($blockName) {
											case 'buttons': ?>
												<div class="form-product" data-entity="main-button-container">
													<div id="<?= $itemIds['BASKET_ACTIONS_ID'] ?>" style="display: <?= ($actualItem['CAN_BUY'] ? '' : 'none') ?>;">
														<div class="form-product__head">
															<p class="form-product__caption passive" id="<?= $itemIds['NOT_AVAILABLE_MESS'] ?>"
															   href="javascript:void(0)"
															   rel="nofollow" style="display: <?= (!$actualItem['CAN_BUY'] ? '' : 'none') ?>;">
																<!----><?php //= $arParams['MESS_NOT_AVAILABLE'] ?>
															</p>
															<?php if ($arResult['OFFERS'][0]['CAN_BUY'] > 0) { ?>
																<p class="form-product__caption passive">
																	<?= 'товар в наличии'; ?>
																</p>
															<?php } ?>
														</div>
														<?php
														if ($showAddBtn) {
															?>
															<button class="form-product__button" id="<?= $itemIds['ADD_BASKET_LINK'] ?>" href="javascript:void(0);">
																<span>
																	<?= $arParams['MESS_BTN_ADD_TO_BASKET'] ?>
																</span>
															</button>
														<?php } ?>
														<?php
														if ($showBuyBtn) {
															?>
															<div>
																<a id="<?= $itemIds['BUY_LINK'] ?>"
																   href="javascript:void(0);">
																	<span><?= $arParams['MESS_BTN_BUY'] ?></span>
																</a>
															</div>
															<?php
														}
														?>
													</div>
													<?php
													if ($showSubscribe) {
														?>
														<div>
															<?php
															$APPLICATION->IncludeComponent(
																'bitrix:catalog.product.subscribe',
																'',
																[
																	'CUSTOM_SITE_ID'     => $arParams['CUSTOM_SITE_ID'] ?? null,
																	'PRODUCT_ID'         => $arResult['ID'],
																	'BUTTON_ID'          => $itemIds['SUBSCRIBE_LINK'],
																	'BUTTON_CLASS'       => 'btn btn-default product-item-detail-buy-button',
																	'DEFAULT_DISPLAY'    => !$actualItem['CAN_BUY'],
																	'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
																],
																$component,
																['HIDE_ICONS' => 'Y']
															);
															?>
														</div>
														<?php
													}
													?>

												</div>
												<?php break; ?>
											<?php } ?>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="grid__col grid__col--6 grid__col-mob--4 mob-hidden">
							<div class="slider-sync" data-slider="sync">
								<div class="swiper slider-sync__main-container" data-slider="sync-main">
									<div class="swiper-wrapper slider-sync__main-wrapper">
										<?php if (!empty($actualItem['MORE_PHOTO'])) { ?>
											<?php foreach ($actualItem['MORE_PHOTO'] as $photos) { ?>
												<div class="swiper-slide slider-sync__slide">
													<picture class="picture">
														<img src="<?= $photos['SRC'] ?>" alt="">
													</picture>
												</div>
											<?php } ?>
										<?php } ?>
									</div>
								</div>
								<div class="slider-sync__pagination" data-slider="sync-pagination">
									<button class="slider-sync__button" data-button="prev">
										<svg class="slider-sync__icon">
											<use href="<?= DEFAULT_TEMPLATE_PATH ?>/favicons/sprite.svg#icon-slider-left"></use>
										</svg>
									</button>
									<div class="swiper slider-sync__pagination-main" data-slider="sync-pagination-content">
										<div class="swiper-wrapper slider-sync__pagination-wrapper">
											<?php if (!empty($actualItem['MORE_PHOTO'])) { ?>
												<?php foreach ($actualItem['MORE_PHOTO'] as $photos) { ?>
													<div class="swiper-slide slider-sync__pagination-slide">
														<button class="picture" type="button">
															<img src="<?= $photos['SRC'] ?>" alt="">
														</button>
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<button class="slider-sync__button" data-button="next">
										<svg class="slider-sync__icon">
											<use href="<?= DEFAULT_TEMPLATE_PATH ?>/favicons/sprite.svg#icon-slider-right"></use>
										</svg>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="main__section mb-150 mbt-120 mbm-80">
			<?php $APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"main_factoids",
				[
					"ACTIVE_DATE_FORMAT"              => "d.m.Y",
					"ADD_SECTIONS_CHAIN"              => "Y",
					"AJAX_MODE"                       => "N",
					"AJAX_OPTION_ADDITIONAL"          => "",
					"AJAX_OPTION_HISTORY"             => "N",
					"AJAX_OPTION_JUMP"                => "N",
					"AJAX_OPTION_STYLE"               => "Y",
					"CACHE_FILTER"                    => "N",
					"CACHE_GROUPS"                    => "Y",
					"CACHE_TIME"                      => "36000000",
					"CACHE_TYPE"                      => "A",
					"CHECK_DATES"                     => "Y",
					"DETAIL_URL"                      => "",
					"DISPLAY_BOTTOM_PAGER"            => "Y",
					"DISPLAY_DATE"                    => "N",
					"DISPLAY_NAME"                    => "N",
					"DISPLAY_PICTURE"                 => "Y",
					"DISPLAY_PREVIEW_TEXT"            => "Y",
					"DISPLAY_TOP_PAGER"               => "N",
					"FIELD_CODE"                      => [
						0 => "ID",
						1 => "NAME",
						2 => "PREVIEW_TEXT",
						3 => "",
					],
					"FILTER_NAME"                     => "",
					"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
					"IBLOCK_ID"                       => getIblockIdByCode("factoids"),
					"IBLOCK_TYPE"                     => "Main",
					"INCLUDE_IBLOCK_INTO_CHAIN"       => "Y",
					"INCLUDE_SUBSECTIONS"             => "N",
					"MESSAGE_404"                     => "",
					"NEWS_COUNT"                      => "4",
					"PAGER_BASE_LINK_ENABLE"          => "N",
					"PAGER_DESC_NUMBERING"            => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL"                  => "N",
					"PAGER_SHOW_ALWAYS"               => "N",
					"PAGER_TEMPLATE"                  => ".default",
					"PAGER_TITLE"                     => "Новости",
					"PARENT_SECTION"                  => "",
					"PARENT_SECTION_CODE"             => "",
					"PREVIEW_TRUNCATE_LEN"            => "",
					"PROPERTY_CODE"                   => [
						0 => "ID_ICON",
						1 => "",
					],
					"SET_BROWSER_TITLE"               => "N",
					"SET_LAST_MODIFIED"               => "N",
					"SET_META_DESCRIPTION"            => "N",
					"SET_META_KEYWORDS"               => "N",
					"SET_STATUS_404"                  => "N",
					"SET_TITLE"                       => "N",
					"SHOW_404"                        => "N",
					"SORT_BY1"                        => "ACTIVE_FROM",
					"SORT_BY2"                        => "SORT",
					"SORT_ORDER1"                     => "DESC",
					"SORT_ORDER2"                     => "ASC",
					"STRICT_SECTION_CHECK"            => "N",
					"COMPONENT_TEMPLATE"              => "main_factoids",
				],
				false
			); ?>
		</div>
		<div class="main__section mb-120 mbm-80">
			<section class="section">
				<div class="container">
					<div class="grid" id="<?= $itemIds['TABS_ID'] ?>">
						<div class="grid__col grid__col--6 grid__col-mob--4 order-mob-2">
							<div>
								<?php if ($showDescription) { ?>
									<h2 class="title title--regular mb-35 mbm-20" data-entity="tab" data-value="description">
										<?= $arParams['MESS_DESCRIPTION_TAB'] ?>
									</h2>
								<?php } ?>
							</div>
							<?php if ($arResult['PREVIEW_TEXT']) { ?>
							<div class="editor editor--post">
								<?= $arResult['PREVIEW_TEXT'] ?>
							</div>
							<?php } ?>
							<div class="mt-35 mtm-20">
								<a href="" class="link-accent">
									Инструкция по сборке моделей
								</a>
							</div>
						</div>
						<div class="grid__col grid__col--6 grid__col-mob--4 order-mob-1">
							<div>
								<?php
								if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS']) {
									?>
									<h2 class="title title--regular mb-35 mbm-20" data-entity="tab" data-value="properties">
										<?= $arParams['MESS_PROPERTIES_TAB'] ?>
									</h2>
								<?php } ?>
							</div>
							<div class="product-info">
								<?php foreach ($arParams['PRODUCT_INFO_BLOCK_ORDER'] as $blockName) {
									switch ($blockName) {
										case 'props': ?>
											<?php if (!empty($arResult['DISPLAY_PROPERTIES'])) { ?>
												<?php foreach ($arResult['DISPLAY_PROPERTIES'] as $property) { ?>
													<?php if (isset($arParams['MAIN_BLOCK_PROPERTY_CODE'][$property['CODE']])) { ?>
														<div class="product-info__item">
															<strong><?= $property['NAME'] ?></strong>
															<span><?= (is_array($property['DISPLAY_VALUE'])
																	? implode(', ', $property['DISPLAY_VALUE'])
																	: $property['DISPLAY_VALUE']) ?>
																</span>
														</div>
													<?php } ?>
												<?php } ?>
												<?php unset($property); ?>
											<?php } ?>
											<?php break; ?>
										<?php } ?>
								<?php } ?>
							</div>
						</div>
					</div>
			</section>
		</div>
	</div>
	<div>
		<meta itemprop="name" content="<?= $name ?>"/>
		<meta itemprop="category" content="<?= $arResult['CATEGORY_PATH'] ?>"/>

		<?php if ($haveOffers) {
			foreach ($arResult['JS_OFFERS'] as $offer) {
				$currentOffersList = [];

				if (!empty($offer['TREE']) && is_array($offer['TREE'])) {
					foreach ($offer['TREE'] as $propName => $skuId) {
						$propId = (int)mb_substr($propName, 5);

						foreach ($skuProps as $prop) {
							if ($prop['ID'] == $propId) {
								foreach ($prop['VALUES'] as $propId => $propValue) {
									if ($propId == $skuId) {
										$currentOffersList[] = $propValue['NAME'];
										break;
									}
								}
							}
						}
					}
				}

				$offerPrice = $offer['ITEM_PRICES'][$offer['ITEM_PRICE_SELECTED']];
				?>
				<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
				<meta itemprop="sku" content="<?= htmlspecialcharsbx(implode('/', $currentOffersList)) ?>"/>
				<meta itemprop="price" content="<?= $offerPrice['RATIO_PRICE'] ?>"/>
				<meta itemprop="priceCurrency" content="<?= $offerPrice['CURRENCY'] ?>"/>
				<link itemprop="availability" href="http://schema.org/<?= ($offer['CAN_BUY'] ? 'InStock' : 'OutOfStock') ?>"/>
			</span>
				<?php
			}

			unset($offerPrice, $currentOffersList);
		} else {
			?>
			<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<meta itemprop="price" content="<?= $price['RATIO_PRICE'] ?>"/>
			<meta itemprop="priceCurrency" content="<?= $price['CURRENCY'] ?>"/>
			<link itemprop="availability" href="http://schema.org/<?= ($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock') ?>"/>
		</span>
		<?php } ?>
	</div>
	</div>


<?php
if ($haveOffers) {
	$offerIds   = [];
	$offerCodes = [];

	$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';

	foreach ($arResult['JS_OFFERS'] as $ind => &$jsOffer) {
		$offerIds[]   = (int)$jsOffer['ID'];
		$offerCodes[] = $jsOffer['CODE'];

		$fullOffer   = $arResult['OFFERS'][$ind];
		$measureName = $fullOffer['ITEM_MEASURE']['TITLE'];

		$strAllProps         = '';
		$strMainProps        = '';
		$strPriceRangesRatio = '';
		$strPriceRanges      = '';

		if ($arResult['SHOW_OFFERS_PROPS']) {
			if (!empty($jsOffer['DISPLAY_PROPERTIES'])) {
				foreach ($jsOffer['DISPLAY_PROPERTIES'] as $property) {
					$current     = '<dt>' . $property['NAME'] . '</dt><dd>' . (
						is_array($property['VALUE'])
							? implode(' / ', $property['VALUE'])
							: $property['VALUE']
						) . '</dd>';
					$strAllProps .= $current;

					if (isset($arParams['MAIN_BLOCK_OFFERS_PROPERTY_CODE'][$property['CODE']])) {
						$strMainProps .= $current;
					}
				}

				unset($current);
			}
		}

		if ($arParams['USE_PRICE_COUNT'] && count($jsOffer['ITEM_QUANTITY_RANGES']) > 1) {
			$strPriceRangesRatio = '(' . Loc::getMessage(
					'CT_BCE_CATALOG_RATIO_PRICE',
					[
						'#RATIO#' => ($useRatio
								? $fullOffer['ITEM_MEASURE_RATIOS'][$fullOffer['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']
								: '1'
							) . ' ' . $measureName
					]
				) . ')';

			foreach ($jsOffer['ITEM_QUANTITY_RANGES'] as $range) {
				if ($range['HASH'] !== 'ZERO-INF') {
					$itemPrice = false;

					foreach ($jsOffer['ITEM_PRICES'] as $itemPrice) {
						if ($itemPrice['QUANTITY_HASH'] === $range['HASH']) {
							break;
						}
					}

					if ($itemPrice) {
						$strPriceRanges .= '<dt>' . Loc::getMessage(
								'CT_BCE_CATALOG_RANGE_FROM',
								['#FROM#' => $range['SORT_FROM'] . ' ' . $measureName]
							) . ' ';

						if (is_infinite($range['SORT_TO'])) {
							$strPriceRanges .= Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
						} else {
							$strPriceRanges .= Loc::getMessage(
								'CT_BCE_CATALOG_RANGE_TO',
								['#TO#' => $range['SORT_TO'] . ' ' . $measureName]
							);
						}

						$strPriceRanges .= '</dt><dd>' . ($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE']) . '</dd>';
					}
				}
			}

			unset($range, $itemPrice);
		}

		$jsOffer['DISPLAY_PROPERTIES']            = $strAllProps;
		$jsOffer['DISPLAY_PROPERTIES_MAIN_BLOCK'] = $strMainProps;
		$jsOffer['PRICE_RANGES_RATIO_HTML']       = $strPriceRangesRatio;
		$jsOffer['PRICE_RANGES_HTML']             = $strPriceRanges;
	}

	$templateData['OFFER_IDS']   = $offerIds;
	$templateData['OFFER_CODES'] = $offerCodes;
	unset($jsOffer, $strAllProps, $strMainProps, $strPriceRanges, $strPriceRangesRatio, $useRatio);

	$jsParams = [
		'CONFIG'          => [
			'USE_CATALOG'               => $arResult['CATALOG'],
			'SHOW_QUANTITY'             => $arParams['USE_PRODUCT_QUANTITY'],
			'SHOW_PRICE'                => true,
			'SHOW_DISCOUNT_PERCENT'     => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
			'SHOW_OLD_PRICE'            => $arParams['SHOW_OLD_PRICE'] === 'Y',
			'USE_PRICE_COUNT'           => $arParams['USE_PRICE_COUNT'],
			'DISPLAY_COMPARE'           => $arParams['DISPLAY_COMPARE'],
			'SHOW_SKU_PROPS'            => $arResult['SHOW_OFFERS_PROPS'],
			'OFFER_GROUP'               => $arResult['OFFER_GROUP'],
			'MAIN_PICTURE_MODE'         => $arParams['DETAIL_PICTURE_MODE'],
			'ADD_TO_BASKET_ACTION'      => $arParams['ADD_TO_BASKET_ACTION'],
			'SHOW_CLOSE_POPUP'          => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
			'SHOW_MAX_QUANTITY'         => $arParams['SHOW_MAX_QUANTITY'],
			'RELATIVE_QUANTITY_FACTOR'  => $arParams['RELATIVE_QUANTITY_FACTOR'],
			'TEMPLATE_THEME'            => $arParams['TEMPLATE_THEME'],
			'USE_STICKERS'              => true,
			'USE_SUBSCRIBE'             => $showSubscribe,
			'SHOW_SLIDER'               => $arParams['SHOW_SLIDER'],
			'SLIDER_INTERVAL'           => $arParams['SLIDER_INTERVAL'],
			'ALT'                       => $alt,
			'TITLE'                     => $title,
			'MAGNIFIER_ZOOM_PERCENT'    => 200,
			'USE_ENHANCED_ECOMMERCE'    => $arParams['USE_ENHANCED_ECOMMERCE'],
			'DATA_LAYER_NAME'           => $arParams['DATA_LAYER_NAME'],
			'BRAND_PROPERTY'            => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
				? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
				: null,
			'SHOW_SKU_DESCRIPTION'      => $arParams['SHOW_SKU_DESCRIPTION'],
			'DISPLAY_PREVIEW_TEXT_MODE' => $arParams['DISPLAY_PREVIEW_TEXT_MODE']
		],
		'PRODUCT_TYPE'    => $arResult['PRODUCT']['TYPE'],
		'VISUAL'          => $itemIds,
		'DEFAULT_PICTURE' => [
			'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
			'DETAIL_PICTURE'  => $arResult['DEFAULT_PICTURE']
		],
		'PRODUCT'         => [
			'ID'                => $arResult['ID'],
			'ACTIVE'            => $arResult['ACTIVE'],
			'NAME'              => $arResult['~NAME'],
			'CATEGORY'          => $arResult['CATEGORY_PATH'],
			'DETAIL_TEXT'       => $arResult['DETAIL_TEXT'],
			'DETAIL_TEXT_TYPE'  => $arResult['DETAIL_TEXT_TYPE'],
			'PREVIEW_TEXT'      => $arResult['PREVIEW_TEXT'],
			'PREVIEW_TEXT_TYPE' => $arResult['PREVIEW_TEXT_TYPE']
		],
		'BASKET'          => [
			'QUANTITY'         => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'BASKET_URL'       => $arParams['BASKET_URL'],
			'SKU_PROPS'        => $arResult['OFFERS_PROP_CODES'],
			'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
			'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
		],
		'OFFERS'          => $arResult['JS_OFFERS'],
		'OFFER_SELECTED'  => $arResult['OFFERS_SELECTED'],
		'TREE_PROPS'      => $skuProps
	];
} else {
	$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
	if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !$emptyProductProperties) {
		?>
		<div id="<?= $itemIds['BASKET_PROP_DIV'] ?>" style="display: none;">
			<?php
			if (!empty($arResult['PRODUCT_PROPERTIES_FILL'])) {
				foreach ($arResult['PRODUCT_PROPERTIES_FILL'] as $propId => $propInfo) {
					?>
					<input type="hidden" name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propId ?>]" value="<?= htmlspecialcharsbx($propInfo['ID']) ?>">
					<?php
					unset($arResult['PRODUCT_PROPERTIES'][$propId]);
				}
			}

			$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
			if (!$emptyProductProperties) {
				?>
				<table>
					<?php
					foreach ($arResult['PRODUCT_PROPERTIES'] as $propId => $propInfo) {
						?>
						<tr>
							<td><?= $arResult['PROPERTIES'][$propId]['NAME'] ?></td>
							<td>
								<?php
								if (
									$arResult['PROPERTIES'][$propId]['PROPERTY_TYPE'] === 'L'
									&& $arResult['PROPERTIES'][$propId]['LIST_TYPE'] === 'C'
								) {
									foreach ($propInfo['VALUES'] as $valueId => $value) {
										?>
										<label>
											<input type="radio" name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propId ?>]"
											       value="<?= $valueId ?>" <?= ($valueId == $propInfo['SELECTED'] ? 'checked' : '') ?>>
											<?= $value ?>
										</label>
										<br>
										<?php
									}
								} else {
									?>
									<select name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propId ?>]">
										<?php
										foreach ($propInfo['VALUES'] as $valueId => $value) {
											?>
											<option value="<?= $valueId ?>" <?= ($valueId == $propInfo['SELECTED'] ? 'selected' : '') ?>>
												<?= $value ?>
											</option>
											<?php
										}
										?>
									</select>
									<?php
								}
								?>
							</td>
						</tr>
						<?php
					}
					?>
				</table>
				<?php
			}
			?>
		</div>
		<?php
	}

	$jsParams = [
		'CONFIG'       => [
			'USE_CATALOG'              => $arResult['CATALOG'],
			'SHOW_QUANTITY'            => $arParams['USE_PRODUCT_QUANTITY'],
			'SHOW_PRICE'               => !empty($arResult['ITEM_PRICES']),
			'SHOW_DISCOUNT_PERCENT'    => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
			'SHOW_OLD_PRICE'           => $arParams['SHOW_OLD_PRICE'] === 'Y',
			'USE_PRICE_COUNT'          => $arParams['USE_PRICE_COUNT'],
			'DISPLAY_COMPARE'          => $arParams['DISPLAY_COMPARE'],
			'MAIN_PICTURE_MODE'        => $arParams['DETAIL_PICTURE_MODE'],
			'ADD_TO_BASKET_ACTION'     => $arParams['ADD_TO_BASKET_ACTION'],
			'SHOW_CLOSE_POPUP'         => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
			'SHOW_MAX_QUANTITY'        => $arParams['SHOW_MAX_QUANTITY'],
			'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
			'TEMPLATE_THEME'           => $arParams['TEMPLATE_THEME'],
			'USE_STICKERS'             => true,
			'USE_SUBSCRIBE'            => $showSubscribe,
			'SHOW_SLIDER'              => $arParams['SHOW_SLIDER'],
			'SLIDER_INTERVAL'          => $arParams['SLIDER_INTERVAL'],
			'ALT'                      => $alt,
			'TITLE'                    => $title,
			'MAGNIFIER_ZOOM_PERCENT'   => 200,
			'USE_ENHANCED_ECOMMERCE'   => $arParams['USE_ENHANCED_ECOMMERCE'],
			'DATA_LAYER_NAME'          => $arParams['DATA_LAYER_NAME'],
			'BRAND_PROPERTY'           => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
				? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
				: null
		],
		'VISUAL'       => $itemIds,
		'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
		'PRODUCT'      => [
			'ID'                           => $arResult['ID'],
			'ACTIVE'                       => $arResult['ACTIVE'],
			'PICT'                         => reset($arResult['MORE_PHOTO']),
			'NAME'                         => $arResult['~NAME'],
			'SUBSCRIPTION'                 => true,
			'ITEM_PRICE_MODE'              => $arResult['ITEM_PRICE_MODE'],
			'ITEM_PRICES'                  => $arResult['ITEM_PRICES'],
			'ITEM_PRICE_SELECTED'          => $arResult['ITEM_PRICE_SELECTED'],
			'ITEM_QUANTITY_RANGES'         => $arResult['ITEM_QUANTITY_RANGES'],
			'ITEM_QUANTITY_RANGE_SELECTED' => $arResult['ITEM_QUANTITY_RANGE_SELECTED'],
			'ITEM_MEASURE_RATIOS'          => $arResult['ITEM_MEASURE_RATIOS'],
			'ITEM_MEASURE_RATIO_SELECTED'  => $arResult['ITEM_MEASURE_RATIO_SELECTED'],
			'SLIDER_COUNT'                 => $arResult['MORE_PHOTO_COUNT'],
			'SLIDER'                       => $arResult['MORE_PHOTO'],
			'CAN_BUY'                      => $arResult['CAN_BUY'],
			'CHECK_QUANTITY'               => $arResult['CHECK_QUANTITY'],
			'QUANTITY_FLOAT'               => is_float($arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']),
			'MAX_QUANTITY'                 => $arResult['PRODUCT']['QUANTITY'],
			'STEP_QUANTITY'                => $arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'],
			'CATEGORY'                     => $arResult['CATEGORY_PATH']
		],
		'BASKET'       => [
			'ADD_PROPS'        => $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y',
			'QUANTITY'         => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'PROPS'            => $arParams['PRODUCT_PROPS_VARIABLE'],
			'EMPTY_PROPS'      => $emptyProductProperties,
			'BASKET_URL'       => $arParams['BASKET_URL'],
			'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
			'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
		]
	];
	unset($emptyProductProperties);
}

if ($arParams['DISPLAY_COMPARE']) {
	$jsParams['COMPARE'] = [
		'COMPARE_URL_TEMPLATE'        => $arResult['~COMPARE_URL_TEMPLATE'],
		'COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
		'COMPARE_PATH'                => $arParams['COMPARE_PATH']
	];
}

$jsParams["IS_FACEBOOK_CONVERSION_CUSTOMIZE_PRODUCT_EVENT_ENABLED"] =
	$arResult["IS_FACEBOOK_CONVERSION_CUSTOMIZE_PRODUCT_EVENT_ENABLED"];

?>
	<script>
        BX.message({
            ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
            TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
            TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
            BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
            BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
            BTN_MESSAGE_DETAIL_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
            BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
            BTN_MESSAGE_DETAIL_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
            TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
            COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
            COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
            COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
            BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
            PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
            PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
            RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
            RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
            SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
        });

        var <?=$obName?> = new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
	</script>
<?php
unset($actualItem, $itemIds, $jsParams);
