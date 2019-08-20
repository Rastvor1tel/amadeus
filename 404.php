<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");

$APPLICATION->SetTitle("Страница не найдена");?>
<div class="content-block__container container  is--dafault-page      is--full">
    <div class="page-header__group  is--h1 align--center-notsmart">
        <div class="breadcrumb__block  justify--center-notsmart">
            <ul class="breadcrumb__list  justify--center-notsmart">
                <li class="breadcrumb__list-item">
                    <a href="/" class="breadcrumb__list-link">Главная</a>
                </li>
                <li class="breadcrumb__list-item is--active">
                    <span class="breadcrumb__list-link">Cтраница не найдена</span>
                </li>
            </ul>
        </div>
        <div class="page-header__panel  is--h1  is--ff-2  align--center-notsmart">
            <h1 class="page-header__heading  is--h1 align--center-notsmart">Cтраница не найдена</h1>
        </div>
    </div>
    <div class="content-block__elem      text__block  is--center">
        <p>Запрашиваемая Вами страница не найдена или не существует</p>
        <p>&nbsp;</p>
        <p>
            <a href="/" class="btn__item    ">
                <span class="btn__name">Ha главную</span>
            </a>
        </p>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>