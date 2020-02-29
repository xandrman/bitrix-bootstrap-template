<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset; ?>

<!DOCTYPE html>
<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">
<head>
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?
    $APPLICATION->ShowHead();
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap_2020-01-21.min.css');
    Asset::getInstance()->addCss("/bitrix/css/main/font-awesome.css");
    ?>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        html {
            font-size: 100%;
        }
        .btn-default {
            color: #fff;
            background-color: #f58e72;
            border-color: #f58e72;
        }
        .btn-default:hover {
            color: #fff;
            background-color: #f2714e;
            border-color: #f26842;
        }
        .btn-default:focus {
            box-shadow: 0 0 0 0.2rem rgba(247,159,135,.5);
        }
    </style>
</head>
<body class="container-fluid">
<div class="row">
    <div class="col-12 p-0">
        <? $APPLICATION->ShowPanel() ?>
    </div>
</div>
<header class="row align-items-center justify-content-around my-3 bg-white">
    <div class="col-auto my-2">
        <a href="<?= htmlspecialcharsbx(SITE_DIR) ?>">
            <img src="/include/logo_retina.png" style="width: 10em;" alt="">
        </a>
    </div>
    <div class="col-auto my-2">
        <a href="https://vk.com/motok101" class="d-inline-block mr-1">
            <img src="/vk.svg" style="height: 2em; width: auto" alt="Logo">
        </a>
        <a href="https://www.instagram.com/101motok.ru/" class="d-inline-block mr-1">
            <img src="/instagram.svg" style="height: 2em; width: auto" alt="Instagram">
        </a>
        <a href="tel:+73812633210" class="text-dark">
            <img src="<?= SITE_TEMPLATE_PATH ?>/img/telephone.svg" alt="" style="height: 1.5em; width: auto"
            ><span class="ml-2"></span>8&nbsp;(3812)&nbsp;633-210
        </a>
    </div>
    <div class="col-12 col-lg order-last order-lg-2 my-2 rounded ">
        <? $APPLICATION->IncludeComponent("bitrix:search.title", 'visual', array(
            "NUM_CATEGORIES" => "1",
            "TOP_COUNT" => "5",
            "CHECK_DATES" => "N",
            "SHOW_OTHERS" => "N",
            "PAGE" => SITE_DIR . "catalog/",
            "CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
            "CATEGORY_0" => array(
                0 => "iblock_catalog",
            ),
            "CATEGORY_0_iblock_catalog" => array(
                0 => "all",
            ),
            "CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
            "SHOW_INPUT" => "Y",
            "INPUT_ID" => "title-search-input",
            "CONTAINER_ID" => "search",
            "PRICE_CODE" => array(
                0 => "BASE",
            ),
            "SHOW_PREVIEW" => "Y",
            "PREVIEW_WIDTH" => "75",
            "PREVIEW_HEIGHT" => "75",
            "CONVERT_CURRENCY" => "Y"
        ), false);
        ?>
    </div>
    <div class="col-12 col-sm-auto order-3 text-center my-2">
        <? $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "", array(
            "PATH_TO_BASKET" => SITE_DIR . "personal/cart/",
            "PATH_TO_PERSONAL" => SITE_DIR . "personal/",
            "SHOW_PERSONAL_LINK" => "N",
            "SHOW_NUM_PRODUCTS" => "Y",
            "SHOW_TOTAL_PRICE" => "Y",
            "SHOW_PRODUCTS" => "N",
            "POSITION_FIXED" => "N",
            "SHOW_AUTHOR" => "Y",
            "PATH_TO_REGISTER" => SITE_DIR . "login/",
            "PATH_TO_PROFILE" => SITE_DIR . "personal/"
        ),
            false,
            array()
        ); ?>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm rounded">
    <? $APPLICATION->IncludeComponent("bitrix:menu", "catalog_horizontal", array(
        "ROOT_MENU_TYPE" => "left",
        "MENU_CACHE_TYPE" => "A",
        "MENU_CACHE_TIME" => "36000000",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "MENU_THEME" => "site",
        "CACHE_SELECTED_ITEMS" => "N",
        "MENU_CACHE_GET_VARS" => array(),
        "MAX_LEVEL" => "3",
        "CHILD_MENU_TYPE" => "left",
        "USE_EXT" => "Y",
        "DELAY" => "N",
        "ALLOW_MULTI_SELECT" => "N",
    ),
        false
    ); ?>
</nav>

<?
if ($USER->IsAdmin()) {
    ?>
        <div class="bg-dark rounded mt-3 text-white py-3 px-2">
            <span class="mx-1"><small>Операторам:</small></span>
            <a href="/operators" class="mx-1 text-white ">Товары</a>
            <a href="/operators/orders" class="mx-1 text-white ">Заказы</a>
        </div>
    <?
}
?>


<main class="row bg-white">
    <div class="col-12 my-3">
        <? if ($APPLICATION->GetCurPage(true) != SITE_DIR . "index.php") : ?>
            <? $APPLICATION->IncludeComponent(
                "bitrix:breadcrumb", "", [
                "START_FROM" => "0",
                "PATH" => "",
                "SITE_ID" => "-"
            ],
                false,
                Array('HIDE_ICONS' => 'Y')
            ); ?>
        <? endif ?>
        <h1 class="" id="pagetitle"><?= $APPLICATION->ShowTitle(false); ?></h1>

