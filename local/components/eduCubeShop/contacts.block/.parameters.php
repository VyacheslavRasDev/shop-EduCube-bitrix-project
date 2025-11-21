<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

$arComponentParameters = [
	"PARAMETERS" => [
		"PHONE_NUMBER" => [
			"PARENT" => "BASE",
			"NAME" => GetMessage('CONTACTS_PHONE_NUMBER_NAME'),
			"TYPE" => "STRING",
			"DEFAULT" => "Введите телефон",
		],
		"EMAIL" => [
			"PARENT"  => "BASE",
			"NAME"    => GetMessage('CONTACTS_EMAIL_NAME'),
			"TYPE"    => "STRING",
			"DEFAULT" => "Введите email",
		],
		"CACHE_TIME" => ["DEFAULT" => 0],
	],
];
