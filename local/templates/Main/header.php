<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/templates/.default/include/headers_main/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/templates/.default/include/headers_main/header_visible.php';
?>

<div class="main__section">
	<?php $APPLICATION->IncludeComponent(
		"bitrix:menu",
		"main_menu",
		[
			"ALLOW_MULTI_SELECT"    => "N",
			"CHILD_MENU_TYPE"       => "main",
			"DELAY"                 => "N",
			"MAX_LEVEL"             => "1",
			"MENU_CACHE_GET_VARS"   => [
			],
			"MENU_CACHE_TIME"       => "3600",
			"MENU_CACHE_TYPE"       => "N",
			"MENU_CACHE_USE_GROUPS" => "N",
			"ROOT_MENU_TYPE"        => "main",
			"USE_EXT"               => "N",
			"COMPONENT_TEMPLATE"    => "main_menu"
		],
		false
	); ?>
</div>
<?php $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"main_promo", 
	[
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => [
			0 => "ID",
			1 => "CODE",
			2 => "NAME",
			3 => "PREVIEW_TEXT",
			4 => "PREVIEW_PICTURE",
			5 => "DETAIL_TEXT",
			6 => "",
		],
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_CODE" => "main_promo",
		"IBLOCK_TYPE" => "Main",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "1",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => [
			0 => "BUTTON_LINK",
			1 => "AGE_TEXT",
			2 => "BUTTON_TEXT",
			3 => "",
		],
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "main_promo"
	],
	false
); ?>
<?php $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"main_factoids", 
	[
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => [
			0 => "ID",
			1 => "NAME",
			2 => "PREVIEW_TEXT",
			3 => "",
		],
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => getIblockIdByCode("factoids"),
		"IBLOCK_TYPE" => "Main",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => [
			0 => "ID_ICON",
			1 => "",
		],
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "main_factoids",
	],
	false
); ?>
<?php $APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"main_categories",
	[
		"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "Catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => [
			0 => "",
			1 => "",
		],
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => [
			0 => "",
			1 => "",
		],
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "LINE",
		"COMPONENT_TEMPLATE" => "catalog.section.list"
	],
	false
);?>
<div class="main__section mb-135 mbt-150 mbm-100">
	<section class="section">
		<div class="container">
			<h2 class="title title--regular mb-30 mbm-20">
				Рекомендуемые товары
			</h2>
			<div class="swiper slider-recommended" data-slider="recommended">
				<div class="swiper-wrapper slider-recommended__wrapper">
					<div class="swiper-slide slider-recommended__slide">
						<article class="article-product">
							<div class="article-product__header">
								<a href="" class="article-product__title">
									Набор LEGO® Education BricQ Motion Старт
								</a>
							</div>
							<a href="" class="article-product__picture">
								<img src="./assets/images/1920x1080.jpg" alt="Набор LEGO® Education BricQ Motion Старт">
							</a>
							<div class="article-product__footer">
								<div class="price-preview">
									<p class="price-preview__status">
										В наличии
									</p>
									<div class="price-preview__main">
										<strong>
											56 200₽
										</strong>
										<del>
											87 200₽
										</del>
									</div>
								</div>
								<!-- значение параметра - id товара, если он в корзине при обновлении страницы, меня текст на "в корзине" -->
								<button class="article-product__button" data-product="123">
									положить
									<br>
									в корзину
								</button>
							</div>
						</article>
					</div>
					<div class="swiper-slide slider-recommended__slide">
						<article class="article-product">
							<div class="article-product__header">
								<a href="" class="article-product__title">
									LEGO MINDSTORMS EV3 45544 базовый набор
								</a>
							</div>
							<a href="" class="article-product__picture">
								<img src="./assets/images/1920x1080.jpg" alt="Набор LEGO® Education BricQ Motion Старт">
							</a>
							<div class="article-product__footer">
								<div class="price-preview">
									<p class="price-preview__status">
										В наличии
									</p>
									<div class="price-preview__main">
										<strong>
											56 200₽
										</strong>
									</div>
								</div>
								<button class="article-product__button">
									положить
									<br>
									в корзину
								</button>
							</div>
						</article>
					</div>
					<div class="swiper-slide slider-recommended__slide">
						<article class="article-product">
							<div class="article-product__header">
								<a href="" class="article-product__title">
									LEGO MINDSTORMS EV3 45544 базовый набор
								</a>
							</div>
							<a href="" class="article-product__picture">
								<img src="./assets/images/1920x1080.jpg" alt="Набор LEGO® Education BricQ Motion Старт">
							</a>
							<div class="article-product__footer">
								<div class="price-preview">
									<p class="price-preview__status">
										В наличии
									</p>
									<div class="price-preview__main">
										<strong>
											56 200₽
										</strong>
									</div>
								</div>
								<button class="article-product__button">
									положить
									<br>
									в корзину
								</button>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>
<?php $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"main_preview", 
	[
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => [
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "DETAIL_TEXT",
			3 => "",
		],
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => getIblockIdByCode("main_preview"),
		"IBLOCK_TYPE" => "Main",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "3",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => [
			0 => "ID_ICON",
			1 => "",
		],
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "main_preview"
	],
	false
); ?>
<?php $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"main_partners", 
	[
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => [
			0 => "PREVIEW_TEXT",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_TEXT",
			3 => "",
		],
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => getIblockIdByCode("main_partners"),
		"IBLOCK_TYPE" => "Main",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "6",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => [
			0 => "",
			1 => "",
		],
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "main_partners"
	],
	false
); ?>
<div class="main__section">
	<section class="section">
		<div class="container">
			<div class="grid">
				<div class="grid__col grid__col--6 grid__col-tab--12 grid__col-mob--4 mbt-20 mbm-10">
					<h2 class="title title--regular mb-40 mbm-20">
						Оставьте заявку
					</h2>
					<div class="editor editor--middle">
						<ol>
							<li>
								Разрабатываем проекты под
								<br class="tab-hidden">
								нужный бюджет и в строгом
								<br class="tab-hidden">
								соответствии с ТЗ
							</li>
							<li>
								Поможем со всей необходимой
								<br class="tab-hidden">
								документацией, вся продукция
								<br class="tab-hidden">
								сертифицирована
							</li>
							<li>
								Учитываем все методические
								<br class="tab-hidden">
								рекомендации Минпросвещения
							</li>
						</ol>
					</div>
				</div>
				<div class="grid__col grid__col--6 grid__col-tab--12 grid__col-mob--4">
					<!-- Уходит FormData по адресу, указанному в action, автоматически собирает все input и textarea -->
					<form action="./action.php" class="form-contact" data-form="block">
						<div class="form-contact__content">
							<label class="textarea">
								<p class="textarea__title">
									Сообщение
								</p>
								<textarea required class="textarea__field" name="message" placeholder="Опишите ваш запрос"></textarea>
							</label>
							<label class="input">
								<p class="input__title">
									Телефон
								</p>
								<input required type="text" data-mask="phone" name="phone" class="input__field" placeholder="+7 (---) --- -- --">
							</label>
						</div>
						<div class="form-contact__toolbar">
							<button type="submit" class="button button--large button--blue">
                            <span class="button__text" data-form="message">
                                Подобрать оборудование
                            </span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

						