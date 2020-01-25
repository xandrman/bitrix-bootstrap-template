<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

?>

<ul class="list-group list-group-flush" id="basket">
    <? foreach ($arResult["GRID"]["ROWS"] as $k => $arItem) : ?>
        <li class="list-group-item" id="<?= $arItem["ID"] ?>">
            <div class="form-row align-items-center justify-content-between">
                <div class="col-12 col-md mb-2 mb-md-0">
                    <div class="d-flex d-flex align-items-center">
                        <img data-original="<?= $arItem["PREVIEW_PICTURE_SRC"] ?: (SITE_TEMPLATE_PATH . '/img/nophoto.png') ?>"
                             src="<?= SITE_TEMPLATE_PATH . '/img/transparent.gif' ?>"
                             style="width: 8rem" alt="..." class="lazy mr-2">
                        <a class="text-body" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                            <?= $arItem["NAME"] ?> <?= $arItem["ID"] ?>
                        </a>
                    </div>
                </div>
                <div id="price<?= $arItem["ID"] ?>" data-numeric="<?= $arItem["PRICE"] ?>"
                     class="col-auto col-sm col-md-2 text-right text-sm-left mb-2 mb-md-0">
                    <?= $arItem["PRICE_FORMATED"] ?>
                </div>
                <div class="col col-sm-auto mb-2 mb-md-0 text-right">
                    <a href="javascript:void(0)" class="d-inline-block mr-2" id="DELETE_<?= $arItem["ID"] ?>">
                        <small><?= Loc::getMessage("SBB_DELETE") ?></small>
                    </a>
                    <div class="d-inline-block">
                        <div class="input-group" style="width: 6rem;">
                            <div class="input-group-prepend">
                                <a href="javascript:void(0)" id="MINUS_<?= $arItem["ID"] ?>"
                                   class="btn btn-sm btn-outline-primary">
                                    –
                                </a>
                            </div>
                            <input type="number" id="QUANTITY_<?= $arItem["ID"] ?>"
                                   min="1" max="999" pattern="[0-9]*"
                                   class="form-control form-control-sm text-center"
                                   value="<?= $arItem["QUANTITY"] ?>" aria-label="">
                            <div class="input-group-append">
                                <a href="javascript:void(0)" id="PLUS_<?= $arItem["ID"] ?>"
                                   class="btn btn-sm btn-outline-primary">
                                    +
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm col-md-2 text-right mb-2 mb-md-0"
                     id="SUM_FULL_PRICE_FORMATED_<?= $arItem["ID"] ?>">
                    <?= $arItem["SUM"] ?>
                </div>
            </div>
        </li>
    <? endforeach; ?>
    <li class="list-group-item" id="basket_total">
        <div class="row">
            <div class="col text-right">
                <?= Loc::getMessage("SBB_TOTAL") ?>:
            </div>
            <div id="allSum_FORMATED" class="col-auto text-right font-weight-bold">
                <?= $arResult["allSum_FORMATED"] ?>
            </div>
        </div>
    </li>
</ul>

<div class="text-right mt-3">
    <a class="btn btn-primary" href="<?= $arParams["PATH_TO_ORDER"] ?>">
        <?= Loc::getMessage('SBB_ORDER') ?>
    </a>
</div>
