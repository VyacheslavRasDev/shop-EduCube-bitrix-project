<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

$arComponentParameters = [
	"PARAMETERS" => [
		"TEXT" => [
			"PARENT" => "BASE",
			"NAME" => "Текст",
			"TYPE" => "STRING",
			"DEFAULT" => "Введите текст",
		],
		"CACHE_TIME" => ["DEFAULT" => 0],
	],
];
