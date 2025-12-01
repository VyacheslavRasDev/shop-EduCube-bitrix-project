<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}
?>

</main>
<footer class="footer">
	<div class="container">
		<div class="stack stack--footer">
			<div class="grid footer-grid-main">
				<div class="grid__col grid__col--3 grid__col-tab--12 grid__col-mob--4 order-mob-1">
					<div class="links-column links-column--main">
						<h2 class="links-column__logo">
							эдукуб
						</h2>
						<div class="links-column__stack mob-hidden">
							<a href="" class="link-footer">
								Telegram
							</a>
							<a href="" class="link-footer">
								WhatsApp
							</a>
							<a href="" class="link-footer">
								VK
							</a>
						</div>
					</div>
				</div>
				<div class="grid__col grid__col--3 grid__col-tab--4 grid__col-mob--2 order-mob-5">
					<div class="links-column links-column--regular">
						<h2 class="links-column__title">
							Каталог
						</h2>
						<?php $APPLICATION->IncludeComponent(
							"bitrix:menu",
							"footer_catalog_menu",
							[
								"ALLOW_MULTI_SELECT"    => "N",
								"CHILD_MENU_TYPE"       => "bottom_catalog",
								"DELAY"                 => "N",
								"MAX_LEVEL"             => "1",
								"MENU_CACHE_GET_VARS"   => [
									0 => "",
								],
								"MENU_CACHE_TIME"       => "3600",
								"MENU_CACHE_TYPE"       => "N",
								"MENU_CACHE_USE_GROUPS" => "N",
								"ROOT_MENU_TYPE"        => "footer_catalog",
								"USE_EXT"               => "N"
							],
							false
						); ?>
					</div>
				</div>
				<div class="grid__col grid__col--3 grid__col-tab--4 grid__col-mob--2 order-mob-6">
					<div class="links-column links-column--regular">
						<h2 class="links-column__title">
							Меню
						</h2>
						<?php $APPLICATION->IncludeComponent(
							"bitrix:menu",
							"footer_navi_menu",
							[
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "bottom_navi",
								"DELAY" => "N",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_GET_VARS" => [
									0 => "",
								],
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "N",
								"MENU_CACHE_USE_GROUPS" => "N",
								"ROOT_MENU_TYPE" => "footer_navi",
								"USE_EXT" => "N"
							],
							false
						);?>
					</div>
				</div>
				<div class="grid__col grid__col-mob--4 mob-visible order-mob-3">
					<nav class="nav-footer">
						<a href="" class="link-footer">
							Telegram
						</a>
						<a href="" class="link-footer">
							WhatsApp
						</a>
						<a href="" class="link-footer">
							VK
						</a>
					</nav>
				</div>
				<div class="grid__col grid__col--3 grid__col-tab--4 order-mob-2">
					<div class="links-column links-column--regular">
						<h2 class="links-column__title">
							Контакты
						</h2>
						<div class="links-column__stack">
							<p class="link-footer">
								г. Москва, ул. 2-я Звенигородская, д. 13, стр. 15
							</p>
							<p class="link-footer">
								Юр. адресс: 111397, г. Москва, Федеративный пр-кт, д. 4, кв. 47 офис XI
							</p>
							<p class="link-footer">
								Телефон:
								<a href="+74951202186">+7 (495) 120-21-86</a>
							</p>
							<p class="link-footer">
								<a href="mailto:info@educube.ru">info@educube.ru</a>
							</p>
							<p class="link-footer">
								Мы работаем: c 09:00 до 18:00
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="grid grid-footer-bottom">
				<div class="grid__col grid__col--3 grid__col-mob--4 order-mob-2">
					<div class="caption-footer">
						<p>
							© 2013 - 2024 Educube.ru
							<br>
							Рекомендованный магазин
							<br class="mob-hidden">
							LEGO® Education в России.
						</p>
					</div>
				</div>
				<div class="grid__col grid__col--9 grid__col-mob--4 order-mob-1">
					<nav class="nav-footer">
						<a href="" class="link-footer">
							Политика конфиденциальности
						</a>
						<a href="" class="link-footer">
							Оферта
						</a>
						<a href="" class="link-footer">
							Соглашение
						</a>
					</nav>
				</div>
			</div>
		</div>
	</div>
</footer>