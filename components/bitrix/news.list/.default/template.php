<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

?>

<h4><?= $arResult["NAME"] ?></h4>

<div class="card border-0 d-md-none">
    <div class="card-body p-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
                    <a href="<?= $arItem["PROPERTIES"]["HREF"]["VALUE"] ?>"
                       class="carousel-item rounded bg-primary <?= $key ? '' : 'active' ?>">
                        <div class="form-row align-items-center">
                            <div class="col-5">
                                <div class="p-1">
                                    <img src="<?= $arItem["PREVIEW_PICTURE"]["SAFE_SRC"] ?>"
                                         alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                         class="rounded w-100">
                                </div>

                            </div>
                            <div class="col-7 text-white">
                                <div class="pr-5">
                                    <small><?= $arItem['PREVIEW_TEXT'] ?></small>
                                </div>

                            </div>
                        </div>
                    </a>
                <? endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<div class="d-none d-md-block">
    <div class="form-row">
        <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
            <div class="col-6 col-lg-4 mb-2">
                <a href="<?= $arItem["PROPERTIES"]["HREF"]["VALUE"] ?>"
                   class="d-block rounded bg-primary text-white">
                    <div class="form-row align-items-center">
                        <div class="col-5">
                            <div class="p-1">
                                <img src="<?= $arItem["PREVIEW_PICTURE"]["SAFE_SRC"] ?>"
                                     alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                     class="rounded w-100">
                            </div>

                        </div>
                        <div class="col-7 text-white">
                            <div class="pr-5">
                                <?= $arItem['PREVIEW_TEXT'] ?>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
        <? endforeach; ?>
    </div>
</div>

