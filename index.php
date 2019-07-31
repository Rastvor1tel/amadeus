<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Home page");
$APPLICATION->SetPageProperty("title", "Трикотажная одежда оптом без рядов по низким ценам| Интернет-магазин Amadeus Family - трикотаж оптом напрямую от производителя");
$APPLICATION->SetPageProperty("description", "Интернет-магазин amadeus-family.ru — это официальное представительство трикотажной фабрики «Amadeus Family» в интернете. У нас продается качественная и модная недорогая трикотажная одежда оптом");
$APPLICATION->SetPageProperty("keywords", "трикотажная фабрика, трикотажная одежда, трикотажная одежда оптом, купить трикотаж оптом, трикотажная фабрика в москве");

include_once($_SERVER['DOCUMENT_ROOT'].'/local/include/recommended.php');
?>

<div class="content-block__panel  is--index-about">
    <div class="bg-block__card  is--index-about">
        <div class="bg-block__inner  is--index-about" style="background-image: url(<?=TEMPLATE_DIR?>/img/default/bg-index-about.png)"></div>
    </div>
    <div class="content-block__container container  is--index-about">
        <div class="page-header__group  is--h1">
            <div class="page-header__panel  is--h1">
                <h2  class="page-header__heading  is--h1">Новым клиентам</h2>
            </div>
        </div>
        <div class="content-block__elem  is--xl  is--index-about">
            <h5 class="content-block__heading  is--index-about">Как легко начать у нас покупать, пошаговая инструкция:</h5>
            <div class="content-block__row row  is--gutter  is--index-about">
                <div class="content-block__cols  cols  is--grid-3  is--index-about">
                    <div class="content-block__card  is--index-about">
                        <div class="content-block__card-item  is--num  is--index-about">01</div>
                        <a href="<?=SITE_TEMPLATE_PATH?>/signup.html">Зарегистрируйтесь</a> <br>на&nbsp;сайте
                    </div>
                </div>
                <div class="content-block__cols  cols  is--grid-3  is--index-about">
                    <div class="content-block__card  is--index-about">
                        <div class="content-block__card-item  is--num  is--index-about">02</div>
                        Выберите ассортимент из&nbsp;<a href="<?=SITE_TEMPLATE_PATH?>/catalog.html">каталога</a>
                    </div>
                </div>
                <div class="content-block__cols  cols  is--grid-3  is--index-about">
                    <div class="content-block__card  is--index-about">
                        <div class="content-block__card-item  is--num  is--index-about">03</div>
                        Готово. Покупайте в режиме Online!
                    </div>
                </div>
            </div>
        </div>
        <div class="content-block__elem  is--lgx  is--index-about">
            <h2 class="content-block__heading  page-header__heading  is--h1">Одежда от производителя</h2>
            <div class="content-block__text  text__block  is--index-about">
                <p>Мы&nbsp;— эксклюзивное официальное представительство трикотажной фабрики «Amadeus family» в&nbsp;Москве. </p>
                <p>Располагаем сетью собственных складов не&nbsp;только в&nbsp;Орле и&nbsp;в&nbsp;Москве. Кроме того, в&nbsp;столице и&nbsp;других городах работают наши фирменные розничные магазины. </p>
                <p>В&nbsp;наличии всегда полный ассортимент, включая новинки, которые были разработаны дизайнерами совсем недавно. </p>
                <p>Мы&nbsp;относимся к&nbsp;каждому клиенту со&nbsp;всем возможным вниманием, предлагаем уникальные условия сотрудничества. </p>
                <p>Мы&nbsp;— семейное предприятие, которое кроме высоких стандартов качества и&nbsp;выгодных условий всегда порадует вас приятным сервисом и&nbsp;доброжелательным отношением. Мы&nbsp;открыты к&nbsp;сотрудничеству и&nbsp;всегда рады новым заказам! </p>
            </div>
        </div>
        <div class="content-block__elem  is--index-about">
            <h3 class="content-block__heading  is--index-about">Наши партнеры</h3>
            <div class="content-block__row row  is--gutter  is--index-about">
                <div class="content-block__cols  cols  is--partners  is--index-about">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/temp/partners-card1.png" class="img-responsive" alt="">
                </div>
                <div class="content-block__cols  cols  is--partners  is--index-about">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/temp/partners-card2.png" class="img-responsive" alt="">
                </div>
                <div class="content-block__cols  cols  is--partners  is--index-about">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/temp/partners-card3.png" class="img-responsive" alt="">
                </div>
                <div class="content-block__cols  cols  is--partners  is--index-about">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/temp/partners-card4.png" class="img-responsive" alt="">
                </div>
                <div class="content-block__cols  cols  is--partners  is--index-about">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/temp/partners-card5.png" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>