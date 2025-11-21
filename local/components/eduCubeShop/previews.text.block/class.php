<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Main\Engine\Contract\Controllerable;

class SimpleTextComponent extends CBitrixComponent
{
	protected function validateText($text)
	{
		$text = trim($text);
		$text = mb_substr($text, 0, 200);

		return htmlspecialchars($text);
	}
	/**
	 * Метод onPrepareComponentParams приводил и валидирует входящие параметры.
	 */

	/**
	 * Основной метод, который выполняется при вызове компонента
	 */
	public function executeComponent()
	{
		$this->arResult = [
			"HEADER_TEXT" => $this->validateText($this->arParams["HEADER_TEXT"]),
			"BLOCK_TITLE" => $this->validateText($this->arParams["BLOCK_TITLE"]),
			"DESCRIPTION_TEXT" => $this->validateText($this->arParams["DESCRIPTION_TEXT"]),
		];

		$this->includeComponentTemplate();
	}
}
