<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<div id="search-container" class="">
    <form action="<?=$arResult["FORM_ACTION"]?>">
        <div class="input-group shadow-sm">
            <input name="q" id="title-search-input" type="text" class="form-control" placeholder="Поиск товаров"
                   value="<?=htmlspecialcharsbx($_REQUEST["q"])?>" autocomplete="off"
                   aria-label="Search" aria-describedby="button-search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" id="button-search">Найти</button>
            </div>
        </div>
    </form>
</div>
<script>
    BX.ready(function(){
        new JCTitleSearch({
            'AJAX_PAGE' : '<?=CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
            'CONTAINER_ID': 'search-container',
            'INPUT_ID': 'title-search-input',
            'MIN_QUERY_LEN': 2
        });
    });
</script>