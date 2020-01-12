<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<!DOCTYPE html>
<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">
<head>
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH . '/css/bootstrap_2019-12-02.min.css'?>">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH . '/css/font-awesome.min.css'?>">
    <?
    $APPLICATION->ShowHeadStrings();
    ?>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance:textfield;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body class="container-fluid bg-secondary">
<header class="row align-items-center justify-content-around py-2 bg-white">
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
    <div class="col-24 col-lg order-last order-lg-2 my-2">
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
    <div class="col-24 col-sm-auto order-3 text-center my-2">
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
<nav class="row">
    <div class="col-24 navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
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
    </div>
</nav>

<main class="row bg-white py-4">
    <div class="col-24">
        <div class="form-row">
            <div class="col-24">
                <? if ($curPage != SITE_DIR . "index.php") : ?>
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
            </div>

