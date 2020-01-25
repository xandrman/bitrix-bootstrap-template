<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

$intprice = intval($arResult['ITEM']['ITEM_PRICES'][0]['PRICE']);
$fracprice = ((($arResult['ITEM']['ITEM_PRICES'][0]['PRICE'] - $intprice) * 100) ?: '00');

?>

<div class="col-12 col-sm-6 mb-2">
    <div class="h-100 border rounded d-flex flex-sm-column">
        <a href="<?= $arResult['ITEM']['DETAIL_PAGE_URL'] ?>" class="text-body w-100">
            <img data-original="<?= $arResult['ITEM']['PREVIEW_PICTURE']['SRC'] ?: (SITE_TEMPLATE_PATH . '/img/nophoto.png') ?>"
                 src="<?= SITE_TEMPLATE_PATH . '/img/transparent.gif' ?>"
                 class="w-100 rounded lazy" alt="...">
        </a>
        <div class="h-100 w-100 p-2">
            <div class="h-100 d-flex flex-column align-items-between">
                <a href="<?= $arResult['ITEM']['DETAIL_PAGE_URL'] ?>" class="text-body mb-auto">
                    <?= $arResult['ITEM']['NAME'] ?>
                </a>
                <? if (empty($arResult['ITEM']['ITEM_PRICES'])) :?>
                    <span class="font-italic text-muted mt-0 mt-sm-2"><?= $arParams['MESS_NOT_AVAILABLE'] ?></span>
                <? else :?>
                    <div class="d-flex justify-content-between align-items-center mt-0 mt-sm-2">
                        <span class="font-weight-bold font-italic ml-1">
                            <span><?= $intprice ?></span><small>,<?= $fracprice ?> р.</small>
                        </span>
                        <? $href = str_replace('#ID#', $arResult['ITEM']['ID'], $arParams['~ADD_URL_TEMPLATE']) ?>
                        <a class="btn btn-sm btn-primary" href="<?= $href ?>" rel="nofollow">
                            <?= $arParams['MESS_BTN_ADD_TO_BASKET'] ?>
                        </a>
                    </div>
                <? endif ?>
            </div>
        </div>
    </div>
</div>