<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

ShowMessage($arParams["~AUTH_RESULT"]);
?>

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 col-xl-4">
        <form name="bform" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>">
            <input type="hidden" name="AUTH_FORM" value="Y">
            <input type="hidden" name="TYPE" value="SEND_PWD">
            <? if (strlen($arResult["BACKURL"]) > 0): ?>
                <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
            <? endif ?>
            <? foreach ($arResult["POST"] as $key => $value): ?>
                <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
            <? endforeach ?>
            <div class="form-group text-muted">
                <small><?= GetMessage("sys_forgot_pass_note_email") ?></small>
            </div>
            <div class="form-group">
                <label for="userLogin"><?= GetMessage("sys_forgot_pass_login1") ?></label>
                <input type="text" name="USER_LOGIN" id="userLogin"
                       value="<?= $arResult["LAST_LOGIN"] ?>" maxlength="50"
                       class="form-control" required>
            </div>
            <input type="hidden" name="USER_EMAIL"/>
            <? if ($arResult["USE_CAPTCHA"] == "1") : ?>
                <div class="form-group">
                    <input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                    <label for="captcha"><?= GetMessage("system_auth_captcha") ?></label>
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
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><?= GetMessage("AUTH_SEND") ?></button>
            </div>
            <div class="form-group">
                <a href="<?= $arResult["AUTH_AUTH_URL"] ?>"><?= GetMessage("AUTH_AUTH") ?></a>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    document.bform.onsubmit = function () {
        document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;
    };
    document.bform.USER_LOGIN.focus();
</script>