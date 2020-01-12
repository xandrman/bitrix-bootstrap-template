<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

foreach ($arResult['SECTIONS'] as &$arSection) {
    ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-2">
        <a href="<?= $arSection['SECTION_PAGE_URL'] ?>" class="h-100 card bg-secondary text-white">

            <div class=""><h5 class="card-title p-2 m-0"><?=$arSection['NAME']?></h5></div>
            <img src="<?= $arSection['PICTURE']['SAFE_SRC'] ?: (SITE_TEMPLATE_PATH .'/img/nophoto.png') ?>"
                 class="w-100 rounded-bottom mt-auto" alt="...">
        </a>
    </div>
    <?
}