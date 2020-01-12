<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(array("fx"));
$curPage = $APPLICATION->GetCurPage(true);
?>
<!DOCTYPE html>
<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">
<head>
    <!-- <?$APPLICATION->ShowHead();?> -->
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?=htmlspecialcharsbx(SITE_DIR)?>favicon.ico" />
    <?$APPLICATION->ShowHead();?>
</head>

<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="container-fluid">
    <header class="row px-0 px-lg-3 py-3 justify-content-around align-items-center">
        <div class="col-auto order-1">
            <div class="row justify-content-center align-items-center">
                <div class="col-auto py-3">
                    <img src="include/logo_retina.png" style="height:2.5rem;" alt="">
                </div>
                <div class="col-auto py-2">
                    <a href="https://vk.com/motok101" class="mr-2"><img src="/vk.svg" style="height: 2.5rem;"></a>
                    <a href="https://www.instagram.com/101motok.ru/" class="mr-2">
                        <img src="/instagram.svg" style="height: 2.5rem">
                    </a>
                    <a href="tel:+73812633210" class="mr-2">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/telephone.svg" alt="" style="height: 2rem;">
                    </a>
                    <a href="tel:+73812633210" class="" style="color: #000000">
                        8&nbsp;(3812)&nbsp;633-210
                    </a>
                </div>
            </div>
        </div>





    </header>
    
    <main class="row">
