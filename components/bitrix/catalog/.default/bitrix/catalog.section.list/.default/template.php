<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

$double_depth = false;
foreach ($arResult['SECTIONS'] as $arSection) {
    if ($arSection["RELATIVE_DEPTH_LEVEL"] === 2) {
        $double_depth = true;
        break;
    }
}
?>

<? if (count($arResult['SECTIONS'])) : ?>
    <div class="form-row mb-3">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-2">
            <div class="bg-light rounded p-2 h-100">
                <?
                foreach ($arResult['SECTIONS'] as $key => $arSection) {
                    if  ($key > 0 and $arSection["RELATIVE_DEPTH_LEVEL"] === 1 and $double_depth) {
                        ?></ul></div></div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-2">
                                <div class="bg-light py-2 px-2 h-100 rounded"><?
                    }

                    if ($double_depth and $arSection["RELATIVE_DEPTH_LEVEL"] === 1) {
                        ?><h5 class="mb-0 p-1 ml-1">
                            <a class="text-body" href="<?= $arSection['SECTION_PAGE_URL'] ?>">
                                <?= $arSection['NAME'] ?>
                            </a>
                        </h5><ul class="mb-1"><?
                    } else {
                        if ($key === 0) {
                            ?><ul class="mb-1"><?
                        }
                        ?><li>
                            <a class="text-body" href="<?= $arSection['SECTION_PAGE_URL'] ?>"><?= $arSection['NAME'] ?></a>
                        </li><?
                    }
                }
                ?>
                </ul>
            </div>
        </div>
    </div>
<? endif; ?>

