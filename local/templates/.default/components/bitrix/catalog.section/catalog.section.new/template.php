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
 *
 *  _________________________________________________________________________
 * |    Attention!
 * |    The following comments are for system use
 * |    and are required for the component to work correctly in ajax mode:
 * |    <!-- items-container -->
 * |    <!-- pagination-container -->
 * |    <!-- component-end -->
 */

$this->setFrameMode(true);

if (!empty($arResult['NAV_RESULT'])) {
	$navParams = [
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum'       => $arResult['NAV_RESULT']->NavNum
	];
} else {
	$navParams = [
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum'       => $this->randString()
	];
}

$showTopPager    = false;
$showBottomPager = false;
$showLazyLoad    = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
	$showTopPager    = $arParams['DISPLAY_TOP_PAGER'];
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
	$showLazyLoad    = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$templateLibrary = [
	'popup',
	'ajax',
	'fx'
];
$currencyList    = '';

if (!empty($arResult['CURRENCIES'])) {
	$templateLibrary[] = 'currency';
	$currencyList      = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = [
	'TEMPLATE_THEME'           => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY'         => $templateLibrary,
	'CURRENCIES'               => $currencyList,
	'USE_PAGINATION_CONTAINER' => $showTopPager || $showBottomPager,
];
unset($currencyList, $templateLibrary);

$elementEdit         = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete       = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = ['CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM')];

$positionClassMap = [
	'left'   => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right'  => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top'    => 'product-item-label-top'
];

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
	}
}

$arParams['~MESS_BTN_BUY']                = ($arParams['~MESS_BTN_BUY'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL']             = ($arParams['~MESS_BTN_DETAIL'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE']            = ($arParams['~MESS_BTN_COMPARE'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE']          = ($arParams['~MESS_BTN_SUBSCRIBE'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET']      = ($arParams['~MESS_BTN_ADD_TO_BASKET'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE']          = ($arParams['~MESS_NOT_AVAILABLE'] ?? '') ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_NOT_AVAILABLE_SERVICE']  = ($arParams['~MESS_NOT_AVAILABLE_SERVICE'] ?? '') ?: Loc::getMessage('CP_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE_SERVICE');
$arParams['~MESS_SHOW_MAX_QUANTITY']      = ($arParams['~MESS_SHOW_MAX_QUANTITY'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = ($arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_MANY']  = ($arParams['MESS_RELATIVE_QUANTITY_MANY'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW']  = ($arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');
$arParams['MESS_RELATIVE_QUANTITY_FEW']   = ($arParams['MESS_RELATIVE_QUANTITY_FEW'] ?? '') ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$obName        = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-' . $navParams['NavNum'];

if ($showTopPager) {
	?>
	<div data-pagination-num="<?= $navParams['NavNum'] ?>">
		<!-- pagination-container -->
		<?= $arResult['NAV_STRING'] ?>
		<!-- pagination-container -->
	</div>
	<?
}
?>



<div data-entity="<?= $containerName ?>">
	<?
	if (!empty($arResult['ITEMS']) && !empty($arResult['ITEM_ROWS'])) {
		$generalParams = [
			'SHOW_DISCOUNT_PERCENT'        => $arParams['SHOW_DISCOUNT_PERCENT'],
			'PRODUCT_DISPLAY_MODE'         => $arParams['PRODUCT_DISPLAY_MODE'],
			'SHOW_MAX_QUANTITY'            => $arParams['SHOW_MAX_QUANTITY'],
			'RELATIVE_QUANTITY_FACTOR'     => $arParams['RELATIVE_QUANTITY_FACTOR'],
			'MESS_SHOW_MAX_QUANTITY'       => $arParams['~MESS_SHOW_MAX_QUANTITY'],
			'MESS_RELATIVE_QUANTITY_MANY'  => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
			'MESS_RELATIVE_QUANTITY_FEW'   => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
			'SHOW_OLD_PRICE'               => $arParams['SHOW_OLD_PRICE'],
			'USE_PRODUCT_QUANTITY'         => $arParams['USE_PRODUCT_QUANTITY'],
			'PRODUCT_QUANTITY_VARIABLE'    => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'ADD_TO_BASKET_ACTION'         => $arParams['ADD_TO_BASKET_ACTION'],
			'ADD_PROPERTIES_TO_BASKET'     => $arParams['ADD_PROPERTIES_TO_BASKET'],
			'PRODUCT_PROPS_VARIABLE'       => $arParams['PRODUCT_PROPS_VARIABLE'],
			'SHOW_CLOSE_POPUP'             => $arParams['SHOW_CLOSE_POPUP'],
			'DISPLAY_COMPARE'              => $arParams['DISPLAY_COMPARE'],
			'COMPARE_PATH'                 => $arParams['COMPARE_PATH'],
			'COMPARE_NAME'                 => $arParams['COMPARE_NAME'],
			'PRODUCT_SUBSCRIPTION'         => $arParams['PRODUCT_SUBSCRIPTION'],
			'PRODUCT_BLOCKS_ORDER'         => $arParams['PRODUCT_BLOCKS_ORDER'],
			'LABEL_POSITION_CLASS'         => $labelPositionClass,
			'DISCOUNT_POSITION_CLASS'      => $discountPositionClass,
			'SLIDER_INTERVAL'              => $arParams['SLIDER_INTERVAL'],
			'SLIDER_PROGRESS'              => $arParams['SLIDER_PROGRESS'],
			'~BASKET_URL'                  => $arParams['~BASKET_URL'],
			'~ADD_URL_TEMPLATE'            => $arResult['~ADD_URL_TEMPLATE'],
			'~BUY_URL_TEMPLATE'            => $arResult['~BUY_URL_TEMPLATE'],
			'~COMPARE_URL_TEMPLATE'        => $arResult['~COMPARE_URL_TEMPLATE'],
			'~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
			'TEMPLATE_THEME'               => $arParams['TEMPLATE_THEME'],
			'USE_ENHANCED_ECOMMERCE'       => $arParams['USE_ENHANCED_ECOMMERCE'],
			'DATA_LAYER_NAME'              => $arParams['DATA_LAYER_NAME'],
			'BRAND_PROPERTY'               => $arParams['BRAND_PROPERTY'],
			'MESS_BTN_BUY'                 => $arParams['~MESS_BTN_BUY'],
			'MESS_BTN_DETAIL'              => $arParams['~MESS_BTN_DETAIL'],
			'MESS_BTN_COMPARE'             => $arParams['~MESS_BTN_COMPARE'],
			'MESS_BTN_SUBSCRIBE'           => $arParams['~MESS_BTN_SUBSCRIBE'],
			'MESS_BTN_ADD_TO_BASKET'       => $arParams['~MESS_BTN_ADD_TO_BASKET'],
		];

		$areaIds        = [];
		$itemParameters = [];

		foreach ($arResult['ITEMS'] as $item) {
		}
		?>
		<div class="main__section mb-80 mbm-20">
			<section class="section">
				<div class="container">
					<div class="mb-50 mbt-35 mbm-20">
						<p class="breadcrumbs">
							каталог / робототехника / LEGO EDUCATION
						</p>
					</div>
					<div class="grid">
						<div class="grid__col grid__col--5">
							<h1 class="title title--page mb-20 mbm-10">
								<?= $arResult['NAME']; ?>
							</h1>
							<div class="editor editor--large">
								<?= $arResult['DESCRIPTION']; ?>
							</div>
						</div>
						<div class="grid__col grid__col--7">
							<picture class="picture">
								<img src="<?= $arResult['PICTURE']['SRC']; ?>" alt="#" >
							</picture>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="main__section mb-100 mbm-80">
			<section class="section">
				<div class="container">
					<div class="grid">
						<div class="grid__col grid__col--4 grid__col-mob--2">
							<a href="" class="article-category-short">
								<picture class="article-category-short__picture">
									<img src="./assets/images/1080x1080.jpg" alt="Комплекты для дома">
								</picture>
								<div class="article-category-short__content">
									<h3 class="article-category-short__title">
										Комплекты для дома
									</h3>
								</div>
							</a>
						</div>
						<div class="grid__col grid__col--4 grid__col-mob--2">
							<a href="" class="article-category-short">
								<picture class="article-category-short__picture">
									<img src="./assets/images/1080x1080.jpg" alt="Lego Роботы">
								</picture>
								<div class="article-category-short__content">
									<h3 class="article-category-short__title">
										Lego Роботы
									</h3>
								</div>
							</a>
						</div>
						<div class="grid__col grid__col--4 grid__col-mob--2">
							<a href="" class="article-category-short">
								<picture class="article-category-short__picture">
									<img src="./assets/images/1080x1080.jpg" alt="Комплектующие">
								</picture>
								<div class="article-category-short__content">
									<h3 class="article-category-short__title">
										Комплектующие
									</h3>
								</div>
							</a>
						</div>
						<div class="grid__col grid__col--4 grid__col-mob--2">
							<a href="" class="article-category-short">
								<picture class="article-category-short__picture">
									<img src="./assets/images/1080x1080.jpg" alt="Конструктор для изучения робототехники">
								</picture>
								<div class="article-category-short__content">
									<h3 class="article-category-short__title">
										Конструктор для изучения робототехники
									</h3>
								</div>
							</a>
						</div>
						<div class="grid__col grid__col--4 grid__col-mob--2">
							<a href="" class="article-category-short">
								<picture class="article-category-short__picture">
									<img src="./assets/images/1080x1080.jpg" alt="Комплекты для классов">
								</picture>
								<div class="article-category-short__content">
									<h3 class="article-category-short__title">
										Комплекты для классов
									</h3>
								</div>
							</a>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="main__section">
			<section class="section overflow" data-catalog="block">
				<div class="container">
					<div class="catalog">
						<div class="catalog__inner">
							<div class="catalog__toolbar">
								<button class="button-filter" data-catalog="button-show">
                        <span class="button-filter__text">
                            Фильтр
                        </span>
									<svg class="button-filter__icon">
										<use href="./assets/sprite.svg#icon-filter"></use>
									</svg>
								</button>
								<select class="select-filter" name="sort" data-catalog="select-sorting">
									<option value="" disabled selected>Сортировать</option>
									<option value="popularity">По популярности</option>
									<option value="price+">Цена (выше)</option>
									<option value="price-">Цена (ниже)</option>
									>
								</select>
							</div>
							<div class="catalog__tags" data-catalog="tags"></div>
							<div class="catalog__filter" data-catalog="filter" hidden="hidden">
								<form action="" data-catalog="form" class="form-filter">
									<div class="form-filter__main">
										<div class="grid">
											<div class="grid__col grid__col--3 grid__col-tab--12 grid__col-mob--4">
												<div class="filter-item">
													<h4 class="filter-item__title">
														Цена
													</h4>
													<div class="filter-item__content">
														<div class="input-range" data-range="block">
															<!-- При первой загрузке страницы ты подставишь value - это будут минимальное и максимальное значения. ВАЖНО - minNumber и minRunge, и аналогично для max - должны быть идентичными, это необходимые input, чтобы сделать двойной ползунок -->
															<div class="input-range__main">
																<label class="input-number">
																	<span class="input-number__caption">Нижняя цена</span>
																	<input class="input-number__field" type="number" data-range="minNumber" name="priceMin" value="0">
																</label>
																<div class="input-range__separator"></div>
																<label class="input-number">
																	<span class="input-number__caption">Нижняя цена</span>
																	<input class="input-number__field" type="number" data-range="maxNumber" name="priceMax" value="190000">
																</label>
															</div>
															<div class="input-range__fields dual-range-input">
																<input data-range="minRange" type="range" min="0" max="190000" step="1" name="priceMin" value="0">
																<input data-range="maxRange" type="range" min="0" max="190000" step="1" name="priceMax" value="190000">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="grid__col grid__col--2 grid__col-tab--6 grid__col-mob--4">
												<div class="filter-item">
													<h4 class="filter-item__title">
														Возраст
													</h4>
													<div class="filter-item__content">
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="PROPERTY_MATERIAL" value="%D0%B0%D0%BB%D1%8E%D0%BC%D0%B8%D0%BD%D0%B8%D0%B9">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">Алюминий</span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="PROPERTY_MATERIAL" value="plastic">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">Пластик</span>
														</label>
													</div>
												</div>
											</div>
											<div class="grid__col grid__col--2 grid__col-tab--6 grid__col-mob--4">
												<div class="filter-item">
													<h4 class="filter-item__title">
														Направление
													</h4>
													<div class="filter-item__content">
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="role-1">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Ранее математическое
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="role-2">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Ранее языковое
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="role-3">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Социально-эмоциональное
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="role-4">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Творческое познание мира
                                            </span>
														</label>
													</div>
												</div>
											</div>
											<div class="grid__col grid__col--2 grid__col-tab--6 grid__col-mob--4">
												<div class="filter-item">
													<h4 class="filter-item__title">
														Категория
													</h4>
													<div class="filter-item__content">
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="cat-1">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Комплект
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="cat-2">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Комплектующие
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="cat-3">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Конструктор
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="cat-4">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Механический конструктор
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="cat-5">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Микрокомпьютер
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="cat-6">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Набор
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="cat-7">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                ПО и доп. материалы
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="cat-8">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Поля для соревнований
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="cat-9">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Сенсоры и датчики
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="cat-10">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Электромеханический конструктор
                                            </span>
														</label>
													</div>
												</div>
											</div>
											<div class="grid__col grid__col--3 grid__col-tab--6 grid__col-mob--4">
												<div class="filter-item">
													<h4 class="filter-item__title">
														Серия (совместимость)
													</h4>
													<div class="filter-item__content">
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="series-1">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                DUPLO
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="series-2">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                LEGO WeDo
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="series-3">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Mindstorms EV3
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="series-4">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Mindstorms NXT+EV3
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="series-5">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Mindstroms NXT
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="series-6">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                SOFT
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="series-7">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                System
                                            </span>
														</label>
														<label class="checkbox-filter">
															<input class="checkbox-filter__input" type="checkbox" name="series-8">
															<span class="checkbox-filter__box"></span>
															<span class="checkbox-filter__text">
                                                Tetrix
                                            </span>
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-filter__toolbar">
										<button class="button button--large button--green-invert" type="reset">
                                <span class="button__text">
                                    Сбросить
                                </span>
										</button>
										<button class="button button--large button--green" type="submit">
                                <span class="button__text">
                                    Отправить
                                </span>
										</button>
									</div>
								</form>
							</div>
							<div class="catalog__content" data-catalog="content" data-entity="items-row">
								<div class="grid" data-catalog="inner" >
									<?php foreach ($arResult['ITEMS'] as $item) { ?>

										<?php
										$uniqueId             = $item['ID'] . '_' . md5($this->randString() . $component->getAction());
										$areaIds[$item['ID']] = $this->GetEditAreaId($uniqueId);
										$this->AddEditAction($uniqueId, $item['EDIT_LINK'], $elementEdit);
										$this->AddDeleteAction($uniqueId, $item['DELETE_LINK'], $elementDelete, $elementDeleteParams);

										$itemParameters[$item['ID']] = [
										'SKU_PROPS'          => $arResult['SKU_PROPS'][$item['IBLOCK_ID']],
										'MESS_NOT_AVAILABLE' => ($arResult['MODULES']['catalog'] && $item['PRODUCT']['TYPE'] === ProductTable::TYPE_SERVICE
										? $arParams['~MESS_NOT_AVAILABLE_SERVICE']
										: $arParams['~MESS_NOT_AVAILABLE']
										),
										];
										?>

										<div class="grid__col grid__col--4 grid__col-tab--6 grid__col-mob--4" data-catalog="item" id="<?= $areaIds[$item['ID']] ?>" >
											<?
											$APPLICATION->IncludeComponent(
												'bitrix:catalog.item',
												'card',
												[
													'RESULT' => [
														'ITEM'                 => $item,
														'AREA_ID'              => $areaIds[$item['ID']],
														'TYPE'                 => 'card',
														'BIG_LABEL'            => 'N',
														'BIG_DISCOUNT_PERCENT' => 'N',
														'BIG_BUTTONS'          => 'N',
														'SCALABLE'             => 'N'
													],
													'PARAMS' => $generalParams + $itemParameters[$item['ID']],
												],
												$component,
												['HIDE_ICONS' => 'Y']
											);
											?>

										</div>
									<?php } ?>
								</div>
							</div>
							<div class="catalog__pagination">
								<!-- Просто ссылка, такая же, как и ниже в пагинации, на последней странице не отдавай ее -->
								<a class="button button--small button--grey-invert" data-pagination-link="2">
				                    <span class="button__text">
				                        Показать еще
				                    </span>
								</a>
								<div class="pagination" data-pagination="block">
									<!-- TODO: Для кнопок лево-право считай от текущей страницы, и подставляй соответствующий номер. Если мы на первой или последнй странице, тогда указывай текущую -->
									<a href="" class="pagination__item" data-pagination-link="1" disabled>
										<svg class="pagination__icon">
											<use href="./assets/sprite.svg#icon-angle-left"></use>
										</svg>
									</a>
									<a href="" class="pagination__item" data-pagination-link="1">1</a>
									<a href="" class="pagination__item" data-pagination-link="2">2</a>
									<span class="pagination__item">...</span>
									<a href="" class="pagination__item" data-pagination-link="13">13</a>
									<a href="" class="pagination__item" data-pagination-link="14">14</a>
									<a href="" class="pagination__item" data-pagination-link="4">
										<svg class="pagination__icon">
											<use href="./assets/sprite.svg#icon-angle-right"></use>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<!-- items-container -->
		<?
		unset($rowItems);

		unset($itemParameters);
		unset($areaIds);

		unset($generalParams);
		?>
		<!-- items-container -->
		<?
	} else {
		// load css for bigData/deferred load
		$APPLICATION->IncludeComponent(
			'bitrix:catalog.item',
			'catalog.card',
			[],
			$component,
			['HIDE_ICONS' => 'Y']
		);
	}
	?>
</div>

<?
if ($showLazyLoad) {
	?>
	<div class="row bx-<?= $arParams['TEMPLATE_THEME'] ?>">
		<div class="btn btn-default btn-lg center-block" style="margin: 15px;"
		     data-use="show-more-<?= $navParams['NavNum'] ?>">
			<?= $arParams['MESS_BTN_LAZY_LOAD'] ?>
		</div>
	</div>
	<?
}

if ($showBottomPager) {
	?>
	<div data-pagination-num="<?= $navParams['NavNum'] ?>">
		<!-- pagination-container -->
		<?= $arResult['NAV_STRING'] ?>
		<!-- pagination-container -->
	</div>
	<?
}

$signer         = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams   = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>
<script>
    BX.message({
        BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
        BASKET_URL: '<?=$arParams['BASKET_URL']?>',
        ADD_TO_BASKET_OK: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
        TITLE_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR')?>',
        TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS')?>',
        TITLE_SUCCESSFUL: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
        BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR')?>',
        BTN_MESSAGE_SEND_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS')?>',
        BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE')?>',
        BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
        COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK')?>',
        COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
        COMPARE_TITLE: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE')?>',
        PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX')?>',
        RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
        RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
        BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
        BTN_MESSAGE_LAZY_LOAD: '<?=CUtil::JSEscape($arParams['MESS_BTN_LAZY_LOAD'])?>',
        BTN_MESSAGE_LAZY_LOAD_WAITER: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER')?>',
        SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
    });
    var <?=$obName?> = new JCCatalogSectionComponent({
        siteId: '<?=CUtil::JSEscape($component->getSiteId())?>',
        componentPath: '<?=CUtil::JSEscape($componentPath)?>',
        navParams: <?=CUtil::PhpToJSObject($navParams)?>,
        deferredLoad: false,
        initiallyShowHeader: '<?=!empty($arResult['ITEM_ROWS'])?>',
        bigData: <?=CUtil::PhpToJSObject($arResult['BIG_DATA'])?>,
        lazyLoad: !!'<?=$showLazyLoad?>',
        loadOnScroll: !!'<?=($arParams['LOAD_ON_SCROLL'] === 'Y')?>',
        template: '<?=CUtil::JSEscape($signedTemplate)?>',
        ajaxId: '<?=CUtil::JSEscape($arParams['AJAX_ID'] ?? '')?>',
        parameters: '<?=CUtil::JSEscape($signedParams)?>',
        container: '<?=$containerName?>'
    });
</script>
<!-- component-end -->
