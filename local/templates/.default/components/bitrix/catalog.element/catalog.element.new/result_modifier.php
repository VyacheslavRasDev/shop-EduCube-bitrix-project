<?

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Catalog\PriceTable;

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent  $component
 */

$component = $this->getComponent();
$arParams  = $component->applyTemplateModifications();


$arResult['OLD_PRICE'] = [];
$offerId = $arResult['OFFERS'][0]['ID'];

$delPrice = Pricetable::getList([
	'order' => [
		'PRICE' => 'ASC'
	],
	'filter' => [
		'CATALOG_GROUP.XML_ID' => 'base_price',
		'PRODUCT_ID'           => $offerId,
	],
	'limit'  => 1,
])->Fetchall();

$arResult['OLD_PRICE'] = $delPrice;

//echo '<pre>';
//print_r($arResult['OLD_PRICE']);

//if (!empty($arResult['ID'])) {
//
//	// Получаем базовую (старую) цену товара
//	$allProductPrices = PriceTable::getList([
//		"filter" => [
//			"CATALOG_GROUP.XML_ID" => "base_price",
//			"=PRODUCT_ID" => $arResult['ID'],
//		],
//	])->fetchAll();
//
//	// Сохраняем массив в $arResult
//	$arResult['ALL_PRICES'] = $allProductPrices;
//}

//	$item['ALL_PRICES'] = [];
//
//	// === Если есть SKU ===
//	if (!empty($item)) {
//
//		$offerId = $item['ID'];
//
//		$price = PriceTable::getList([
//			'order' => [
//				'PRICE' => 'ASC'
//			],
//			'filter' => [
//				'CATALOG_GROUP.XML_ID' => 'base_price',
//				'PRODUCT_ID' => $offerId,
//			],
//			'limit' => 1,
//		])->fetch();
//
//		if ($price) {
//
//			$item['ALL_PRICES'][$offerId] = $price;
//
//		}
//
//	} else {
//
//		// === Если товар простой ===
//		$price = PriceTable::getList([
//			'filter' => [
//				'CATALOG_GROUP.XML_ID' => 'base_price',
//				'PRODUCT_ID' => $arResult['ID'],
//			],
//			'limit' => 1,
//		])->fetch();
//
//		if ($price) {
//			$item['ALL_PRICES'][$arResult['ID']] = $price;
//		}
//	}
//
//
//
//unset($item);

//echo '<pre>';
//print_r($price);