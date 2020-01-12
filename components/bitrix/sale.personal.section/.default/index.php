<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;

if (strlen($arParams["MAIN_CHAIN_NAME"]) > 0)
{
    $APPLICATION->AddChainItem(htmlspecialcharsbx($arParams["MAIN_CHAIN_NAME"]), $arResult['SEF_FOLDER']);
}

$availablePages = array();

if ($arParams['SHOW_BASKET_PAGE'] === 'Y')
{
    $availablePages[] = array(
        "path" => $arParams['PATH_TO_BASKET'],
        "name" => Loc::getMessage("SPS_BASKET_PAGE_NAME"),
        "icon" => '<i class="fa fa-shopping-cart"></i>'
    );
}

if ($arParams['SHOW_ORDER_PAGE'] === 'Y')
{
    $availablePages[] = array(
        "path" => $arResult['PATH_TO_ORDERS'],
        "name" => Loc::getMessage("SPS_ORDER_PAGE_NAME"),
        "icon" => '<i class="fa fa-calculator"></i>'
    );
}

if ($arParams['SHOW_ACCOUNT_PAGE'] === 'Y')
{
    $availablePages[] = array(
        "path" => $arResult['PATH_TO_ACCOUNT'],
        "name" => Loc::getMessage("SPS_ACCOUNT_PAGE_NAME"),
        "icon" => '<i class="fa fa-credit-card"></i>'
    );
}

if ($arParams['SHOW_PRIVATE_PAGE'] === 'Y')
{
    $availablePages[] = array(
        "path" => $arResult['PATH_TO_PRIVATE'],
        "name" => Loc::getMessage("SPS_PERSONAL_PAGE_NAME"),
        "icon" => '<i class="fa fa-user-secret"></i>'
    );
}

if ($arParams['SHOW_ORDER_PAGE'] === 'Y')
{

    $delimeter = ($arParams['SEF_MODE'] === 'Y') ? "?" : "&";
    $availablePages[] = array(
        "path" => $arResult['PATH_TO_ORDERS'].$delimeter."filter_history=Y",
        "name" => Loc::getMessage("SPS_ORDER_PAGE_HISTORY"),
        "icon" => '<i class="fa fa-list-alt"></i>'
    );
}

if ($arParams['SHOW_PROFILE_PAGE'] === 'Y')
{
    $availablePages[] = array(
        "path" => $arResult['PATH_TO_PROFILE'],
        "name" => Loc::getMessage("SPS_PROFILE_PAGE_NAME"),
        "icon" => '<i class="fa fa-list-ol"></i>'
    );
}

$customPagesList = CUtil::JsObjectToPhp($arParams['~CUSTOM_PAGES']);
if ($customPagesList)
{
    foreach ($customPagesList as $page)
    {
        $availablePages[] = array(
            "path" => $page[0],
            "name" => $page[1],
            "icon" => (strlen($page[2])) ? '<i class="fa '.htmlspecialcharsbx($page[2]).'"></i>' : ""
        );
    }
}

if (empty($availablePages))
{
    ShowError(Loc::getMessage("SPS_ERROR_NOT_CHOSEN_ELEMENT"));
}
else
{
    foreach ($availablePages as $blockElement)
    {
        ?>
        <div class="col-24 col-sm-12 col-md-6 col-lg-4 mb-2">
            <div class="h-100 border px-2 py-3 rounded text-center">
                <a class="d-flex flex-column align-items-center align-content-around text-body" href="<?=htmlspecialcharsbx($blockElement['path'])?>">
                    <div class="h2 text-primary">
                        <?=$blockElement['icon']?>
                    </div>
                    <div class="h3">
                        <?=htmlspecialcharsbx($blockElement['name'])?>
                    </div>
                </a>
            </div>
        </div>
        <?
    }
}
?>