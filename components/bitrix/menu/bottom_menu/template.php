<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if (empty($arResult))
	return;

?>

<nav>
    <ul class="my-2">
        <?foreach($arResult as $itemIdex => $arItem):?>
            <li>
                <a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="text-white">
                    <?=htmlspecialcharsbx($arItem["TEXT"])?>
                </a>
            </li>
        <?endforeach;?>
    </ul>
</nav>