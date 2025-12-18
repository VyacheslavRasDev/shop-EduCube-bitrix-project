<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Main\Localization\Loc;

/**
 * @global CMain                $APPLICATION
 * @var array                   $arParams
 * @var array                   $item
 * @var array                   $actualItem
 * @var array                   $minOffer
 * @var array                   $itemIds
 * @var array|null              $price
 * @var float|int|null          $measureRatio
 * @var bool                    $haveOffers
 * @var bool                    $showSubscribe
 * @var array                   $morePhoto
 * @var bool                    $showSlider
 * @var bool                    $itemHasDetailUrl
 * @var string                  $imgTitle
 * @var string                  $productTitle
 * @var string                  $buttonSizeClass
 * @var string                  $discountPositionClass
 * @var string                  $labelPositionClass
 * @var CatalogSectionComponent $component
 */
?>

<?php
////echo '<pre>';
////print_r($price);
////?>
<article class="article-product">
	<div class="article-product__header">
		<a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="article-product__title" title="<?= $productTitle ?>">
			<?= $productTitle ?>
		</a>
	</div>
	<a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="article-product__picture" title="<?= $imgTitle ?>">
		<img id="<?= $itemIds['PICT'] ?>" src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="Набор LEGO® Education BricQ Motion Старт">
	</a>

	<div class="article-product__footer">
		<?
		foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName) {
			switch ($blockName) {
				//отвечает за цены
				case 'price': ?>
					<div class="price-preview" data-entity="price-block">
						<span class="price-preview__status">
							<?php if (!empty($item['CATALOG_QUANTITY'])) { ?>
								<?= 'В наличии'; ?>
							<?php } ?>
						</span>
<!--						--><?php
//						echo '<pre>';
//						print_r($price);
//						?>
						<div class="price-preview__main">
							<strong id="<?= $itemIds['PRICE'] ?>">
								<?
								if (!empty($price)) {
									if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers) {
										echo Loc::getMessage(
											'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
											[
												'#PRICE#' => $price['PRINT_RATIO_PRICE'],
												'#VALUE#' => $measureRatio,
												'#UNIT#'  => $minOffer['ITEM_MEASURE']['TITLE']
											]
										);
									} else {
										echo $price['PRINT_BASE_PRICE'];
									}
								}
								?>
							</strong>
							<?php ?>
							<div id="<?= $itemIds['PRICE_OLD'] ?>">
							<del>
								<?php if ($arParams['SHOW_OLD_PRICE'] === 'Y') {
									foreach ($item['ALL_PRICES'] as $oldPrice) { ?>
										<?php if ($oldPrice['PRICE'] > $price['PRICE']) { ?>
											<?= CCurrencyLang::CurrencyFormat($oldPrice["PRICE"], $oldPrice["CURRENCY"], true); ?>
										<?php } ?>
									<?php } ?>
								<?php } ?>
							</del>
							</div>
						</div>
					</div>
					<?php break;
			}
		}
		?>


		<?
		foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName) {
			switch ($blockName) {
				case 'buttons':
					?>
					<div data-entity="buttons-block" data-product="261">
						<?
						// если нет  предложения
						if (!$haveOffers) {
							// если может купить
							if ($actualItem['CAN_BUY']) {
								?>
								<div id="<?= $itemIds['BASKET_ACTIONS'] ?>">
									<!--фраза добавления либо покупки, фраза написанная на самой кнопке-->
									<button class="article-product__button" id="<?= $itemIds['BUY_LINK'] ?>" href="javascript:void(0)" rel="nofollow">
										<?= ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) ?>
									</button>
								</div>
								<?
							} else {
								//нельзя купить
								?>
								<div>
									<?
									// если нет предложения, то выводится кнопка подписки на уведомления о поступлении
									if ($showSubscribe) {
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											[
												'PRODUCT_ID'         => $actualItem['ID'],
												'BUTTON_ID'          => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS'       => 'btn btn-default ' . $buttonSizeClass,
												'DEFAULT_DISPLAY'    => true,
												'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
											],
											$component,
											['HIDE_ICONS' => 'Y']
										);
									}
									//сообщение нет в наличии
									?>
									<button id="<?= $itemIds['NOT_AVAILABLE_MESS'] ?>" href="javascript:void(0)" rel="nofollow">
										<?= $arParams['CT_BCI_TPL_MESS_AVAILABLE'] ?>
									</button>
								</div>
								<?
							}
						} else { // если есть предложения
							// если выключена возможность добавления карточки товара, то выводится кнопка подробнее. За это отвечает PRODUCT_DISPLAY_MODE
							if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y') {
								?>
								<?
								// подписка на продукт
								if ($showSubscribe) {
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.product.subscribe',
										'',
										[
											'PRODUCT_ID'         => $item['ID'],
											'BUTTON_ID'          => $itemIds['SUBSCRIBE_LINK'],
											'BUTTON_CLASS'       => 'btn btn-default ' . $buttonSizeClass,
											'DEFAULT_DISPLAY'    => !$actualItem['CAN_BUY'],
											// если sku нет сразу показываем корзину
											'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
										],
										$component,
										['HIDE_ICONS' => 'Y']
									);
								}
								?>
								<!--	нет в наличии для sku!-->
								<span class="article-product__button" id="<?= $itemIds['NOT_AVAILABLE_MESS'] ?>" href="javascript:void(0)" rel="nofollow"
								<?= ($actualItem['CAN_BUY'] ? 'style="display: none;"' : '') ?>>
								<?= $arParams['MESS_NOT_AVAILABLE'] ?>
								</span>
								<!--								кнопка покупки-->
								<div  id="<?= $itemIds['BASKET_ACTIONS'] ?>" <?= ($actualItem['CAN_BUY'] ? '' : 'style="display: none;"') ?>>
									<button class="article-product__button" id="<?= $itemIds['BUY_LINK'] ?>" href="javascript:void(0)" rel="nofollow">
										<?= "положить" ?> <br> <?= "в корзину" ?>
<!--										--><?php //= ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) ?>
<!--										--><?php //= ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) ?>
									</button>
								</div>
								<?
							} else {
								?>
								<!--нельзя купить сразу, перевод на детальную -->
								<div>
									<a href="<?= $item['DETAIL_PAGE_URL'] ?>">
										<?= $arParams['MESS_BTN_DETAIL'] ?>
									</a>
								</div>
								<?
							}
						}
						?>
					</div>
					<?
					break;
					?>
				<?
			}
		}
		?>
	</div>
</article>
