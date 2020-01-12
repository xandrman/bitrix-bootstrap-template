<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

if (strlen($arResult["ERROR_MESSAGE"]) > 0) {
    ShowError($arResult["ERROR_MESSAGE"]);
}
?>

<? if (strlen($arResult["NAV_STRING"]) > 0) : ?>
    <div class="col-24">
        <p><?= $arResult["NAV_STRING"] ?></p>
    </div>
<? endif ?>

<? if (is_array($arResult["PROFILES"]) && !empty($arResult["PROFILES"])): ?>
    <? foreach ($arResult["PROFILES"] as $val): ?>
        <div class="col-auto mb-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $val["NAME"] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $val["PERSON_TYPE"]["NAME"] ?></h6>
                    <a href="<?= $val["URL_TO_DETAIL"] ?>" class="card-link mr-3">
                        <i class="fa fa-pencil"></i>
                        <?= Loc::getMessage("SALE_DETAIL_DESCR") ?>
                    </a>
                    <a class="card-link"
                       href="javascript:if(confirm('<?= Loc::getMessage("STPPL_DELETE_CONFIRM") ?>')) window.location='<?= $val["URL_TO_DETELE"] ?>'">
                        <i class="fa fa-trash"></i>
                        <?= Loc::getMessage("SALE_DELETE") ?>
                    </a>
                </div>
            </div>
        </div>
    <? endforeach; ?>
<? elseif($arResult['USER_IS_NOT_AUTHORIZED'] !== 'Y'): ?>
    <h3><?=Loc::getMessage("STPPL_EMPTY_PROFILE_LIST") ?></h3>
<? endif ?>