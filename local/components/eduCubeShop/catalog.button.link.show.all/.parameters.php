<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

$arComponentParameters = [
	'GROUPS'     => [],
	'PARAMETERS' => [
		'LINK_DIRECTORY'         => [
			'PARENT'  => 'BASE',
			'NAME'    => GetMessage('CATALOG_BUTTON_LINK_DIRECTORY_NAME'),
			'TYPE'    => 'HTML',
			'DEFAULT' => 'Ссылка',
			'COLS'    => 80,
			'ROWS'    => 5,
		],
		'NAME_LINK'         => [
			'PARENT'  => 'BASE',
			'NAME'    => GetMessage('CATALOG_BUTTON_NAME_LINK_NAME'),
			'TYPE'    => 'STRING',
			'DEFAULT' => 'Название',
			'COLS'    => 80,
			'ROWS'    => 5,
		],
		'IMAGE_PATH'         => [
			'PARENT'  => 'BASE',
			'NAME'    => GetMessage('CATALOG_BUTTON_IMAGE_PATH_NAME'),
			'TYPE'    => 'HTML',
			'DEFAULT' => 'Путь к картинке',
			'COLS'    => 80,
			'ROWS'    => 5,
		],
		'SPRITE_PATH'         => [
			'PARENT'  => 'BASE',
			'NAME'    => GetMessage('CATALOG_BUTTON_LINK_SPRITE_PATH_NAME'),
			'TYPE'    => 'STRING',
			'DEFAULT' => 'Путь к спрайту',
			'COLS'    => 80,
			'ROWS'    => 5,
		],
		'CACHE_TIME'    => ['DEFAULT' => 3600],
	],
];
?>
