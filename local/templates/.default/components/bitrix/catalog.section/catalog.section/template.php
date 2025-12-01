<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

/**
 * @global CMain                 $APPLICATION
 * @var array                    $arParams
 * @var array                    $arResult
 * @var CatalogSectionComponent  $component
 * @var CBitrixComponentTemplate $this
 * @var string                   $templateName
 * @var string                   $componentPath
 *
 *  _________________________________________________________________________
 * |    Attention!
 * |    The following comments are for system use
 * |    and are required for the component to work correctly in ajax mode:
 * |    <!-- items-container -->
 * |    <!-- pagination-container -->
 * |    <!-- component-end -->
 */

$this->setFrameMode(true);
?>

<?php if (!empty($arResult["BRANDS"])) { ?>
	<div class="main__section mb-80 mbm-20">
		<section class="section">
			<div class="container">
				<div class="mb-50 mbt-35 mbm-20">
					<p class="breadcrumbs">
						каталог / робототехника / LEGO EDUCATION
					</p>
				</div>
				<?php foreach ($arResult["BRANDS"] as $arItem) { ?>
					<div class="grid">
						<div class="grid__col grid__col--5">
							<h1 class="title title--page mb-20 mbm-10">
								<?= $arItem["UF_NAME"] ?>
							</h1>
							<div class="editor editor--large">
								<?= $arItem["UF_DESCRIPTION"] ?>
							</div>
						</div>
						<div class="grid__col grid__col--7">
							<picture class="picture">
								<img src="<?= $arItem["UF_PICTURE_SRC"] ?>" alt="#">
							</picture>
						</div>
					</div>
				<?php } ?>
			</div>
		</section>

	</div>
<?php } ?>

