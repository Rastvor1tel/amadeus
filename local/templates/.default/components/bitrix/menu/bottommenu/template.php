<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if ($arResult): ?>
    <div class="footer__navbar-cols cols">
    <ul class="footer__navbar-nav">
    <? foreach ($arResult as $key => $arItem): ?>
        <? if (($key > 0) && ($key % 4 == 0)): ?>
            </ul>
            </div>
            <div class="footer__navbar-cols cols">
            <ul class="footer__navbar-nav">
        <? endif ?>
        <li class="footer__navbar-item<?= $arItem['SELECTED'] ? ' is--active' : ''; ?>">
            <a href="<?= $arItem['LINK'] ?>" class="footer__navbar-link"><?= $arItem['TEXT'] ?></a>
        </li>
    <? endforeach; ?>
    </ul>
    </div>
<? endif; ?>