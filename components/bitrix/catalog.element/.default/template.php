<?

$mainId = $this->GetEditAreaId($arResult['ID']);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
    : $arResult['NAME'];
$price = $arResult['ITEM_PRICES'][$arResult['ITEM_PRICE_SELECTED']];
?>

<div itemscope itemtype="http://schema.org/Product" class="form-row">
    <div class="col-12 col-md-6">
        <div class="form-row">
            <div class="col-12 col-lg-6 mb-2">
                <a href="<?= $arResult['MORE_PHOTO'][0]['SRC'] ?: '#' ?>" class="d-block border rounded" id="bigimagea">
                    <img itemprop="image" alt=""
                         src="<?= SITE_TEMPLATE_PATH . '/img/transparent.gif' ?>"
                         data-original="<?= $arResult['MORE_PHOTO'][0]['SRC'] ?: (SITE_TEMPLATE_PATH . '/img/nophoto.png') ?>"
                         content="<?= $arResult['MORE_PHOTO'][0]['SRC'] ?: (SITE_TEMPLATE_PATH . '/img/nophoto.png') ?>"
                         class="lazy rounded w-100" id="imageid">
                </a>
            </div>
            <div class="col-12 col-lg-6 mb-2">
                <div class="form-row">
                    <? if (!empty($arResult['MORE_PHOTO'])) : ?>
                        <? foreach ($arResult['MORE_PHOTO'] as $key => $photo) : ?>
                            <div class="col-4 mb-2">
                                <div class="gelleryimg rounded border <?= $key == 0 ? 'border-primary' : '' ?>"
                                     id="img<?= $key ?>">
                                    <img src="<?= SITE_TEMPLATE_PATH . '/img/transparent.gif' ?>"
                                         data-original="<?= $photo['SRC'] ?>"
                                         class="lazy d-block w-100 rounded" alt="" style="cursor: pointer;"
                                         onclick="zoomImage(<?= $key ?>, '<?= $photo["SRC"] ?>')">
                                </div>
                            </div>
                        <? endforeach ?>
                    <? endif ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 mb-2">
        <div class="form-row">
            <div class="col-12 col-lg-6 text-center mb-3">
                <div itemprop="name" class="d-none" ><?= $arResult['NAME'] ?></div>
                <? if (empty($price['PRINT_RATIO_PRICE'])) : ?>
                    <span><?= $arParams['MESS_NOT_AVAILABLE'] ?></span>
                <? else : ?>
                    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="text-center mb-3">
                        <span itemprop="price" class="display-4"><?= $price['PRINT_RATIO_PRICE'] ?></span>
                        <span itemprop="priceCurrency" class="d-none" ><?= $price["CURRENCY"] ?></span>
                    </div>
                    <div class="text-center mb-3">
                        <form action="<?= POST_FORM_ACTION_URI ?>" method="post">
                            <input type="hidden" name="<?= $arParams["ACTION_VARIABLE"] ?>" value="ADD2BASKET">
                            <input type="hidden" name="<?= $arParams["PRODUCT_ID_VARIABLE"] ?>"
                                   value="<?= $arResult["ID"] ?>">
                            <div class="d-inline-block mb-2">
                                <div class="input-group" style="width: 8rem;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary" type="button" id="quantity_minus_button"
                                                disabled onclick="quantity_minus()">–
                                        </button>
                                    </div>
                                    <input type="number" name="<? echo $arParams["PRODUCT_QUANTITY_VARIABLE"] ?>"
                                           id="quantity"
                                           class="form-control text-center" min="1" value="1"
                                           aria-label="Example text with button addon"
                                           aria-describedby="button-addon1" oninput="quantity_oninput()">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="button" id="quantity_plus_button"
                                                onclick="quantity_plus()">+
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-inline-block mb-2">
                                <input type="submit" class="btn btn-primary btn-block px-4" id="buy_button"
                                       value="<?= $arParams['MESS_BTN_ADD_TO_BASKET'] ?>">
                            </div>
                        </form>
                    </div>
                <div class="bg-light p-2 rounded">
                    В наличии <?= $arResult["PRODUCT"]["QUANTITY"] ?> шт
                </div>
                <? endif ?>
            </div>


            <div class="col-12 col-lg-6 mb-2">

                <div class="bg-light p-3 mb-2 rounded">
                    <h2>Характеристики</h2>

                    <? if ($arResult["PRODUCT"]["WEIGHT"]) : ?>
                        <div class="border-bottom-dotted">Вес, гр: <?= $arResult["PRODUCT"]["WEIGHT"] ?></div>
                    <? endif ?>

                    <? if (!empty($arResult['DISPLAY_PROPERTIES'])) : ?>
                        <? foreach ($arResult['DISPLAY_PROPERTIES'] as $property) : ?>
                            <div>
                                <span><?= $property['NAME'] ?>:</span>
                                <span>
                                    <?= (is_array($property['DISPLAY_VALUE'])
                                        ? implode(' / ', $property['DISPLAY_VALUE'])
                                        : $property['DISPLAY_VALUE']
                                    ) ?>
                                </span>
                            </div>
                        <? endforeach ?>
                    <? endif ?>
                </div>

                <div class="bg-light p-3 rounded">
                    <h2>Описание</h2>
                    <? if ($USER->IsAdmin()) : ?>
                        <form action="/operators/editProduct.php" method="post">
                            <div class="form-group">
                                <input type="hidden" name="ID" value="<?= $arResult["ID"] ?>">
                                <textarea name="DETAIL_TEXT" id="" class="form-control"><?= $arResult["DETAIL_TEXT"] ?></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark" type="submit" id="button-submit">Сохранить</button>
                            </div>
                        </form>
                    <? else : ?>
                        <span itemprop="description"><?= $arResult["DETAIL_TEXT"] ?></span>
                    <? endif ?>
                </div>

            </div>
        </div>
    </div>
</div>