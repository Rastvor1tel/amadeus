<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?if (($APPLICATION->GetCurPage() != '/') && (explode('/', $APPLICATION->GetCurDir())[1] == 'catalog')):?>
    </main>
<?else:?>
        </div>
    </main>
<?endif;?>
<?include_once($_SERVER['DOCUMENT_ROOT'].'/local/include/footer.php');?>
    </body>
</html>
