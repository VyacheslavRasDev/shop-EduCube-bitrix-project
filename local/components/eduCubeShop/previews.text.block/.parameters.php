<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

$arComponentParameters = [
	'GROUPS'     => [],
	'PARAMETERS' => [
		'LINE1'         => [
			'PARENT'  => 'BASE',
			'NAME'    => 'Строка',
			'TYPE'    => 'STRING',
			'DEFAULT' => 'Первая строка',
			'COLS'    => 80,
			'ROWS'    => 5,
		],
		'LINE2'         => [
			'PARENT'  => 'BASE',
			'NAME'    => 'Строка 2',
			'TYPE'    => 'STRING',
			'DEFAULT' => 'Вторая строка',
			'COLS'    => 80,
			'ROWS'    => 5,
		],
		'LINE3'         => [
			'PARENT'  => 'BASE',
			'NAME'    => 'Строка 3',
			'TYPE'    => 'STRING',
			'DEFAULT' => 'Третья строка',
			'COLS'    => 80,
			'ROWS'    => 5,
		],
		'CACHE_TIME'    => ['DEFAULT' => 3600],
	],
];
?>
