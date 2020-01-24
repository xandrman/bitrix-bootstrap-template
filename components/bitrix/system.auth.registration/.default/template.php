<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

ShowMessage($arParams["~AUTH_RESULT"]);

?>

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 col-xl-4">
        <form method="post" action="<?= $arResult["AUTH_URL"] ?>" name="regform" autocomplete="off"
              enctype="multipart/form-data">
            <input type="hidden" name="AUTH_FORM" value="Y"/>
            <input type="hidden" name="TYPE" value="REGISTRATION"/>
            <div class="form-group">
                <label for="userLogin"><?= GetMessage("AUTH_LOGIN_MIN") ?> *</label>
                <input type="text" name="USER_LOGIN" id="userLogin"
                       value="<?= $arResult["USER_LOGIN"] ?>" maxlength="50" autocomplete="off"
                       class="form-control" required>
            </div>
            <div class="form-group">
                <label for="userEmail"><?= GetMessage("AUTH_EMAIL") ?> *</label>
                <input type="email" name="USER_EMAIL" id="userEmail"
                       value="<?= $arResult["USER_EMAIL"] ?>" maxlength="255" autocomplete="off"
                       class="form-control" required>
            </div>
            <div class="form-group">
                <label for="userPassword"><?= GetMessage("AUTH_PASSWORD_REQ") ?> *</label>
                <input type="password" name="USER_PASSWORD" id="userPassword"
                       value="<?= $arResult["USER_PASSWORD"] ?>" maxlength="255" autocomplete="off"
                       class="form-control" required>
            </div>
            <div class="form-group">
                <label for="userConfirmPassword"><?= GetMessage("AUTH_CONFIRM") ?></label>
                <input type="password" name="USER_CONFIRM_PASSWORD" id="userConfirmPassword"
                       value="<?= $arResult["USER_CONFIRM_PASSWORD"] ?>" maxlength="255" autocomplete="off"
                       class="form-control" required>
            </div>

            <div class="form-group">
                <label for="userName"><?= GetMessage("AUTH_NAME") ?></label>
                <input type="text" name="USER_NAME" id="userName"
                       value="<?= $arResult["USER_NAME"] ?>" maxlength="50" autocomplete="off"
                       class="form-control">
            </div>
            <div class="form-group">
                <label for="userLastName"><?= GetMessage("AUTH_LAST_NAME") ?></label>
                <input type="text" name="USER_LAST_NAME" id="userLastName"
                       value="<?= $arResult["USER_LAST_NAME"] ?>" maxlength="50" autocomplete="off"
                       class="form-control">
            </div>

            <? if ($arResult["USE_CAPTCHA"] == "Y") : ?>
                <div class="form-group">
                    <input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                    <label for="captcha"><?= GetMessage("CAPTCHA_REGF_TITLE") ?></label>
                    <div class="input-group" id="captcha">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>"
                                     width="150" height="40" alt="CAPTCHA"/>
                            </div>
                        </div>
                        <textarea name="captcha_word" maxlength="50" required autocomplete="off" placeholder="Слово"
                                  class="form-control" aria-label="With textarea" style="resize:none;"></textarea>
                    </div>
                    <small class="form-text text-muted"><?= GetMessage("CAPTCHA_REGF_PROMT") ?></small>
                </div>
            <? endif ?>

            <div class="form-group form-check">
                <? $APPLICATION->IncludeComponent("bitrix:main.userconsent.request", "",
                    array(
                        "ID" => COption::getOptionString("main", "new_user_agreement", ""),
                        "IS_CHECKED" => "Y",
                        "AUTO_SAVE" => "N",
                        "IS_LOADED" => "Y",
                        "ORIGINATOR_ID" => $arResult["AGREEMENT_ORIGINATOR_ID"],
                        "ORIGIN_ID" => $arResult["AGREEMENT_ORIGIN_ID"],
                        "INPUT_NAME" => $arResult["AGREEMENT_INPUT_NAME"],
                        "REPLACE" => array(
                            "button_caption" => GetMessage("AUTH_REGISTER"),
                            "fields" => array(
                                rtrim(GetMessage("AUTH_NAME"), ":"),
                                rtrim(GetMessage("AUTH_LAST_NAME"), ":"),
                                rtrim(GetMessage("AUTH_LOGIN_MIN"), ":"),
                                rtrim(GetMessage("AUTH_PASSWORD_REQ"), ":"),
                                rtrim(GetMessage("AUTH_EMAIL"), ":"),
                            )
                        ),
                    )
                ); ?>
            </div>
            <div class="form-group">
                * <?= GetMessage("AUTH_REQ") ?>
            </div>
            <button type="submit" class="btn btn-primary"><?= GetMessage("AUTH_REGISTER") ?></button>
        </form>
    </div>
</div>