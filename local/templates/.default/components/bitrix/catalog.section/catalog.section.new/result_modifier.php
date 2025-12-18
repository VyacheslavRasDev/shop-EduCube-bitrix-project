<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

use Bitrix\Catalog\PriceTable;

//foreach ($arResult['ITEMS'] as &$item) {
//	if (!empty($item['ID'])) {
//		$allProductPrices = PriceTable::getList([
//			'filter' => [
//				'CATALOG_GROUP.XML_ID' => 'base_price',
//				'PRODUCT_ID' => $item['ID'],
//			],
//		])->fetchAll();
//
//		$item['ALL_PRICES'] = $allProductPrices;
//	}
//}
//unset($item);

//foreach ($arResult['ITEMS'] as &$item) {
//
//	$item['ALL_PRICES'] = [];
//
//	// если есть SKU
//	if (!empty($item['OFFERS'])) {
//
//		foreach ($item['OFFERS'] as $offer) {
//
//			$prices = PriceTable::getList([
//				'order' => [
//					'PRICE' => 'ASC'
//				],
//				'filter' => [
//					'CATALOG_GROUP.XML_ID' => 'base_price',
//					'PRODUCT_ID' => $offer['ID'],
//				],
//				'limit' => 1,
//			])->fetch();
//
//			if ($prices) {
//				$item['ALL_PRICES'][$offer['ID']] = $prices;
//			}
//		}
//
//	} else {
//		// если товар простой
//		$item['ALL_PRICES'] = PriceTable::getList([
//			'filter' => [
//				'CATALOG_GROUP.XML_ID' => 'base_price',
//				'PRODUCT_ID' => $item['ID'],
//			],
//		])->fetch();
//	}
//}
//
//unset($item);

foreach ($arResult['ITEMS'] as &$item) {

	$item['ALL_PRICES'] = [];

	// === Если есть SKU ===
	if (!empty($item['OFFERS'])) {

		$firstOffer = reset($item['OFFERS']);
		$offerId = $firstOffer['ID'];


		$price = PriceTable::getList([
			'order' => [
				'PRICE' => 'ASC'
			],
			'filter' => [
				'CATALOG_GROUP.XML_ID' => 'base_price',
				'PRODUCT_ID' => $offerId,
			],
			'limit' => 1,
		])->fetch();

		if ($price) {
			$item['ALL_PRICES'][$offerId] = $price;
		}

	} else {
		// === Если товар простой ===
		$price = PriceTable::getList([
			'filter' => [
				'CATALOG_GROUP.XML_ID' => 'base_price',
				'PRODUCT_ID' => $item['ID'],
			],
			'limit' => 1,
		])->fetch();

		if ($price) {
			$item['ALL_PRICES'][$item['ID']] = $price;
		}
	}

}

unset($item);

//$prices = PriceTable::getList([
//	'filter' => [
//		'PRODUCT_ID' => $arResult['ID']
//	]
//]);
//
//while ($price = $prices->fetchall()) {
//	$arResult['ALL_PRICES'][] = $price;
//}
// echo '<pre>';
// print_r($arResult['ITEMS'][0]['ALL_PRICES']);