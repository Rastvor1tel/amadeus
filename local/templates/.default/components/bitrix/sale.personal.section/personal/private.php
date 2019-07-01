<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc;
?>
<div class="cabinet__navbar-block dropdown">
    <a href="#" data-toggle="dropdown" class="cabinet__navbar-btn-block">
        <div class="container">
            <div class="cabinet__navbar-btn">
                <div class="cabinet__navbar-btn-hamb">
                    <div class="cabinet__navbar-btn-hamb-item  is--top"></div>
                    <div class="cabinet__navbar-btn-hamb-item  is--center"></div>
                    <div class="cabinet__navbar-btn-hamb-item  is--bottom"></div>
                </div>
                <div class="cabinet__navbar-btn-name">
                    Другие разделы
                </div>
            </div>
        </div>
    </a>
    <div class="cabinet__navbar-dropdown">
        <?
        $APPLICATION->IncludeComponent('dial:profile.info.small', '', [
            'PROFILE' => '/personal/profile/'
        ]);
        ?>
        <? $APPLICATION->IncludeComponent('bitrix:menu', 'lk_menu', []); ?>
        <div class="cabinet__navbar-btn">
            <a href="?logout=yes" class="btn__item  is--line">
                <span class="btn__name">Выход</span>
            </a>
        </div>
    </div>
</div>
<div class="content-block__container container  is--aside-cabinet  is--full">
    <div class="page-header__group  is--h1  is--grid">
        <? $APPLICATION->IncludeComponent('bitrix:breadcrumb', ''); ?>
        <div class="page-header__panel  is--h1  is--grid">
            <h1 class="page-header__heading  is--h1  is--grid"><?
                $APPLICATION->ShowTitle(false); ?></h1>
        </div>
        <? $APPLICATION->IncludeComponent('dial:profile.info.discount', ''); ?>
    </div>
    <div class="content-block__elem  is--cabinet">
        <?
        $APPLICATION->IncludeComponent(
            "bitrix:main.profile",
            "personal",
            Array(
                "SET_TITLE" =>$arParams["SET_TITLE"],
                "AJAX_MODE" => $arParams['AJAX_MODE_PRIVATE'],
                "SEND_INFO" => $arParams["SEND_INFO_PRIVATE"],
                "CHECK_RIGHTS" => $arParams['CHECK_RIGHTS_PRIVATE']
            )
        );
        ?>
    </div>
</div>
<?$APPLICATION->SetTitle('Редактирование');?>
<?$APPLICATION->AddChainItem('Редактирование профиля');?>

