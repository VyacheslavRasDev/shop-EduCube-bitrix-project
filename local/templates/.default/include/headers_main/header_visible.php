<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

?>

<header class="header" data-header="block">
	<div class="header__static" data-header="static">
		<div class="container">
			<div class="header-layout-main">
				<div class="header-layout-main__cell header-layout-main__cell--logo">
					<picture class="logo-head logo-head--main">
						<!-- Для экранов с шириной до 1320px -->
						<source srcset="<?= DEFAULT_TEMPLATE_PATH ?>/images/logo-regular.svg" media="(max-width: 1320px)">

						<!-- Для экранов шире 1320px -->
						<img src="<?= DEFAULT_TEMPLATE_PATH ?>/images/logo-main.svg" alt="Логотип">
					</picture>
				</div>
				<div class="header-layout-main__cell header-layout-main__cell--main">
					<div class="stack stack--header">
						<div class="header-grid header-grid--main">
							<div class="header-grid__mobile">
								<button class="button-burger" data-menu="button">
									<svg class="button-burger__icon">
										<use href="<?= DEFAULT_TEMPLATE_PATH ?>/favicons/sprite.svg#icon-menu"></use>
									</svg>
									<span class="button-burger__text">
                                    Каталог
                                </span>
								</button>
							</div>
							<? $APPLICATION->IncludeComponent(
								"bitrix:menu",
								"header_main_menu",
								[
									"ALLOW_MULTI_SELECT"    => "N",
									"CHILD_MENU_TYPE"       => "top",
									"DELAY"                 => "N",
									"MAX_LEVEL"             => "1",
									"MENU_CACHE_GET_VARS"   => [
										0 => "",
									],
									"MENU_CACHE_TIME"       => "3600",
									"MENU_CACHE_TYPE"       => "N",
									"MENU_CACHE_USE_GROUPS" => "N",
									"ROOT_MENU_TYPE"        => "top",
									"USE_EXT"               => "N"
								],
								false
							); ?>
							<?php $APPLICATION->IncludeComponent(
								"eduCubeShop:contacts.block",
								".default",
								[
									"PHONE_TEXT" => "+7 (902) 416-34-28",
									"EMAIL" => "ablazeyang@yandex.ru",
									"COMPONENT_TEMPLATE" => ".default",
									"CACHE_TYPE" => "A",
									"CACHE_TIME" => ""
								],
								false
							); ?>
							<div class="header-grid__toolbar">
								<a class="button-header" href="">
                                    <span class="button-header__counter" data-product-counter="block">
                                        2
                                    </span>
									<svg class="button-header__icon">
										<use href="<?= DEFAULT_TEMPLATE_PATH ?>/favicons/sprite.svg#icon-card"></use>
									</svg>
								</a>
							</div>
							<div class="header-grid__separator"></div>
						</div>

						<div class="title title--main tab-hidden">
							<h1>
								Робототехника и оборудование
								<br>
								для учебных учреждений с
								<br>
								гарантией лучшей цены
							</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="header__fixed header__fixed--mobile header__fixed--hidden" data-header="fixed">
		<div class="container">
			<div class="header-layout-regular">
				<div class="header-layout-regular__cell header-layout-regular__cell--logo">
					<a href="./" class="logo-head logo-head--regular">
						<img src="<?= DEFAULT_TEMPLATE_PATH ?>/images/logo-regular.svg" alt="Логотип">
					</a>
				</div>
				<div class="header-layout-regular__cell header-layout-regular__cell--main">
					<div class="header-grid header-grid--regular">
						<div class="header-grid__mobile">
							<button class="button-burger" data-menu="button">
								<svg class="button-burger__icon">
									<use href="<?= DEFAULT_TEMPLATE_PATH ?>/favicons/sprite.svg#icon-menu"></use>
								</svg>
								<span class="button-burger__text">
                                    Каталог
                                </span>
							</button>
						</div>
						<div class="header-grid__nav">
							<nav class="header-nav header-nav--regular">
								<a href="" class="header-nav__link">
									о компании
								</a>
								<a href="" class="header-nav__link">
									оплата и доставка
								</a>
								<a href="" class="header-nav__link">
									блог
								</a>
								<a href="" class="header-nav__link">
									контакты
								</a>
							</nav>
						</div>
						<div class="header-grid__contacts">
							<div class="header-contacts">
								<a href="tel:+74951202186" class="header-contacts__link">
									+7 (495) 120-21-86
								</a>
								<a href="mailto:info@educube.ru" class="header-contacts__link header-contacts__link--accent">
									info@educube.ru
								</a>
							</div>
						</div>
						<div class="header-grid__toolbar">
							<a class="button-header" href="">
                                <span class="button-header__counter" data-product-counter="block">
                                    2
                                </span>
								<svg class="button-header__icon">
									<use href="<?= DEFAULT_TEMPLATE_PATH ?>/favicons/sprite.svg#icon-card"></use>
								</svg>
							</a>
						</div>
						<div class="header-grid__separator"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<section class="menu-layout" data-menu="block" hidden="hidden">
	<button class="menu-layout__button" data-menu="button">
		<svg class="menu-layout__icon">
			<use href="<?= DEFAULT_TEMPLATE_PATH ?>/favicons/sprite.svg#icon-close"></use>
		</svg>
	</button>
	<div class="menu-layout__content">
		<div class="container">
			<div class="grid">
				<div class="grid__col grid__col--5 grid__col-mob--4">
					<!--
					Когда мы в десктоп режиме, то при клике на ссылку справа открывается блок с выбором подкатегорий
					Когда мы в мобилке, то сразу проваливаемся на страницу каталога с родительской категорией.
					В макете вообще не было мобильного меню, и я решил сделать так, иначе оно слишком переусложнено и неудобно для использования
					-->
					<nav class="menu-sidebar">
						<a href="./catalog.html" data-menu-link="1" class="menu-sidebar__link" data-menu="link">
							Конструкторы
						</a>
						<a href="./catalog.html" data-menu-link="2" class="menu-sidebar__link" data-menu="link">
							Дроны
						</a>
						<a href="./catalog.html" data-menu-link="3" class="menu-sidebar__link" data-menu="link">
							3d принтеры
						</a>
						<a href="./catalog.html" data-menu-link="4" class="menu-sidebar__link" data-menu="link">
							Цифровые лаборатории
						</a>
						<a href="./catalog.html" data-menu-link="5" class="menu-sidebar__link" data-menu="link">
							Интерактивное оборудование
						</a>
						<a href="./catalog.html" data-menu-link="6" class="menu-sidebar__link" data-menu="link">
							Мебель
						</a>
						<a href="./catalog.html" data-menu-link="7" class="menu-sidebar__link" data-menu="link">
							Станки
						</a>
						<a href="./catalog.html" data-menu-link="8" class="menu-sidebar__link" data-menu="link">
							VR Оборудование
						</a>
						<a href="./catalog.html" data-menu-link="9" class="menu-sidebar__link" data-menu="link">
							Ноутбуки
						</a>
					</nav>
				</div>
				<div class="grid__col grid__col--6 mob-hidden">
					<div class="grid" hidden="hidden" data-menu="section" data-menu-section="1" id="menu-1">
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									Бренды
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										LEGO Education
									</a>
									<a href="" class="menu-stack__link">
										Tetrix
									</a>
									<a href="" class="menu-stack__link">
										HiTechnic
									</a>
									<a href="" class="menu-stack__link">
										Mindsensors
									</a>
									<a href="" class="menu-stack__link">
										ROBOT C
									</a>
								</nav>
							</div>
						</div>
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									Возраст
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										начальная школа
									</a>
									<a href="" class="menu-stack__link">
										средняя школа
									</a>
									<a href="" class="menu-stack__link">
										детский сад
									</a>
								</nav>
							</div>
						</div>
					</div>
					<div class="grid" hidden="hidden" data-menu="section" data-menu-section="2" id="menu-2">
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									Бренды
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										LEGO Education
									</a>
									<a href="" class="menu-stack__link">
										Tetrix
									</a>
									<a href="" class="menu-stack__link">
										HiTechnic
									</a>
									<a href="" class="menu-stack__link">
										Mindsensors
									</a>
									<a href="" class="menu-stack__link">
										ROBOT C
									</a>
								</nav>
							</div>
						</div>
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									2 Возраст
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										начальная школа
									</a>
									<a href="" class="menu-stack__link">
										средняя школа
									</a>
									<a href="" class="menu-stack__link">
										детский сад
									</a>
								</nav>
							</div>
						</div>
					</div>
					<div class="grid" hidden="hidden" data-menu="section" data-menu-section="3" id="menu-3">
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									3 Бренды
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										LEGO Education
									</a>
									<a href="" class="menu-stack__link">
										Tetrix
									</a>
									<a href="" class="menu-stack__link">
										HiTechnic
									</a>
									<a href="" class="menu-stack__link">
										Mindsensors
									</a>
									<a href="" class="menu-stack__link">
										ROBOT C
									</a>
								</nav>
							</div>
						</div>
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									Возраст
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										начальная школа
									</a>
									<a href="" class="menu-stack__link">
										средняя школа
									</a>
									<a href="" class="menu-stack__link">
										детский сад
									</a>
								</nav>
							</div>
						</div>
					</div>
					<div class="grid" hidden="hidden" data-menu="section" data-menu-section="4" id="menu-4">
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									4 Бренды
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										LEGO Education
									</a>
									<a href="" class="menu-stack__link">
										Tetrix
									</a>
									<a href="" class="menu-stack__link">
										HiTechnic
									</a>
									<a href="" class="menu-stack__link">
										Mindsensors
									</a>
									<a href="" class="menu-stack__link">
										ROBOT C
									</a>
								</nav>
							</div>
						</div>
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									Возраст
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										начальная школа
									</a>
									<a href="" class="menu-stack__link">
										средняя школа
									</a>
									<a href="" class="menu-stack__link">
										детский сад
									</a>
								</nav>
							</div>
						</div>
					</div>
					<div class="grid" hidden="hidden" data-menu="section" data-menu-section="5" id="menu-5">
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									5 Бренды
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										LEGO Education
									</a>
									<a href="" class="menu-stack__link">
										Tetrix
									</a>
									<a href="" class="menu-stack__link">
										HiTechnic
									</a>
									<a href="" class="menu-stack__link">
										Mindsensors
									</a>
									<a href="" class="menu-stack__link">
										ROBOT C
									</a>
								</nav>
							</div>
						</div>
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									Возраст
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										начальная школа
									</a>
									<a href="" class="menu-stack__link">
										средняя школа
									</a>
									<a href="" class="menu-stack__link">
										детский сад
									</a>
								</nav>
							</div>
						</div>
					</div>
					<div class="grid" hidden="hidden" data-menu="section" data-menu-section="6" id="menu-6">
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									6 Бренды
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										LEGO Education
									</a>
									<a href="" class="menu-stack__link">
										Tetrix
									</a>
									<a href="" class="menu-stack__link">
										HiTechnic
									</a>
									<a href="" class="menu-stack__link">
										Mindsensors
									</a>
									<a href="" class="menu-stack__link">
										ROBOT C
									</a>
								</nav>
							</div>
						</div>
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									Возраст
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										начальная школа
									</a>
									<a href="" class="menu-stack__link">
										средняя школа
									</a>
									<a href="" class="menu-stack__link">
										детский сад
									</a>
								</nav>
							</div>
						</div>
					</div>
					<div class="grid" hidden="hidden" data-menu="section" data-menu-section="7" id="menu-7">
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									7 Бренды
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										LEGO Education
									</a>
									<a href="" class="menu-stack__link">
										Tetrix
									</a>
									<a href="" class="menu-stack__link">
										HiTechnic
									</a>
									<a href="" class="menu-stack__link">
										Mindsensors
									</a>
									<a href="" class="menu-stack__link">
										ROBOT C
									</a>
								</nav>
							</div>
						</div>
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									Возраст
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										начальная школа
									</a>
									<a href="" class="menu-stack__link">
										средняя школа
									</a>
									<a href="" class="menu-stack__link">
										детский сад
									</a>
								</nav>
							</div>
						</div>
					</div>
					<div class="grid" hidden="hidden" data-menu="section" data-menu-section="8" id="menu-8">
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									8 Бренды
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										LEGO Education
									</a>
									<a href="" class="menu-stack__link">
										Tetrix
									</a>
									<a href="" class="menu-stack__link">
										HiTechnic
									</a>
									<a href="" class="menu-stack__link">
										Mindsensors
									</a>
									<a href="" class="menu-stack__link">
										ROBOT C
									</a>
								</nav>
							</div>
						</div>
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									Возраст
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										начальная школа
									</a>
									<a href="" class="menu-stack__link">
										средняя школа
									</a>
									<a href="" class="menu-stack__link">
										детский сад
									</a>
								</nav>
							</div>
						</div>
					</div>
					<div class="grid" hidden="hidden" data-menu="section" data-menu-section="9" id="menu-9">
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									9 Бренды
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										LEGO Education
									</a>
									<a href="" class="menu-stack__link">
										Tetrix
									</a>
									<a href="" class="menu-stack__link">
										HiTechnic
									</a>
									<a href="" class="menu-stack__link">
										Mindsensors
									</a>
									<a href="" class="menu-stack__link">
										ROBOT C
									</a>
								</nav>
							</div>
						</div>
						<div class="grid__col grid__col--6">
							<div class="menu-stack">
								<h3 class="menu-stack__title">
									Возраст
								</h3>
								<nav class="menu-stack__main">
									<a href="" class="menu-stack__link">
										начальная школа
									</a>
									<a href="" class="menu-stack__link">
										средняя школа
									</a>
									<a href="" class="menu-stack__link">
										детский сад
									</a>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<div class="grid__col grid__col--1 mob-hidden">
					<div class="picture-menu">
						<img src="<?= DEFAULT_TEMPLATE_PATH ?>/images/1080x1080.jpg" data-menu="picture" hidden="hidden" data-menu-picture="1" alt="">
						<img src="<?= DEFAULT_TEMPLATE_PATH ?>/images/1080x1080.jpg" data-menu="picture" hidden="hidden" data-menu-picture="2" alt="">
						<img src="<?= DEFAULT_TEMPLATE_PATH ?>/images/1080x1080.jpg" data-menu="picture" hidden="hidden" data-menu-picture="3" alt="">
						<img src="<?= DEFAULT_TEMPLATE_PATH ?>/images/1080x1080.jpg" data-menu="picture" hidden="hidden" data-menu-picture="4" alt="">
						<img src="<?= DEFAULT_TEMPLATE_PATH ?>/images/1080x1080.jpg" data-menu="picture" hidden="hidden" data-menu-picture="5" alt="">
						<img src="<?= DEFAULT_TEMPLATE_PATH ?>/images/1080x1080.jpg" data-menu="picture" hidden="hidden" data-menu-picture="6" alt="">
						<img src="<?= DEFAULT_TEMPLATE_PATH ?>/images/1080x1080.jpg" data-menu="picture" hidden="hidden" data-menu-picture="7" alt="">
						<img src="<?= DEFAULT_TEMPLATE_PATH ?>/images/1080x1080.jpg" data-menu="picture" hidden="hidden" data-menu-picture="8" alt="">
						<img src="<?= DEFAULT_TEMPLATE_PATH ?>/images/1080x1080.jpg" data-menu="picture" hidden="hidden" data-menu-picture="9" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="main main--front">