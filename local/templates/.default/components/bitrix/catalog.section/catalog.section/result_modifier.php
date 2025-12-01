<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;
use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

Loader::includeModule('highloadblock');

$hlblockId = 7;

$hlblock = HL\HighloadBlockTable::getById($hlblockId)->fetch();
$entity = HL\HighloadBlockTable::compileEntity($hlblock);
$entityClass = $entity->getDataClass();

$brands = [];
$rsData = $entityClass::getList([
	'select' => ['*'],
]);

while ($brand = $rsData->fetch()) {
	if ($brand['UF_PICTURE']) {
		$brand['UF_PICTURE_SRC'] = CFile::GetPath($brand['UF_PICTURE']);
	}

	$brands[$brand['UF_XML_ID']] = $brand;
}

$arResult['BRANDS'] = $brands;