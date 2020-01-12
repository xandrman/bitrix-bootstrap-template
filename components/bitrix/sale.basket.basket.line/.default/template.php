<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');

$pathToRegister = $arParams['PATH_TO_REGISTER'];
$pathToRegister .= (stripos($pathToRegister, '?') === false ? '?' : '&');
$pathToRegister .= 'register=yes&backurl=' . $currentUrl;

$basketText = $arResult['NUM_PRODUCTS'] . ' ' . $arResult['PRODUCT(S)']
    . ' ' . GetMessage('TSB1_TOTAL_PRICE') . ' ' . $arResult['TOTAL_PRICE'];

?>
    <a class="d-inline-block mr-1 align-middle" href="<?= $arParams['PATH_TO_BASKET'] ?>">
        <?= GetMessage('TSB1_CART') ?>
    </a>
<? if ($APPLICATION->GetCurUri() != $arParams["PATH_TO_BASKET"]) : ?>
    <span class="d-inline-block mr-2 align-middle"><small><?= $basketText ?></small></span>
<? endif ?>
<? if ($USER->IsAuthorized()) : ?>
    <div class="d-inline-block">
        <a class="d-inline-block mr-2 align-middle" href="<?= $arParams['PATH_TO_PROFILE'] ?>">
            <?= GetMessage('TSB1_PERSONAL') ?>
        </a>
        <a class="d-inline-block align-middle" href="?logout=yes">
            <?= GetMessage('TSB1_LOGOUT') ?>
        </a>
    </div>
<? else : ?>
    <a class="d-inline-block mr-2 align-middle"
       href="<?= $arParams['PATH_TO_AUTHORIZE'] ?>"><?= GetMessage('TSB1_LOGIN') ?></a>
    <a class="d-inline-block mr-2 align-middle" href="<?= $pathToRegister ?>">
        <?= GetMessage('TSB1_REGISTER') ?>
    </a>
<? endif ?>