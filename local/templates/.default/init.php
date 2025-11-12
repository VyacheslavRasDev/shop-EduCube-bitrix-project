<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use \Bitrix\Main\Application;
use Bitrix\Main\Page\Asset;
use Bitrix\Main\Page\AssetLocation;

$request = Application::getInstance()->getContext()->getRequest();
$asset   = Asset::getInstance();

$asset->addString('<meta charset="utf-8"> ', false, AssetLocation::BEFORE_CSS);
$asset->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge"> ', false, AssetLocation::BEFORE_CSS);
$asset->addString(' <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">', false, AssetLocation::BEFORE_CSS);

$asset->addString('<meta name="msapplication-TileColor" content="#da532c">', false, AssetLocation::BEFORE_CSS);
$asset->addString('<meta name="theme-color" content="#ffffff">', false, AssetLocation::BEFORE_CSS);

$asset->addString('<link rel="icon" type="image/png" href="' . DEFAULT_TEMPLATE_PATH . '/favicons/favicon-96x96.png" sizes="96x96" />', false, AssetLocation::BEFORE_CSS);
$asset->addString('<link rel="icon" type="image/svg+xml" href="' . DEFAULT_TEMPLATE_PATH . '/favicons/favicon.svg" />', false, AssetLocation::BEFORE_CSS);
$asset->addString('<link rel="shortcut icon"  type="image/x-icon" href="' . DEFAULT_TEMPLATE_PATH . '/favicons/favicon.ico" />', false, AssetLocation::BEFORE_CSS);
$asset->addString('<link rel="apple-touch-icon" sizes="180x180" href="' . DEFAULT_TEMPLATE_PATH . '/favicons/apple-touch-icon.png" />', false, AssetLocation::BEFORE_CSS);
$asset->addString('<link rel="manifest" href="' . DEFAULT_TEMPLATE_PATH . '/favicons/site.webmanifest" />', false, AssetLocation::BEFORE_CSS);

$asset->addCss(DEFAULT_TEMPLATE_PATH . "/main.0fcf.css");
$asset->addJs(DEFAULT_TEMPLATE_PATH . "/bundle.js");

$isMainPage = $request->getRequestedPageDirectory() == "/";