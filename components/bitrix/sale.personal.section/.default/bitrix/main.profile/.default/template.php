<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Localization\Loc;

?>

<div class="col-24 col-md-18 col-lg-12">
    <?
    ShowError($arResult["strProfileError"]);

    if ($arResult['DATA_SAVED'] == 'Y') {
        ShowNote(Loc::getMessage('PROFILE_DATA_SAVED'));
    }

    ?>

    <form method="post" name="form1" action="<?= POST_FORM_ACTION_URI ?>" enctype="multipart/form-data" role="form">
        <?= $arResult["BX_SESSION_CHECK"] ?>
        <input type="hidden" name="lang" value="<?= LANG ?>"/>
        <input type="hidden" name="ID" value="<?= $arResult["ID"] ?>"/>
        <input type="hidden" name="LOGIN" value="<?= $arResult["arUser"]["LOGIN"] ?>"/>

        <?
        if (!in_array(LANGUAGE_ID, array('ru', 'ua'))) {
            ?>
            <div class="form-group">
                <label class="main-profile-form-label col-sm-12 col-md-3 text-md-right"
                       for="main-profile-title"><?= Loc::getMessage('main_profile_title') ?></label>
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="TITLE" maxlength="50" id="main-profile-title"
                           value="<?= $arResult["arUser"]["TITLE"] ?>"/>
                </div>
            </div>
            <?
        }
        ?>

        <div class="form-group">
            <label class="" for="main-profile-name"><?= Loc::getMessage('NAME') ?></label>
            <input class="form-control" type="text" name="NAME" maxlength="50" id="main-profile-name"
                   value="<?= $arResult["arUser"]["NAME"] ?>"/>
        </div>
        <div class="form-group">
            <label class="" for="main-profile-last-name"><?= Loc::getMessage('LAST_NAME') ?></label>
            <input class="form-control" type="text" name="LAST_NAME" maxlength="50" id="main-profile-last-name"
                   value="<?= $arResult["arUser"]["LAST_NAME"] ?>"/>
        </div>
        <div class="form-group">
            <label class="" for="main-profile-second-name"><?= Loc::getMessage('SECOND_NAME') ?></label>
            <input class="form-control" type="text" name="SECOND_NAME" maxlength="50" id="main-profile-second-name"
                   value="<?= $arResult["arUser"]["SECOND_NAME"] ?>"/>
        </div>
        <div class="form-group">
            <label class="" for="main-profile-email"><?= Loc::getMessage('EMAIL') ?></label>
            <input class="form-control" type="text" name="EMAIL" maxlength="50" id="main-profile-email"
                   value="<?= $arResult["arUser"]["EMAIL"] ?>"/>
        </div>

        <?
        if ($arResult['CAN_EDIT_PASSWORD']) {
            ?>
            <div class="form-group">
                <label class="" for="main-profile-password"><?= Loc::getMessage('NEW_PASSWORD_REQ') ?></label>
                <input class=" form-control bx-auth-input main-profile-password" type="password" name="NEW_PASSWORD"
                       maxlength="50" id="main-profile-password" value="" autocomplete="off"/>
                <small id="passwordHelp" class="form-text text-muted">
                    <?= $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"] ?>
                </small>
            </div>
            <div class="form-group">
                <label class="" for="main-profile-password-confirm">
                    <?= Loc::getMessage('NEW_PASSWORD_CONFIRM') ?>
                </label>
                <input class="form-control" type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value=""
                       id="main-profile-password-confirm" autocomplete="off"/>
            </div>
            <?
        }
        ?>

        <input type="submit" name="save" class="btn btn-primary"
               value="<?=(($arResult["ID"]>0) ? Loc::getMessage("MAIN_SAVE") : Loc::getMessage("MAIN_ADD"))?>">
        &nbsp;
        <input type="submit" class="btn btn-secondary"  name="reset" value="<?echo GetMessage("MAIN_RESET")?>">
    </form>

    <script>
        BX.Sale.PrivateProfileComponent.init();
    </script>
</div>
