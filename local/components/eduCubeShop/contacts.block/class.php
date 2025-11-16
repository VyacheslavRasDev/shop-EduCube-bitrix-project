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

	private function cleanPhone($phone)
	{
		// Убираем всё, кроме цифр и плюса
		$clean = preg_replace('/[^0-9+]/', '', $phone);

		// Если начинается на 8 → превращаем в +7
		if (preg_match('/^8[0-9]{10}$/', $clean)) {
			$clean = '+7' . substr($clean, 1);
		}

		// Если начинается на 7 без плюса → добавляем плюс
		if (preg_match('/^7[0-9]{10}$/', $clean)) {
			$clean = '+' . $clean;
		}

		return $clean;
	}

	/**
	 * Основной метод, который выполняется при вызове компонента
	 */
	public function executeComponent()
	{

		$textPhone = trim($this->arParams["PHONE_TEXT"]);
		$textEmail = trim($this->arParams["EMAIL"]);

		// Чистим телефон и превращаем в ссылку
		$cleanPhone = $this->cleanPhone($textPhone);

		// Передаём в шаблон
		$this->arResult["PHONE_TEXT"] = $textPhone;
		$this->arResult["PHONE_LINK"] = $cleanPhone;
		$this->arResult["EMAIL"]      = $textEmail;

		$this->includeComponentTemplate();
	}
}
