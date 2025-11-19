<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Main\Engine\Contract\Controllerable;

class SimpleTextComponent extends CBitrixComponent
{
	/**
	 * Метод onPrepareComponentParams приводил и валидирует входящие параметры.
	 */

	/**
	 * Основной метод, который выполняется при вызове компонента
	 */
	public function executeComponent()
	{
		$line1 = trim($this->arParams["LINE1"]);
		$line2 = trim($this->arParams["LINE2"]);
		$line3 = trim($this->arParams["LINE3"]);

		$this->arResult['LINE1'] = $line1;
		$this->arResult['LINE2'] = $line2;
		$this->arResult['LINE3'] = $line3;


		$this->includeComponentTemplate();
	}
}
