<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Main\Engine\Contract\Controllerable;

class CatalogLink extends CBitrixComponent
{
	protected function validateText($text)
	{
		$text = trim($text);
		$text = mb_substr($text, 0, 200);

		return htmlspecialchars($text);
	}

	/**
	 * Основной метод, который выполняется при вызове компонента
	 */
	public function executeComponent()
	{
		$this->arResult = [
			"LINK_DIRECTORY" => $this->validateText($this->arParams["LINK_DIRECTORY"]),
			"NAME_LINK" => $this->validateText($this->arParams["NAME_LINK"]),
			"LINK" => $this->validateText($this->arParams["LINK"]),
			"SPRITE_PATH" => $this->validateText($this->arParams["SPRITE_PATH"]),
		];

		$this->includeComponentTemplate();
	}
}
