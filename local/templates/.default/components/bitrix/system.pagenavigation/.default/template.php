<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");

if ($arResult["NavPageCount"] > 1) {
?>
<div class="content-block__elem    ">
    <div class="pagination__block  is--center">
        <ol class="pagination__list  is--center">
            <?
            if ($arResult["NavPageNomer"] > 1):
                if ($arResult["nStartPage"] > 1):
                    $bFirst = false;
                    if ($arResult["bSavePage"]):
                        ?>
                        <li class="pagination__item  is--center">
                            <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1"
                               class="pagination__link  is--center"><span>1 </span></a>
                        </li>
                    <?
                    else:
                        ?>
                        <li class="pagination__item  is--center">
                            <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"
                               class="pagination__link  is--center"><span>1 </span></a>
                        </li>
                    <?
                    endif;
                    if ($arResult["nStartPage"] > 2):
                        ?>
                        <li class="pagination__item  is--center">
                            <a class="pagination__link  is--center"><span>...</span></a>
                        </li>
                    <?
                    endif;
                endif;
            endif;

            do {
                if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                    ?>
                    <li class="pagination__item is--active is--center">
                        <a class="pagination__link  is--center"><span><?= $arResult["nStartPage"] ?></span></a>
                    </li>
                <?
                elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
                    ?>
                    <li class="pagination__item  is--center">
                        <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"
                           class="pagination__link  is--center"><span><?= $arResult["nStartPage"] ?></span></a>
                    </li>
                <?
                else:
                    ?>
                    <li class="pagination__item  is--center">
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"
                           class="pagination__link  is--center"><span><?= $arResult["nStartPage"] ?></span></a>
                    </li>
                <?
                endif;
                $arResult["nStartPage"]++;
                $bFirst = false;
            } while ($arResult["nStartPage"] <= $arResult["nEndPage"]);

            if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
                if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
                    if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
                        ?>
                        <li class="pagination__item  is--center">
                            <a class="pagination__link  is--center"><span>...</span></a>
                        </li>
                    <?
                    endif;
                    ?>
                    <li class="pagination__item  is--center">
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>"
                           class="pagination__link  is--center"><span><?= $arResult["NavPageCount"] ?></span></a>
                    </li>
                <?
                endif;
            endif;
            }
            ?>
        </ol>
    </div>
</div>