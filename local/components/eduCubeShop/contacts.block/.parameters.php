<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

$arComponentParameters = [
	"PARAMETERS" => [
		"PHONE_TEXT" => [
			"PARENT" => "BASE",
			"NAME" => "Телефон",
			"TYPE" => "STRING",
			"DEFAULT" => "Введите телефон",
		],
		"EMAIL" => [
			"PARENT"  => "BASE",
			"NAME"    => "Почта",
			"TYPE"    => "STRING",
			"DEFAULT" => "Введите email",
		],
		"CACHE_TIME" => ["DEFAULT" => 0],
	],
];
