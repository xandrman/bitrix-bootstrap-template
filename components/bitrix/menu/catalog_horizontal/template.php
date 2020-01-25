<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arResult */

$this->setFrameMode(true);

if (empty($arResult["ALL_ITEMS"])) return;

$menuBlockId = "catalog_menu_" . $this->randString();
?>


<a class="navbar-brand" href="/catalog">
    <img src="<?= SITE_TEMPLATE_PATH ?>/img/open-box.svg" alt="Каталог" style="height: 2rem;" class="mr-1">
    Каталог
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        <? foreach ($arResult["MENU_STRUCTURE"] as $itemID => $arColumns): ?>
            <? if (is_array($arColumns) && count($arColumns) > 0): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?= $arResult["ALL_ITEMS"][$itemID]["LINK"] ?>"
                       id="navbarDropdownMenuLink<?= $itemID ?>"
                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $arResult["ALL_ITEMS"][$itemID]["TEXT"] ?>
                    </a>

                    <div class="dropdown-menu border-primary"
                         aria-labelledby="navbarDropdownMenuLink<?= $itemID ?>">
                        <? foreach ($arColumns as $key => $arRow): ?>
                            <? foreach ($arRow as $itemIdLevel_2 => $arLevel_3): ?>
                                <a class="dropdown-item"
                                   href="<?= $arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"] ?>">
                                    <?= $arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"] ?>
                                </a>
                            <? endforeach ?>
                        <? endforeach ?>
                    </div>

                </li>
            <? else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $arResult["ALL_ITEMS"][$itemID]["LINK"] ?>">
                        <?= htmlspecialcharsbx($arResult["ALL_ITEMS"][$itemID]["TEXT"]) ?>
                    </a>
                </li>
            <? endif ?>
        <? endforeach; ?>
    </ul>
</div>
