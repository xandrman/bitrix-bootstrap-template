</div>
<div class="col-12">
    <? $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "",
        array(
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "AJAX_MODE" => "Y",
            "IBLOCK_TYPE" => "news",
            "IBLOCK_ID" => "5",
            "NEWS_COUNT" => "3",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_ORDER1" => "DESC",
            "SORT_BY2" => "SORT",
            "SORT_ORDER2" => "ASC",
            "FILTER_NAME" => "",
            "FIELD_CODE" => array(
                0 => "",
                1 => "",
            ),
            "PROPERTY_CODE" => array(
                0 => "",
                1 => "DESCRIPTION",
                2 => "",
            ),
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "SET_TITLE" => "N",
            "SET_BROWSER_TITLE" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_LAST_MODIFIED" => "N",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "ADD_SECTIONS_CHAIN" => "N",
            "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "INCLUDE_SUBSECTIONS" => "Y",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "CACHE_FILTER" => "Y",
            "CACHE_GROUPS" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "PAGER_TITLE" => "Новости",
            "PAGER_SHOW_ALWAYS" => "Y",
            "PAGER_TEMPLATE" => "",
            "PAGER_DESC_NUMBERING" => "Y",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "Y",
            "PAGER_BASE_LINK_ENABLE" => "Y",
            "SET_STATUS_404" => "Y",
            "SHOW_404" => "Y",
            "MESSAGE_404" => "",
            "PAGER_BASE_LINK" => "",
            "PAGER_PARAMS_NAME" => "arrPager",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "COMPONENT_TEMPLATE" => "official",
            "STRICT_SECTION_CHECK" => "N",
            "COMPOSITE_FRAME_MODE" => "A",
            "COMPOSITE_FRAME_TYPE" => "AUTO",
            "FILE_404" => ""
        ),
        false
    ); ?>
</div>
</main>

<footer class="bg-secondary text-white rounded my-3 py-2">
    <div class="row align-items-center justify-content-around">
        <div class="col-12 col-sm-auto">
            <nav class="my-2 text-center">
                <ul class="list-unstyled">
                    <li>
                        <i class="fa fa-shopping-cart"></i>
                        <a href="/personal/cart/" class="text-white">Корзина</a>
                    </li>
                    <li>
                        <i class="fa fa-user"></i>
                        <a href="/personal/" class="text-white">Личный кабинет</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-12 col-sm-auto">
            <? $APPLICATION->IncludeComponent("bitrix:menu", "bottom_menu", array(
                "ROOT_MENU_TYPE" => "bottom",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_TYPE" => "A",
                "CACHE_SELECTED_ITEMS" => "N",
                "MENU_CACHE_TIME" => "36000000",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => array(),
            ),
                false
            ); ?>
        </div>
        <div class="col-12 col-sm-auto text-center py-2">
            <span>Мы принимаем к оплате:</span><br>
            <img src="<?= SITE_TEMPLATE_PATH . '/img/payment.png' ?>" alt="visa, mastercard, mir" style="height: 1.5rem;">
        </div>
        <div class="col-12 col-sm-auto text-center">
            <div class="my-2">
                <a href="https://webmaster.yandex.ru/sqi?host=101motok.ru">
                    <img width="88" height="31" alt="" border="0"
                         src="https://yandex.ru/cycounter?101motok.ru&theme=dark&lang=ru"/>
                </a>
            </div>
        </div>
        <div class="col-12 col-sm-auto text-center py-2">
            <?
            $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/copyright.php"),
                false);
            ?>
        </div>
    </div>
</footer>

<script src="<?= SITE_TEMPLATE_PATH . '/js/jquery-3.1.1.min.js'?>"></script>
<script src="<?= SITE_TEMPLATE_PATH . '/js/popper.min.js'?>"></script>
<script src="<?= SITE_TEMPLATE_PATH . '/js/bootstrap.min.js'?>"></script>
<script src="<?= SITE_TEMPLATE_PATH . '/js/jquery.lazyload.min.js'?>" type="text/javascript"></script>
<script src="<?= SITE_TEMPLATE_PATH . '/js/lazyload.js'?>"></script>
</body>
</html>