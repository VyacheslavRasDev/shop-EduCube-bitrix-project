<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/templates/.default/include/headers_main/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/templates/.default/include/headers_main/header_visible.php';
?>

<div class="main__section">
	<section class="section tab-hidden">
		<div class="container">
			<nav class="nav">
				<div class="nav__controls">
					<button class="button-burger" data-menu="button">
						<svg class="button-burger__icon">
							<use href="<?= DEFAULT_TEMPLATE_PATH?>/favicons/sprite.svg#icon-menu"></use>
						</svg>
					</button>
				</div>
				<a href="" class="nav__link">
					LEGO Education
				</a>
				<a href="" class="nav__link">
					Dobot
				</a>
				<a href="" class="nav__link">
					DJI
				</a>
				<a href="" class="nav__link">
					Coex
				</a>
				<a href="" class="nav__link">
					Наборы VEX
				</a>
				<a href="" class="nav__link">
					Квадрокоптеры
				</a>
				<a href="" class="nav__link">
					Мебель и поля
				</a>
				<a href="" class="nav__link">
					Наборы Амперка
				</a>
			</nav>
		</div>
	</section>

</div>
<div class="main__section mb-60 mbm-25">
	<section class="section">
		<div class="container">
			<article class="promo promo--large bg-green">
				<div class="promo__header">
					<h2 class="title title--regular">
						Учись дома со Spike
						<sup>TM</sup>
						Prime
					</h2>
				</div>
				<div class="promo__content">
					<div class="editor editor--promo">
						<p>
							Lego Education
							<br>
							совместно с Фоксфорд
						</p>
					</div>
					<div class="promo__control">
						<a href="#" class="button button--middle button--blue-invert">
							<span class="button__text">Запросить</span>
						</a>
					</div>
				</div>
				<div class="promo__footer">
					<img src="./assets/images/logo-fox.svg" alt="">
				</div>
				<div class="promo__age">
					<div class="age">
                    <span class="age__text">
                        10+ <br> лет
                    </span>
					</div>
				</div>
				<picture class="promo__picture">
					<img src="./assets/images/1080x1080.jpg" alt="">
				</picture>
			</article>
		</div>
	</section>

</div>
<div class="main__section mb-180 mbt-150 mbm-100">
	<section class="section">
		<div class="container">
			<div class="grid">
				<div class="grid__col grid__col--3 grid__col-tab--6 grid__col-mob--4">
					<article class="article-factoid">
						<svg class="article-factoid__icon">
							<use href="./assets/sprite.svg#icon-factoid-1"></use>
						</svg>
						<p class="article-factoid__text">
							разработаем
							<br>
							техническое
							<br>
							задание
						</p>
					</article>
				</div>
				<div class="grid__col grid__col--3 grid__col-tab--6 grid__col-mob--4">
					<article class="article-factoid">
						<svg class="article-factoid__icon">
							<use href="./assets/sprite.svg#icon-factoid-2"></use>
						</svg>
						<p class="article-factoid__text">
							оплата 30/70
							<br>
							или полная
							<br>
							постоплата (44ФЗ)
						</p>
					</article>
				</div>
				<div class="grid__col grid__col--3 grid__col-tab--6 grid__col-mob--4">
					<article class="article-factoid">
						<svg class="article-factoid__icon">
							<use href="./assets/sprite.svg#icon-factoid-3"></use>
						</svg>
						<p class="article-factoid__text">
							Широкий выбор
							<br>
							способов
							<br>
							доставки
						</p>
					</article>
				</div>
				<div class="grid__col grid__col--3 grid__col-tab--6 grid__col-mob--4">
					<article class="article-factoid">
						<svg class="article-factoid__icon">
							<use href="./assets/sprite.svg#icon-factoid-4"></use>
						</svg>
						<p class="article-factoid__text">
							оплата при
							<br>
							получении для
							<br>
							физических лиц
						</p>
					</article>
				</div>
			</div>
		</div>
	</section>

</div>
<div class="main__section mb-130 mbt-150 mbm-100">
	<section class="section">
		<div class="container">
			<h2 class="title title--regular mb-30 mbm-20">
				Каталог
			</h2>
			<div class="catalog">
				<div class="catalog__content">
					<div class="grid">
						<div class="grid__col grid__col--6 grid__col-mob--12">
							<article class="article-category article-category--large-top">
								<div class="article-category__head">
									<h2 class="article-category__title">
										Конструкторы
									</h2>
									<div class="article-category__caption">
										<div class="editor-simple">
											<p>
												наборы для сборки и изучения различных моделей
											</p>
										</div>
									</div>
								</div>
								<div class="article-category__content">
									<div class="article-category__columns">
										<div class="article-category__column">
											<a class="article-category__link" href="">
												LEGO Education
											</a>
											<a class="article-category__link" href="">
												Tetrix
											</a>
											<a class="article-category__link" href="">
												HiTechnic
											</a>
											<a class="article-category__link" href="">
												Mindsensors
											</a>
											<a class="article-category__link" href="">
												ROBOT C
											</a>
										</div>
										<div class="article-category__column">
											<a class="article-category__link" href="">
												начальная школа
											</a>
											<a class="article-category__link" href="">
												средняя школа
											</a>
											<a class="article-category__link" href="">
												детский сад
											</a>
										</div>
									</div>
									<a href="#" class="article-category__button">
                            <span>
                                Смотреть все
                            </span>
										<svg>
											<use href="./assets/sprite.svg#icon-next"></use>
										</svg>
									</a>
								</div>
								<picture class="article-category__picture">
									<img src="./assets/images/1080x1080.jpg" alt="#">
								</picture>
							</article>
						</div>
						<div class="grid__col grid__col--6 grid__col-mob--12">
							<article class="article-category article-category--large-top">
								<div class="article-category__head">
									<h2 class="article-category__title">
										Дроны
									</h2>
									<div class="article-category__caption">
										<div class="editor-simple">
											<p>
												квадрокоптеры для обучения полётам и сборке и аксессуары
											</p>
										</div>
									</div>
								</div>
								<div class="article-category__content">
									<div class="article-category__columns">
										<div class="article-category__column">
											<a class="article-category__link" href="">
												DJI
											</a>
											<a class="article-category__link" href="">
												Geprc
											</a>
											<a class="article-category__link" href="">
												Flywoo
											</a>
											<a class="article-category__link" href="">
												Betafpv
											</a>
											<a class="article-category__link" href="">
												Happymodel
											</a>
										</div>
										<div class="article-category__column">
											<a class="article-category__link" href="">
												начальная школа
											</a>
											<a class="article-category__link" href="">
												средняя школа
											</a>
											<a class="article-category__link" href="">
												детский сад
											</a>
										</div>
									</div>
									<a href="#" class="article-category__button">
                            <span>
                                Смотреть все
                            </span>
										<svg>
											<use href="./assets/sprite.svg#icon-next"></use>
										</svg>
									</a>
								</div>
								<picture class="article-category__picture">
									<img src="./assets/images/1080x1080.jpg" alt="#">
								</picture>
							</article>
						</div>
						<div class="grid__col grid__col--6 grid__col-mob--12">
							<article class="article-category article-category--large-top">
								<div class="article-category__head">
									<h2 class="article-category__title">
										3D-принтеры
									</h2>
									<div class="article-category__caption">
										<div class="editor-simple">
											<p>
												устройства для печати объемных моделей и аксессуары
											</p>
										</div>
									</div>
								</div>
								<div class="article-category__content">
									<div class="article-category__columns">
										<div class="article-category__column">
											<a class="article-category__link" href="">
												Tiertime
											</a>
											<a class="article-category__link" href="">
												PRUSA
											</a>
											<a class="article-category__link" href="">
												Anycubic
											</a>
											<a class="article-category__link" href="">
												Wanhao
											</a>
										</div>
										<div class="article-category__column">
											<a class="article-category__link" href="">
												начальная школа
											</a>
											<a class="article-category__link" href="">
												средняя школа
											</a>
											<a class="article-category__link" href="">
												детский сад
											</a>
										</div>
									</div>
									<a href="#" class="article-category__button">
                            <span>
                                Смотреть все
                            </span>
										<svg>
											<use href="./assets/sprite.svg#icon-next"></use>
										</svg>
									</a>
								</div>
								<picture class="article-category__picture">
									<img src="./assets/images/1080x1080.jpg" alt="#">
								</picture>
							</article>
						</div>
						<div class="grid__col grid__col--6 grid__col-mob--12">
							<article class="article-category article-category--large-top">
								<div class="article-category__head">
									<h2 class="article-category__title">
										Цифровые лаборатории
									</h2>
									<div class="article-category__caption">
										<div class="editor-simple">
											<p>
												цифровые решения для проведения научных экспериментов
											</p>
										</div>
									</div>
								</div>
								<div class="article-category__content">
									<div class="article-category__columns">
										<div class="article-category__column">
											<a class="article-category__link" href="">
												Robbo
											</a>
											<a class="article-category__link" href="">
												SenseDisc
											</a>
											<a class="article-category__link" href="">
												Relab
											</a>
											<a class="article-category__link" href="">
												Унитех
											</a>
										</div>
										<div class="article-category__column">
											<a class="article-category__link" href="">
												начальная школа
											</a>
											<a class="article-category__link" href="">
												средняя школа
											</a>
											<a class="article-category__link" href="">
												детский сад
											</a>
										</div>
									</div>
									<a href="#" class="article-category__button">
                            <span>
                                Смотреть все
                            </span>
										<svg>
											<use href="./assets/sprite.svg#icon-next"></use>
										</svg>
									</a>
								</div>
								<picture class="article-category__picture">
									<img src="./assets/images/1080x1080.jpg" alt="#">
								</picture>
							</article>
						</div>
						<div class="grid__col grid__col--6 grid__col-mob--12">
							<article class="article-category article-category--large-bottom">
								<div class="article-category__head">
									<h2 class="article-category__title">
										Интерактивное оборудование
									</h2>
									<div class="article-category__caption">
										<div class="editor-simple">
											<p>
												интерактивные доски и панели, а также аксессуары для них
											</p>
										</div>
									</div>
								</div>
								<div class="article-category__content">
									<div class="article-category__columns">
										<div class="article-category__column">
											<a class="article-category__link" href="">
												EliteBoard
											</a>
											<a class="article-category__link" href="">
												NEWLINE
											</a>
											<a class="article-category__link" href="">
												Next Touch
											</a>
											<a class="article-category__link" href="">
												Smart.
											</a>
										</div>
									</div>
									<a href="#" class="article-category__button">
                            <span>
                                Смотреть все
                            </span>
										<svg>
											<use href="./assets/sprite.svg#icon-next"></use>
										</svg>
									</a>
								</div>
								<picture class="article-category__picture">
									<img src="./assets/images/1080x1080.jpg" alt="#">
								</picture>
							</article>
						</div>
						<div class="grid__col grid__col--6 grid__col-mob--12">
							<article class="article-category article-category--large-bottom">
								<div class="article-category__head">
									<h2 class="article-category__title">
										Мебель
									</h2>
									<div class="article-category__caption">
										<div class="editor-simple">
											<p>
												школьная и лабораторная мебель
											</p>
										</div>
									</div>
								</div>
								<div class="article-category__content">
									<div class="article-category__columns">
										<div class="article-category__column">
											<a class="article-category__link" href="">
												LEGO Education
											</a>
											<a class="article-category__link" href="">
												MACOP
											</a>
										</div>
									</div>
									<a href="#" class="article-category__button">
                            <span>
                                Смотреть все
                            </span>
										<svg>
											<use href="./assets/sprite.svg#icon-next"></use>
										</svg>
									</a>
								</div>
								<picture class="article-category__picture">
									<img src="./assets/images/1080x1080.jpg" alt="#">
								</picture>
							</article>
						</div>
						<div class="grid__col grid__col--4 grid__col-mob--12">
							<article class="article-category article-category--small">
								<div class="article-category__head">
									<h2 class="article-category__title">
										Станки
									</h2>
									<div class="article-category__caption">
										<div class="editor-simple">
											<p>
												оборудование для резки и гравировки
											</p>
										</div>
									</div>
								</div>
								<div class="article-category__content">
									<div class="article-category__columns">
										<div class="article-category__column">
											<a class="article-category__link" href="">
												Makeblock
											</a>
											<a class="article-category__link" href="">
												TOOCAA
											</a>
										</div>
									</div>
									<a href="#" class="article-category__button">
                            <span>
                                Смотреть все
                            </span>
										<svg>
											<use href="./assets/sprite.svg#icon-next"></use>
										</svg>
									</a>
								</div>
								<picture class="article-category__picture">
									<img src="./assets/images/1080x1080.jpg" alt="#">
								</picture>
							</article>
						</div>
						<div class="grid__col grid__col--4 grid__col-mob--12">
							<article class="article-category article-category--small">
								<div class="article-category__head">
									<h2 class="article-category__title">
										VR
									</h2>
									<div class="article-category__caption">
										<div class="editor-simple">
											<p>
												устройства для виртуальной реальности
											</p>
										</div>
									</div>
								</div>
								<div class="article-category__content">
									<div class="article-category__columns">
										<div class="article-category__column">
											<a class="article-category__link" href="">
												PolyVR
											</a>
										</div>
									</div>
									<a href="#" class="article-category__button">
                            <span>
                                Смотреть все
                            </span>
										<svg>
											<use href="./assets/sprite.svg#icon-next"></use>
										</svg>
									</a>
								</div>
								<picture class="article-category__picture">
									<img src="./assets/images/1080x1080.jpg" alt="#">
								</picture>
							</article>
						</div>
						<div class="grid__col grid__col--4 grid__col-mob--12">
							<article class="article-category article-category--small">
								<div class="article-category__head">
									<h2 class="article-category__title">
										Ноутбуки
									</h2>
									<div class="article-category__caption">
										<div class="editor-simple">
											<p>
												компьютеры и комплектующие для обучения и работы
											</p>
										</div>
									</div>
								</div>
								<div class="article-category__content">
									<div class="article-category__columns">
										<div class="article-category__column">
											<a class="article-category__link" href="">
												ACER
											</a>
											<a class="article-category__link" href="">
												GIGABYTE
											</a>
										</div>
									</div>
									<a href="#" class="article-category__button">
                            <span>
                                Смотреть все
                            </span>
										<svg>
											<use href="./assets/sprite.svg#icon-next"></use>
										</svg>
									</a>
								</div>
								<picture class="article-category__picture">
									<img src="./assets/images/1080x1080.jpg" alt="#">
								</picture>
							</article>
						</div>
					</div>
				</div>
				<div class="catalog__pagination">
					<button class="button button--small button--grey-invert">
                    <span class="button__text">
                        Показать все категории
                    </span>
						<svg class="button__icon">
							<use href="./assets/sprite.svg#icon-drop"></use>
						</svg>
					</button>
				</div>
			</div>
		</div>
	</section>

</div>
<div class="main__section mb-135 mbt-150 mbm-100">
	<section class="section">
		<div class="container">
			<h2 class="title title--regular mb-30 mbm-20">
				Рекомендуемые товары
			</h2>
			<div class="swiper slider-recommended" data-slider="recommended">
				<div class="swiper-wrapper slider-recommended__wrapper">
					<div class="swiper-slide slider-recommended__slide">
						<article class="article-product">
							<div class="article-product__header">
								<a href="" class="article-product__title">
									Набор LEGO® Education BricQ Motion Старт
								</a>
							</div>
							<a href="" class="article-product__picture">
								<img src="./assets/images/1920x1080.jpg" alt="Набор LEGO® Education BricQ Motion Старт">
							</a>
							<div class="article-product__footer">
								<div class="price-preview">
									<p class="price-preview__status">
										В наличии
									</p>
									<div class="price-preview__main">
										<strong>
											56 200₽
										</strong>
										<del>
											87 200₽
										</del>
									</div>
								</div>
								<!-- значение параметра - id товара, если он в корзине при обновлении страницы, меня текст на "в корзине" -->
								<button class="article-product__button" data-product="123">
									положить
									<br>
									в корзину
								</button>
							</div>
						</article>
					</div>
					<div class="swiper-slide slider-recommended__slide">
						<article class="article-product">
							<div class="article-product__header">
								<a href="" class="article-product__title">
									LEGO MINDSTORMS EV3 45544 базовый набор
								</a>
							</div>
							<a href="" class="article-product__picture">
								<img src="./assets/images/1920x1080.jpg" alt="Набор LEGO® Education BricQ Motion Старт">
							</a>
							<div class="article-product__footer">
								<div class="price-preview">
									<p class="price-preview__status">
										В наличии
									</p>
									<div class="price-preview__main">
										<strong>
											56 200₽
										</strong>
									</div>
								</div>
								<button class="article-product__button">
									положить
									<br>
									в корзину
								</button>
							</div>
						</article>
					</div>
					<div class="swiper-slide slider-recommended__slide">
						<article class="article-product">
							<div class="article-product__header">
								<a href="" class="article-product__title">
									LEGO MINDSTORMS EV3 45544 базовый набор
								</a>
							</div>
							<a href="" class="article-product__picture">
								<img src="./assets/images/1920x1080.jpg" alt="Набор LEGO® Education BricQ Motion Старт">
							</a>
							<div class="article-product__footer">
								<div class="price-preview">
									<p class="price-preview__status">
										В наличии
									</p>
									<div class="price-preview__main">
										<strong>
											56 200₽
										</strong>
									</div>
								</div>
								<button class="article-product__button">
									положить
									<br>
									в корзину
								</button>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>
<div class="main__section mb-125 mbt-160 mbm-100">
	<section class="section">
		<div class="container">
			<div class="grid mb-35 mbm-25">
				<div class="grid__col grid__col--6 grid__col-mob--4">
					<h2 class="title title--regular">
						Мы растим в России новое поколение гениальных инженеров
					</h2>
				</div>
			</div>
			<div class="caption-line mb-40 mbm-35">
            <span class="caption-line__text">
                Наша миссия
            </span>
			</div>
			<div class="grid mb-85 mbt-65 mbm-50">
				<div class="grid__col grid__col--6 grid__col-tab--9 grid__col-mob--4">
					<div class="editor editor--large">
						<p>
							Мы работаем для того, чтобы в России подрастало новое поколение талантливых и влюблённых в своё дело юных инженеров,
							робототехников и пилотов.
						</p>
					</div>
				</div>
			</div>
			<div class="grid">
				<div class="grid__col grid__col--4 grid__col-tab--12 grid__col-mob--12">
					<article class="article-feature">
						<svg class="article-feature__icon">
							<use href="./assets/sprite.svg#icon-handshake"></use>
						</svg>
						<div class="article-feature__content">
							<h3 class="article-feature__title">
								Используем опыт
								<br>
								2.500 проектов
							</h3>
							<div class="article-feature__caption">
								<div class="editor-simple">
									<p>
										Мы реализовали более 2.500 проектов для образовательных учреждений в России
									</p>
								</div>
							</div>
						</div>
					</article>
				</div>
				<div class="grid__col grid__col--4 grid__col-tab--12 grid__col-mob--12">
					<article class="article-feature">
						<svg class="article-feature__icon">
							<use href="./assets/sprite.svg#icon-drone"></use>
						</svg>
						<div class="article-feature__content">
							<h3 class="article-feature__title">
								Сами производим
								<br>
								продукцию
							</h3>
							<div class="article-feature__caption">
								<div class="editor-simple">
									<p>
										Производим квадрокоптеры для целей образования под брендом LBS TT
									</p>
								</div>
							</div>
						</div>
					</article>
				</div>
				<div class="grid__col grid__col--4 grid__col-tab--12 grid__col-mob--12">
					<article class="article-feature">
						<svg class="article-feature__icon">
							<use href="./assets/sprite.svg#icon-education"></use>
						</svg>
						<div class="article-feature__content">
							<h3 class="article-feature__title">
								Создаём программы
								<br>
								и методики
							</h3>
							<div class="article-feature__caption">
								<div class="editor-simple">
									<p>
										Разрабатываем программы и методики обучения в сфере робототехники и дронов
									</p>
								</div>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>

</div>
<div class="main__section mb-95 mbt-150 mbm-100">
	<section class="section">
		<div class="container">
			<div class="grid">
				<div class="grid__col grid__col--4 grid__col-tab--6 grid__col-mob--4">
					<article class="article-partner">
						<div class="article-partner__header">
							<div class="article-partner__wrapper">
								<picture class="article-partner__picture">
									<img src="./assets/images/1920x1080.jpg" alt="Правительство Москвы">
								</picture>
							</div>
							<h3 class="article-partner__title">
								Правительство
								<br>
								Москвы
							</h3>
						</div>
						<div class="article-partner__main">
							<div class="editor-simple">
								<p>
									Реализовали более 2.500 проектов для образовательных учреждений в России
								</p>
							</div>
						</div>
					</article>
				</div>
				<div class="grid__col grid__col--4 grid__col-tab--6 grid__col-mob--4">
					<article class="article-partner">
						<div class="article-partner__header">
							<div class="article-partner__wrapper">
								<picture class="article-partner__picture">
									<img src="./assets/images/1080x1920.jpg" alt="Точка роста">
								</picture>
							</div>
							<h3 class="article-partner__title">
								Точка роста
							</h3>
						</div>
						<div class="article-partner__main">
							<div class="editor-simple">
								<p>
									Реализовали более 2.500 проектов для образовательных учреждений в России
								</p>
							</div>
						</div>
					</article>
				</div>
				<div class="grid__col grid__col--4 grid__col-tab--6 grid__col-mob--4">
					<article class="article-partner">
						<div class="article-partner__header">
							<div class="article-partner__wrapper">
								<picture class="article-partner__picture">
									<img src="./assets/images/1080x1080.jpg" alt="Техноград">
								</picture>
							</div>
							<h3 class="article-partner__title">
								Техноград
							</h3>
						</div>
						<div class="article-partner__main">
							<div class="editor-simple">
								<p>
									Реализовали более 2.500 проектов для образовательных учреждений в России
								</p>
							</div>
						</div>
					</article>
				</div>
				<div class="grid__col grid__col--4 grid__col-tab--6 grid__col-mob--4">
					<article class="article-partner">
						<div class="article-partner__header">
							<div class="article-partner__wrapper">
								<picture class="article-partner__picture">
									<img src="./assets/images/1920x1080.jpg" alt="Правительство Москвы">
								</picture>
							</div>
							<h3 class="article-partner__title">
								Правительство
								<br>
								Москвы
							</h3>
						</div>
						<div class="article-partner__main">
							<div class="editor-simple">
								<p>
									Реализовали более 2.500 проектов для образовательных учреждений в России
								</p>
							</div>
						</div>
					</article>
				</div>
				<div class="grid__col grid__col--4 grid__col-tab--6 grid__col-mob--4">
					<article class="article-partner">
						<div class="article-partner__header">
							<div class="article-partner__wrapper">
								<picture class="article-partner__picture">
									<img src="./assets/images/1080x1920.jpg" alt="Точка роста">
								</picture>
							</div>
							<h3 class="article-partner__title">
								Точка роста
							</h3>
						</div>
						<div class="article-partner__main">
							<div class="editor-simple">
								<p>
									Реализовали более 2.500 проектов для образовательных учреждений в России
								</p>
							</div>
						</div>
					</article>
				</div>
				<div class="grid__col grid__col--4 grid__col-tab--6 grid__col-mob--4">
					<article class="article-partner">
						<div class="article-partner__header">
							<div class="article-partner__wrapper">
								<picture class="article-partner__picture">
									<img src="./assets/images/1080x1080.jpg" alt="Техноград">
								</picture>
							</div>
							<h3 class="article-partner__title">
								Техноград
							</h3>
						</div>
						<div class="article-partner__main">
							<div class="editor-simple">
								<p>
									Реализовали более 2.500 проектов для образовательных учреждений в России
								</p>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>

</div>
<div class="main__section">
	<section class="section">
		<div class="container">
			<div class="grid">
				<div class="grid__col grid__col--6 grid__col-tab--12 grid__col-mob--4 mbt-20 mbm-10">
					<h2 class="title title--regular mb-40 mbm-20">
						Оставьте заявку
					</h2>
					<div class="editor editor--middle">
						<ol>
							<li>
								Разрабатываем проекты под
								<br class="tab-hidden">
								нужный бюджет и в строгом
								<br class="tab-hidden">
								соответствии с ТЗ
							</li>
							<li>
								Поможем со всей необходимой
								<br class="tab-hidden">
								документацией, вся продукция
								<br class="tab-hidden">
								сертифицирована
							</li>
							<li>
								Учитываем все методические
								<br class="tab-hidden">
								рекомендации Минпросвещения
							</li>
						</ol>
					</div>
				</div>
				<div class="grid__col grid__col--6 grid__col-tab--12 grid__col-mob--4">
					<!-- Уходит FormData по адресу, указанному в action, автоматически собирает все input и textarea -->
					<form action="./action.php" class="form-contact" data-form="block">
						<div class="form-contact__content">
							<label class="textarea">
								<p class="textarea__title">
									Сообщение
								</p>
								<textarea required class="textarea__field" name="message" placeholder="Опишите ваш запрос"></textarea>
							</label>
							<label class="input">
								<p class="input__title">
									Телефон
								</p>
								<input required type="text" data-mask="phone" name="phone" class="input__field" placeholder="+7 (---) --- -- --">
							</label>
						</div>
						<div class="form-contact__toolbar">
							<button type="submit" class="button button--large button--blue">
                            <span class="button__text" data-form="message">
                                Подобрать оборудование
                            </span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

</div>

						