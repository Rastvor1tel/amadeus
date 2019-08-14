<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if ($arResult): ?>
    <?$count = 1;?>
    <? foreach ($arResult as $arItem): ?>
        <?
        if ($count > 4) break;
        $count++;
        ?>
        <div class="footer__navbar-cols cols">
            <div class="footer__navbar-heading"><?= $arItem['TEXT'] ?></div>
            <div class="footer__navbar-inner-row row">
                <div class="footer__navbar-inner-cols cols">
                    <ul class="footer__navbar-nav">
                        <?$itemCount = 0?>
                        <? foreach ($arItem['ITEMS'] as $arSubItem): ?>
                        <? if (($itemCount > 0) && ($itemCount % 5 == 0)): ?>
                    </ul>
                </div>
                <div class="footer__navbar-inner-cols cols">
                    <ul class="footer__navbar-nav">
                        <? endif ?>
                        <li class="footer__navbar-inner-item<?= $arSubItem['SELECTED'] ? ' is--active' : ''; ?>">
                            <a href="<?= $arSubItem['LINK'] ?>"
                               class="footer__navbar-inner-link"><?= $arSubItem['TEXT'] ?></a>
                        </li>
                        <?$itemCount++;?>
                        <? endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <? endforeach; ?>
<? endif; ?>