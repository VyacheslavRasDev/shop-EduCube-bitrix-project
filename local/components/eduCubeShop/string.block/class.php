<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Main\Engine\Contract\Controllerable;

class MySimpleTextComponent extends CBitrixComponent
{
	/**
	 * Метод onPrepareComponentParams приводил и валидирует входящие параметры.
	 */

	/**
	 * Основной метод, который выполняется при вызове компонента
	 */
	public function executeComponent()
	{
		$string = $this->arParams["TEXT"];

		$this->arResult["TEXT"] = $string;

		$this->includeComponentTemplate();
	}
}
