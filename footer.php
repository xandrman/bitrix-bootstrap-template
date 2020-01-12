</div>
</div>
</main>
<footer class="row py-2 text-white bg-secondary align-items-center justify-content-around">
    <div class="col-24 col-sm-auto">
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
    <div class="col-24 col-sm-auto">
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
    <div class="col-24 col-sm-auto text-center py-2">
        <span>Мы принимаем к оплате:</span><br>
        <img src="<?= SITE_TEMPLATE_PATH . '/img/payment.png' ?>" alt="visa, mastercard, mir" style="height: 1.5rem;">
    </div>
    <div class="col-24 col-sm-auto text-center">
        <div class="my-2">
            <a href="https://webmaster.yandex.ru/sqi?host=101motok.ru">
                <img width="88" height="31" alt="" border="0"
                     src="https://yandex.ru/cycounter?101motok.ru&theme=dark&lang=ru"/>
            </a>
        </div>
    </div>
    <div class="col-24 col-sm-auto text-center py-2">
        <?
        $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/copyright.php"),
            false);
        ?>
    </div>
</footer>
<? $APPLICATION->ShowHeadScripts(); ?>
<script src="<?= SITE_TEMPLATE_PATH . '/js/jquery-3.1.1.min.js'?>"></script>
<script src="<?= SITE_TEMPLATE_PATH . '/js/popper.min.js'?>"></script>
<script src="<?= SITE_TEMPLATE_PATH . '/js/bootstrap.min.js'?>"></script>
<script src="<?= SITE_TEMPLATE_PATH . '/js/jquery.lazyload.min.js'?>" type="text/javascript"></script>
<script src="<?= SITE_TEMPLATE_PATH . '/js/lazyload.js'?>"></script>
</body>
</html>