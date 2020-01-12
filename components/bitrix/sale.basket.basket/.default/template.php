<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

?>

<div class="col-24">
    <h1><?= Loc::getMessage("SBB_TITLE") ?></h1>
</div>

<div class="col-24">
    <ul class="list-group list-group-flush">
        <? foreach ($arResult["GRID"]["ROWS"] as $k => $arItem) : ?>
            <li class="list-group-item">
                <div class="form-row align-items-center justify-content-between">
                    <div class="col-24 col-md mb-2 mb-md-0">
                        <a class="text-body" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                            <?= $arItem["NAME"] ?> <?= $arItem["ID"] ?>
                        </a>&nbsp;</div>
                    <div id="price<?= $arItem["ID"] ?>" data-numeric="<?= $arItem["PRICE"] ?>"
                         class="col-auto col-sm col-md-4 col-lg-3 col-xl-2 text-right text-sm-left mb-2 mb-md-0">
                        <?= $arItem["PRICE_FORMATED"] ?>
                    </div>
                    <div class="col col-sm-auto mb-2 mb-md-0 text-right">
                        <a href="<?= POST_FORM_ACTION_URI ?>?BasketRefresh=Y&DELETE_<?= $arItem["ID"] ?>=Y"
                           class="d-inline-block mr-2"><small>Удалить</small></a>
                        <form class="d-inline-block" action="<?= POST_FORM_ACTION_URI ?>" method="post">
                            <input type="hidden" name="BasketRefresh" value="Y">
                            <div class="input-group" style="width: 6rem;">
                                <div class="input-group-prepend">
                                    <a class="btn btn-sm btn-outline-primary"
                                       href="<?= POST_FORM_ACTION_URI ?>?BasketRefresh=Y
                                       &QUANTITY_<?= $arItem["ID"] ?>=<?= $arItem["QUANTITY"]-1 ?>">
                                        –
                                    </a>
                                </div>
                                <input type="number" name="QUANTITY_<?= $arItem["ID"] ?>"
                                       min="1" max="999" pattern="[0-9]*"
                                       class="form-control form-control-sm text-center"
                                       value="<?= $arItem["QUANTITY"] ?>" aria-label=""
                                       oninput="console.log(this.form.submit())">
                                <div class="input-group-append">
                                    <a class="btn btn-sm btn-outline-primary"
                                       href="<?= POST_FORM_ACTION_URI ?>?BasketRefresh=Y
                                       &QUANTITY_<?= $arItem["ID"] ?>=<?= $arItem["QUANTITY"]+1 ?>">
                                        +
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-24 col-sm col-md-4 col-lg-3 col-xl-2 text-right mb-2 mb-md-0">
                        <?= $arItem["SUM_FULL_PRICE_FORMATED"] ?>
                    </div>
                </div>
            </li>
        <? endforeach; ?>
        <li class="list-group-item">
            <div class="row">
                <div class="col text-right">
                    <?= Loc::getMessage("SBB_TOTAL") ?>:
                </div>
                <div id="allSum<?= $arItem["ID"] ?>" class="col-auto text-right font-weight-bold">
                    <?= $arResult["allSum_FORMATED"] ?>
                </div>
            </div>
        </li>
    </ul>

    <div class="text-right mt-3">
        <a class="btn btn-primary" href="<?= $arParams["PATH_TO_ORDER"] ?>">
            <?=Loc::getMessage('SBB_ORDER')?>
        </a>
    </div>
</div>
