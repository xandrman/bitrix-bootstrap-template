<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

ShowMessage($arParams["~AUTH_RESULT"]);
ShowMessage($arResult['ERROR_MESSAGE']);
?>

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 col-xl-4">

        <form name="form_auth" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>">
            <input type="hidden" name="AUTH_FORM" value="Y"/>
            <input type="hidden" name="TYPE" value="AUTH"/>
            <? if (strlen($arResult["BACKURL"]) > 0): ?>
                <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
            <? endif ?>
            <? foreach ($arResult["POST"] as $key => $value): ?>
                <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
            <? endforeach ?>
            <div class="form-group">
                <label for="userLogin"><?= GetMessage("AUTH_LOGIN") ?></label>
                <input type="text" name="USER_LOGIN" id="userLogin"
                       value="<?= $arResult["LAST_LOGIN"] ?>" maxlength="50"
                       class="form-control" required>
            </div>
            <div class="form-group">
                <label for="userPassword"><?= GetMessage("AUTH_PASSWORD") ?></label>
                <input type="password" name="USER_PASSWORD" id="userPassword"
                       value="<?= $arResult["USER_PASSWORD"] ?>" maxlength="255" autocomplete="off"
                       class="form-control" required>
            </div>
            <? if ($arResult["STORE_PASSWORD"] == "Y"): ?>
                <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" name="USER_REMEMBER"
                           value="Y" id="userRemember" checked>
                    <label class="form-check-label" for="userRemember">
                        <?= GetMessage("AUTH_REMEMBER_ME") ?>
                    </label>
                </div>
            <? endif; ?>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><?= GetMessage("AUTH_AUTHORIZE") ?></button>
            </div>
            <? if ($arParams["NOT_SHOW_LINKS"] != "Y"): ?>
                <noindex>
                    <div class="form-group">
                        <a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>" rel="nofollow">
                            <?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?>
                        </a>
                    </div>
                </noindex>
            <? endif ?>
            <? if ($arParams["NOT_SHOW_LINKS"] != "Y" && $arResult["NEW_USER_REGISTRATION"] == "Y"
                && $arParams["AUTHORIZE_REGISTRATION"] != "Y"): ?>
                <noindex>
                    <div class="form-group">
                        <a href="<?= $arResult["AUTH_REGISTER_URL"] ?>" rel="nofollow">
                            <?= GetMessage("AUTH_REGISTER") ?></a>
                        <br/>
                        <small><?= GetMessage("AUTH_FIRST_ONE") ?></small>
                    </div>
                </noindex>
            <? endif ?>
        </form>
    </div>
</div>
