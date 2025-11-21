<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
?>

<div class="grid mb-35 mbm-25">
	<div class="grid__col grid__col--6 grid__col-mob--4">
		<h2 class="title title--regular">
			<?= $arResult["HEADER_TEXT"] ?? "" ?>
		</h2>
	</div>
</div>
<div class="caption-line mb-40 mbm-35">
	<span class="caption-line__text">
		<?= $arResult["BLOCK_TITLE"] ?? "" ?>
	</span>
</div>
<div class="grid mb-85 mbt-65 mbm-50">
	<div class="grid__col grid__col--6 grid__col-tab--9 grid__col-mob--4">
		<div class="editor editor--large">
			<?= $arResult["DESCRIPTION_TEXT"]  ?? "" ?>
		</div>
	</div>
</div>
