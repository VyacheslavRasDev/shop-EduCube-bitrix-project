<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

$arComponentParameters = [
	'GROUPS'     => [],
	'PARAMETERS' => [
		'HEADER_TEXT'         => [
			'PARENT'  => 'BASE',
			'NAME'    => GetMessage('PREVIEWS_TEXT_HEADER_TEXT_NAME'),
			'TYPE'    => 'STRING',
			'DEFAULT' => 'Первая строка',
			'COLS'    => 80,
			'ROWS'    => 5,
		],
		'BLOCK_TITLE'         => [
			'PARENT'  => 'BASE',
			'NAME'    => GetMessage('PREVIEWS_TEXT_BLOCK_TITLE_NAME'),
			'TYPE'    => 'STRING',
			'DEFAULT' => 'Вторая строка',
			'COLS'    => 80,
			'ROWS'    => 5,
		],
		'DESCRIPTION_TEXT'         => [
			'PARENT'  => 'BASE',
			'NAME'    => GetMessage('PREVIEWS_TEXT_DESCRIPTION_TEXT_NAME'),
			'TYPE'    => 'STRING',
			'DEFAULT' => 'Третья строка',
			'COLS'    => 80,
			'ROWS'    => 5,
		],
		'CACHE_TIME'    => ['DEFAULT' => 3600],
	],
];
?>
