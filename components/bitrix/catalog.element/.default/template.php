<?

$mainId = $this->GetEditAreaId($arResult['ID']);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
    : $arResult['NAME'];
$price = $arResult['ITEM_PRICES'][$arResult['ITEM_PRICE_SELECTED']];
?>

<div class="col-24">
    <h1><?= $name ?></h1>
</div>

<div class="col-24 col-md-12">
    <div class="form-row">
        <div class="col-24 col-md-12 mb-2">
            <a href="<?= $arResult['MORE_PHOTO'][0]['SRC'] ?: '#' ?>" class="d-block border rounded">
                <img id="imageid" src="<?= $arResult['MORE_PHOTO'][0]['SRC'] ?: (SITE_TEMPLATE_PATH . '/img/nophoto.png') ?>"
                     alt="" class="rounded w-100">
            </a>
        </div>
        <div class="col-24 col-md-12 mb-2">
            <div class="form-row">
                <? if (!empty($arResult['MORE_PHOTO'])) : ?>
                    <? foreach ($arResult['MORE_PHOTO'] as $key => $photo) : ?>
                        <div class="col-8 mb-2">
                            <div class="gelleryimg rounded border <?= $key == 0 ? 'border-primary' : ''?>" id="img<?= $key ?>" >
                                <img src="<?= $photo['SRC'] ?>" class="d-block w-100 rounded" alt="" style="cursor: pointer;"
                                     onclick="zoomImage(<?= $key ?>, '<?= $photo["SRC"] ?>')">
                            </div>
                        </div>
                    <? endforeach ?>
                <? endif ?>
            </div>
        </div>
    </div>
</div>

<div class="col-24 col-md-12 mb-2">
    <div class="form-row">
        <div class="col-24 col-lg-12 text-center mb-3">
            <? if(empty($price['PRINT_RATIO_PRICE'])) : ?>
                <span><?= $arParams['MESS_NOT_AVAILABLE'] ?></span>
            <? else : ?>
            <div class="text-center mb-3">
                <span class="display-4"><?= $price['PRINT_RATIO_PRICE'] ?></span>
            </div>
            <div class="text-center mb-1">
                <form action="<?= POST_FORM_ACTION_URI ?>" method="post">
                    <input type="hidden" name="<?= $arParams["ACTION_VARIABLE"] ?>" value="ADD2BASKET">
                    <input type="hidden" name="<?= $arParams["PRODUCT_ID_VARIABLE"] ?>" value="<?= $arResult["ID"] ?>">
                    <div class="d-inline-block">
                        <div class="input-group" style="width: 8rem;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary" type="button" id="quantity_minus_button"
                                        disabled onclick="quantity_minus()">–</button>
                            </div>
                            <input type="number" name="<? echo $arParams["PRODUCT_QUANTITY_VARIABLE"] ?>" id="quantity"
                                   class="form-control text-center" min="1" value="1" pattern="[0-9]*"
                                   aria-label="Example text with button addon" aria-describedby="button-addon1"
                                   oninput="quantity_oninput()">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="quantity_plus_button" onclick="quantity_plus()">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-inline-block">
                        <input type="submit" class="btn btn-primary btn-block px-4" id="buy_button"
                               value="<?= $arParams['MESS_BTN_ADD_TO_BASKET'] ?>">
                    </div>
                </form>
            </div>
            <? endif ?>
        </div>


        <div class="col-24 col-lg-12 mb-2">
            <div class="bg-light p-3 rounded">
                <? if($arResult["PRODUCT"]["WEIGHT"]) : ?>
                    <div class="border-bottom-dotted">Вес, гр: <?= $arResult["PRODUCT"]["WEIGHT"] ?></div>
                <? endif ?>

                <? if (!empty($arResult['DISPLAY_PROPERTIES'])) : ?>
                    <? foreach ($arResult['DISPLAY_PROPERTIES'] as $property) : ?>
                        <div>
                            <?= $property['NAME'] ?>:
                            <?= (is_array($property['DISPLAY_VALUE'])
                                ? implode(' / ', $property['DISPLAY_VALUE'])
                                : $property['DISPLAY_VALUE']
                            ) ?>
                        </div>
                    <? endforeach ?>
                <? endif ?>
            </div>
        </div>
    </div>
</div>