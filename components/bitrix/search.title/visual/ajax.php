<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (empty($arResult["CATEGORIES"]) || !$arResult['CATEGORIES_ITEMS_EXISTS']) return;
?>

<div class="list-group shadow">
    <? foreach($arResult["CATEGORIES"] as $category_id => $arCategory): ?>
        <? foreach($arCategory["ITEMS"] as $i => $arItem):?>
            <? if($category_id === "all"): ?>
                <a href="<?=$arItem["URL"]?>" class="list-group-item list-group-item-action">
                    <?=$arItem["NAME"]?>
                </a>
            <? elseif(isset($arResult["ELEMENTS"][$arItem["ITEM_ID"]])): ?>
                <a href="<?=$arItem["URL"]?>" class="list-group-item list-group-item-action">
                    <?echo $arItem["NAME"]?>
                </a>
            <? endif ?>
        <? endforeach; ?>
    <? endforeach; ?>
</div>
