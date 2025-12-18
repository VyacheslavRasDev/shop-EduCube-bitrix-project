<?

use Bitrix\Main\Loader;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

$arViewModeList = [
	'LIST',
	'LINE',
	'TEXT',
	'TILE'
];

$arDefaultParams = [
	'VIEW_MODE'         => 'LIST',
	'SHOW_PARENT_NAME'  => 'Y',
	'HIDE_SECTION_NAME' => 'N'
];

$arParams = array_merge($arDefaultParams, $arParams);

if (!in_array($arParams['VIEW_MODE'], $arViewModeList)) {
	$arParams['VIEW_MODE'] = 'LIST';
}
if ('N' != $arParams['SHOW_PARENT_NAME']) {
	$arParams['SHOW_PARENT_NAME'] = 'Y';
}
if ('Y' != $arParams['HIDE_SECTION_NAME']) {
	$arParams['HIDE_SECTION_NAME'] = 'N';
}

$arResult['VIEW_MODE_LIST'] = $arViewModeList;

if (0 < $arResult['SECTIONS_COUNT']) {
	if ('LIST' != $arParams['VIEW_MODE']) {
		$boolClear     = false;
		$arNewSections = [];
		foreach ($arResult['SECTIONS'] as &$arOneSection) {
			if (1 < $arOneSection['RELATIVE_DEPTH_LEVEL']) {
				$boolClear = true;
				continue;
			}
			$arNewSections[] = $arOneSection;
		}
		unset($arOneSection);
		if ($boolClear) {
			$arResult['SECTIONS']       = $arNewSections;
			$arResult['SECTIONS_COUNT'] = count($arNewSections);
		}
		unset($arNewSections);
	}
}

if (0 < $arResult['SECTIONS_COUNT']) {
	$boolPicture = false;
	$boolDescr   = false;
	$arSelect    = ['ID'];
	$arMap       = [];
	if ('LINE' == $arParams['VIEW_MODE'] || 'TILE' == $arParams['VIEW_MODE']) {
		reset($arResult['SECTIONS']);
		$arCurrent = current($arResult['SECTIONS']);
		if (!isset($arCurrent['PICTURE'])) {
			$boolPicture = true;
			$arSelect[]  = 'PICTURE';
		}
		if ('LINE' == $arParams['VIEW_MODE'] && !array_key_exists('DESCRIPTION', $arCurrent)) {
			$boolDescr  = true;
			$arSelect[] = 'DESCRIPTION';
			$arSelect[] = 'DESCRIPTION_TYPE';
		}
	}
	if ($boolPicture || $boolDescr) {
		foreach ($arResult['SECTIONS'] as $key => $arSection) {
			$arMap[$arSection['ID']] = $key;
		}
		$rsSections = CIBlockSection::GetList([], ['ID' => array_keys($arMap)], false, $arSelect);
		while ($arSection = $rsSections->GetNext()) {
			if (!isset($arMap[$arSection['ID']])) {
				continue;
			}
			$key = $arMap[$arSection['ID']];
			if ($boolPicture) {
				$arSection['PICTURE']                   = intval($arSection['PICTURE']);
				$arSection['PICTURE']                   = (0 < $arSection['PICTURE'] ? CFile::GetFileArray($arSection['PICTURE']) : false);
				$arResult['SECTIONS'][$key]['PICTURE']  = $arSection['PICTURE'];
				$arResult['SECTIONS'][$key]['~PICTURE'] = $arSection['~PICTURE'];
			}
			if ($boolDescr) {
				$arResult['SECTIONS'][$key]['DESCRIPTION']       = $arSection['DESCRIPTION'];
				$arResult['SECTIONS'][$key]['~DESCRIPTION']      = $arSection['~DESCRIPTION'];
				$arResult['SECTIONS'][$key]['DESCRIPTION_TYPE']  = $arSection['DESCRIPTION_TYPE'];
				$arResult['SECTIONS'][$key]['~DESCRIPTION_TYPE'] = $arSection['~DESCRIPTION_TYPE'];
			}
		}
	}
}
?>
<?php
//foreach ($arResult['SECTIONS'] as &$arItem) {
//
//	$sectionData = CIBlockSection::GetList(
//		[],
//		[
//			'IBLOCK_ID' => $arParams['IBLOCK_ID'],
//			'=ID'       => $arItem['ID'],
//		],
//		false,
//		[
//			'ID',
//			'UF_CATEGORIES'
//		]
//	)->Fetch();
//
//	$categoryIds = $sectionData['UF_CATEGORIES'];
//	if (!is_array($categoryIds)) {
//		$categoryIds = [$categoryIds];
//	}
//
//	$categories = [];
//
//	$rsCategories = CIBlockElement::GetList(
//		[],
//		[
//			'ID'     => $categoryIds,
//			'ACTIVE' => 'Y',
//		],
//		false,
//		false,
//		[
//			'ID',
//			'IBLOCK_ID',
//			'NAME',
//			'CODE',
//			'DETAIL_PAGE_URL',
//			"SECTION_PAGE_URL",
//			'PREVIEW_TEXT',
//			'DETAIL_TEXT',
//			'PREVIEW_PICTURE',
//			'DETAIL_PICTURE'
//		]
//	);
//
//	while ($cat = $rsCategories->GetNext()) {
//		if (!empty($cat['PREVIEW_PICTURE'])) {
//			$cat['PREVIEW_PICTURE_SRC'] = CFile::GetPath($cat['PREVIEW_PICTURE']);
//		}
//
//		if (!empty($cat['DETAIL_PICTURE'])) {
//			$cat['DETAIL_PICTURE_SRC'] = CFile::GetPath($cat['DETAIL_PICTURE']);
//		}
//
//		$categories[] = $cat;
//	}
//
//	$arItem['CATEGORIES_ITEMS'] = $categories;
//}
//unset($arItem);
//?>
<?php
//foreach ($arResult['SECTIONS'] as &$section) {
//	if (empty($section['ID'])) {
//		continue;
//	}
//
//	// массив для подразделов
//	$section['SUBSECTIONS'] = [];
//
//	// запрос подразделов
//	$rsSubsections = CIBlockSection::GetList(
//		['SORT' => 'ASC'],
//		[
//			'IBLOCK_ID'  => $section['IBLOCK_ID'],
//			'SECTION_ID' => $section['ID'],
//			'ACTIVE'     => 'Y',
//		],
//		false,
//		[
//			'ID',
//			'NAME',
//			'CODE',
//			'SECTION_PAGE_URL',
//			'PICTURE',
//			'DESCRIPTION'
//		]
//	);
//
//	while ($sub = $rsSubsections->GetNext()) {
//		// картинка
//		$sub['PICTURE_SRC'] = !empty($sub['PICTURE'])
//			? CFile::GetPath($sub['PICTURE'])
//			: null;
//
//		$section['SUBSECTIONS'][] = $sub;
//	}
//}
//
//unset($section);
//?>

<?php
//$sections = [];
//
//foreach ($arResult["SECTIONS"] as $section) {
//
//	if ($section["DEPTH_LEVEL"] == 1) {
//		$sections[$section["ID"]]                = $section;
//		$sections[$section["ID"]]["SUBSECTIONS"] = [];
//	} elseif ($section["DEPTH_LEVEL"] == 2) {
//		$sections[$section["IBLOCK_SECTION_ID"]]["SUBSECTIONS"][] = $section;
//	}
//}
//
//$arResult["TREE"] = $sections;
//?>
<?php
//$sectionsTree = [];
//$indexId = [];
//
//foreach ($arResult["SECTIONS"] as $index => $section) {
//
//	if ($section["DEPTH_LEVEL"] == 1) {
//
//		$arResult["SECTIONS"][$index]["SUBSECTIONS"] = [];
//		$indexId[$section["ID"]] = $index;
//		$sectionsTree[$section["ID"]] = $section;
//		$sectionsTree[$section["ID"]]["SUBSECTIONS"] = [];
//
//	} elseif($section["DEPTH_LEVEL"] == 2) {
//
//		$parentId = $section["IBLOCK_SECTION_ID"];
//
//		if (isset($indexId[$parentId])) {
//
//			$parentIndex = $indexId[$parentId];
//			$arResult["SECTIONS"][$parentIndex]["SUBSECTIONS"][] = $section;
//		}
//	}
//}
//
//$arResult["SECTIONS"] = $sectionsTree;
//?>
<?php
if (empty($arResult['SECTIONS'])) {
	return;
}

$newSections = [];

foreach ($arResult['SECTIONS'] as $section) {
	$section['SUBSECTIONS']      = [];
	$newSections[$section['ID']] = $section;
}

foreach ($arResult['SECTIONS'] as $section) {
	if ($section['DEPTH_LEVEL'] == 2) {
		$parentId = $section['IBLOCK_SECTION_ID'];
		if (isset($newSections[$parentId])) {
			$newSections[$parentId]['SUBSECTIONS'][] = $section;
		}
	}
}


$arResult['SECTIONS'] = array_values(array_filter($newSections, function ($s) {
	return $s['DEPTH_LEVEL'] == 1;
}));

$arResult['SECTIONS_COUNT'] = count($arResult['SECTIONS']);


