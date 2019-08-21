<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?><?
?>
<?
//print_r($arResult);
?>
    <div class="cabinet__order-block    ">
        <div class="cabinet__order-table    ">
            <div class="cabinet__order-header    ">
                <div class="cabinet__order-header-cols    ">
                    Заказ&nbsp;№
                </div>
                <div class="cabinet__order-header-cols    ">
                    Дата оформления
                </div>
                <div class="cabinet__order-header-cols    ">
                    Кол-во товаров
                </div>
                <div class="cabinet__order-header-cols    ">
                    Сумма
                </div>
                <div class="cabinet__order-header-cols    ">
                    Статус
                </div>
            </div>
            <? foreach ($arResult['ORDERS'] as $arOrder): ?>
                <div class="cabinet__order-body      panel-group">
                    <div class="cabinet__order-body-row      panel">
                        <a class="cabinet__order-body-row-inner collapsed" data-toggle="collapse"
                           data-parent="#accordion" href="#collapse1" aria-expanded="false">
                            <div class="cabinet__order-body-cols    "
                                 data-header="Заказ №:"><?= $arOrder['ORDER']['ID'] ?></div>
                            <div class="cabinet__order-body-cols    "
                                 data-header="Дата оформления:"><?= $arOrder['ORDER']['DATE_INSERT_FORMATED'] ?></div>
                            <div class="cabinet__order-body-cols    "
                                 data-header="Кол-во товаров:"><?= count($arOrder['BASKET_ITEMS']) ?></div>
                            <div class="cabinet__order-body-cols    "
                                 data-header="Сумма:"><?= $arOrder['FORMATED_PRICE'] ?></div>
                            <div class="cabinet__order-body-cols    " data-header="Статус:">
                                Доставка
                            </div>
                        </a>
                        <div id="collapse1" class="cabinet__order-body-collapse panel-collapse collapse"
                             style="height: 0px;" aria-expanded="false">
                            <div class="cabinet__order-body-collapse-inner">
                                <div class="cabinet__order-card    ">
                                    <a href="/amadeus/catalog-card.html" class="cabinet__order-card-preview    ">
                                        <img src="/amadeus/img/temp/card-catalog-lock.jpg" class="img-responsive"
                                             alt="">
                                    </a>
                                    <div class="cabinet__order-card-desc    ">
                                        <div class="cabinet__order-card-heading    ">
                                            <a href="/amadeus/catalog-card.html">Платье Д-1552</a>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Артикул: <span>Д-1552</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Размер: <span>50</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Цвет: <span>Синий+испанский</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Кол-во: <span> 1</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Цена: <span>3150₽</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cabinet__order-card    ">
                                    <a href="/amadeus/catalog-card.html" class="cabinet__order-card-preview    ">
                                        <img src="/amadeus/img/temp/card-catalog-lock.jpg" class="img-responsive"
                                             alt="">
                                    </a>
                                    <div class="cabinet__order-card-desc    ">
                                        <div class="cabinet__order-card-heading    ">
                                            <a href="/amadeus/catalog-card.html">Платье Д-1552</a>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Артикул: <span>Д-1552</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Размер: <span>50</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Цвет: <span>Синий+испанский</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Кол-во: <span> 1</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Цена: <span>3150₽</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cabinet__order-card    ">
                                    <a href="/amadeus/catalog-card.html" class="cabinet__order-card-preview    ">
                                        <img src="/amadeus/img/temp/card-catalog-lock.jpg" class="img-responsive"
                                             alt="">
                                    </a>
                                    <div class="cabinet__order-card-desc    ">
                                        <div class="cabinet__order-card-heading    ">
                                            <a href="/amadeus/catalog-card.html">Платье Д-1552</a>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Артикул: <span>Д-1552</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Размер: <span>50</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Цвет: <span>Синий+испанский</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Кол-во: <span> 1</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Цена: <span>3150₽</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cabinet__order-card    ">
                                    <a href="/amadeus/catalog-card.html" class="cabinet__order-card-preview    ">
                                        <img src="/amadeus/img/temp/card-catalog-lock.jpg" class="img-responsive"
                                             alt="">
                                    </a>
                                    <div class="cabinet__order-card-desc    ">
                                        <div class="cabinet__order-card-heading    ">
                                            <a href="/amadeus/catalog-card.html">Платье Д-1552</a>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Артикул: <span>Д-1552</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Размер: <span>50</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Цвет: <span>Синий+испанский</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Кол-во: <span> 1</span>
                                        </div>
                                        <div class="cabinet__order-card-elem    ">
                                            Цена: <span>3150₽</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cabinet__order-body-delivery">
                                <div class="cabinet__order-body-delivery-cols">
                                    Доставка: <span>Самовывоз из магазина в Орле</span>
                                </div>
                                <div class="cabinet__order-body-delivery-cols">
                                    Оплата: <span>Наличными при получении</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
            <? /*<div class="cabinet__order-body-row      panel">
                <a class="cabinet__order-body-row-inner collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false">
                    <div class="cabinet__order-body-cols    " data-header="Заказ №:">
                        51525
                    </div>
                    <div class="cabinet__order-body-cols    " data-header="Дата оформления:">
                        25.06.2018
                    </div>
                    <div class="cabinet__order-body-cols    " data-header="Кол-во товаров:">
                        2
                    </div>
                    <div class="cabinet__order-body-cols    " data-header="Сумма:">
                        8 150 ₽
                    </div>
                    <div class="cabinet__order-body-cols    " data-header="Статус:">
                        Доставка
                    </div>
                </a>
                <div id="collapse2" class="cabinet__order-body-collapse panel-collapse collapse" style="height: 0px;" aria-expanded="false">
                    <div class="cabinet__order-body-collapse-inner">
                        <div class="cabinet__order-card    ">
                            <a href="/amadeus/catalog-card.html" class="cabinet__order-card-preview    ">
                                <img src="/amadeus/img/temp/card-catalog-lock.jpg" class="img-responsive" alt="">
                            </a>
                            <div class="cabinet__order-card-desc    ">
                                <div class="cabinet__order-card-heading    ">
                                    <a href="/amadeus/catalog-card.html">Платье Д-1552</a>
                                </div>
                                <div class="cabinet__order-card-elem    ">
                                    Артикул: <span>Д-1552</span>
                                </div>
                                <div class="cabinet__order-card-elem    ">
                                    Размер: <span>50</span>
                                </div>
                                <div class="cabinet__order-card-elem    ">
                                    Цвет:  <span>Синий+испанский</span>
                                </div>
                                <div class="cabinet__order-card-elem    ">
                                    Кол-во: <span> 1</span>
                                </div>
                                <div class="cabinet__order-card-elem    ">
                                    Цена: <span>3150₽</span>
                                </div>
                            </div>
                        </div>
                        <div class="cabinet__order-card    ">
                            <a href="/amadeus/catalog-card.html" class="cabinet__order-card-preview    ">
                                <img src="/amadeus/img/temp/card-catalog-lock.jpg" class="img-responsive" alt="">
                            </a>
                            <div class="cabinet__order-card-desc    ">
                                <div class="cabinet__order-card-heading    ">
                                    <a href="/amadeus/catalog-card.html">Платье Д-1552</a>
                                </div>
                                <div class="cabinet__order-card-elem    ">
                                    Артикул: <span>Д-1552</span>
                                </div>
                                <div class="cabinet__order-card-elem    ">
                                    Размер: <span>50</span>
                                </div>
                                <div class="cabinet__order-card-elem    ">
                                    Цвет:  <span>Синий+испанский</span>
                                </div>
                                <div class="cabinet__order-card-elem    ">
                                    Кол-во: <span> 1</span>
                                </div>
                                <div class="cabinet__order-card-elem    ">
                                    Цена: <span>3150₽</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cabinet__order-body-delivery">
                        <div class="cabinet__order-body-delivery-cols">
                            Доставка: <span>Самовывоз из магазина в Орле</span>
                        </div>
                        <div class="cabinet__order-body-delivery-cols">
                            Оплата: <span>Наличными при получении</span>
                        </div>
                    </div>
                </div>*/ ?>
        </div>
    </div>
    </div>
    </div>


<? /*
<table border="0" cellspacing="0" cellpadding="5">
	<tr>
		<td width="60%">
			<?
			if ($_REQUEST["filter_history"] == "Y")
			{
				?><a href="<?=$arResult["CURRENT_PAGE"]?>?filter_history=N"><?echo GetMessage("STPOL_CUR_ORDERS")?></a><?
			}
			else
			{
				?><a href="<?=$arResult["CURRENT_PAGE"]?>?filter_history=Y&filter_status=F"><?echo GetMessage("STPOL_ORDERS_HISTORY")?></a><?
			}
			echo "<br /><br />";
			$bNoOrder = true;
			foreach($arResult["ORDER_BY_STATUS"] as $key => $val)
			{
				$bShowStatus = true;
				foreach($val as $vval)
				{
					$bNoOrder = false;
					if($bShowStatus)
					{
						?><h2><?echo GetMessage("STPOL_STATUS")?> "<?=$arResult["INFO"]["STATUS"][$key]["NAME"] ?>"</h2>
						<small><?=$arResult["INFO"]["STATUS"][$key]["DESCRIPTION"] ?></small>
					<?
					}
					$bShowStatus = false;
					?>
					<table class="sale_personal_order_list">
						<tr>
							<td>
								<b>
								<?echo GetMessage("STPOL_ORDER_NO")?>
								<a title="<?echo GetMessage("STPOL_DETAIL_ALT")?>" href="<?=$vval["ORDER"]["URL_TO_DETAIL"] ?>"><?=$vval["ORDER"]["ACCOUNT_NUMBER"]?></a>
								<?echo GetMessage("STPOL_FROM")?>
								<?= $vval["ORDER"]["DATE_INSERT"]; ?>
								</b>
								<?
								if ($vval["ORDER"]["CANCELED"] == "Y")
									echo GetMessage("STPOL_CANCELED");
								?>
								<br />
								<b>
								<?echo GetMessage("STPOL_SUM")?>
								<?=$vval["ORDER"]["FORMATED_PRICE"]?>
								</b>
								<?if($vval["ORDER"]["PAYED"]=="Y")
									echo GetMessage("STPOL_PAYED_Y");
								else
									echo GetMessage("STPOL_PAYED_N");
								?>
								<?if(IntVal($vval["ORDER"]["PAY_SYSTEM_ID"])>0)
									echo GetMessage("P_PAY_SYS").$arResult["INFO"]["PAY_SYSTEM"][$vval["ORDER"]["PAY_SYSTEM_ID"]]["NAME"]?>
								<br />
								<b><?echo GetMessage("STPOL_STATUS_T")?></b>
								<?=$arResult["INFO"]["STATUS"][$vval["ORDER"]["STATUS_ID"]]["NAME"]?>
								<?echo GetMessage("STPOL_STATUS_FROM")?>
								<?=$vval["ORDER"]["DATE_STATUS"];?>
								<br />
								<?if(IntVal($vval["ORDER"]["DELIVERY_ID"])>0)
								{
									echo "<b>".GetMessage("P_DELIVERY")."</b>".$arResult["INFO"]["DELIVERY"][$vval["ORDER"]["DELIVERY_ID"]]["NAME"];
								}
								elseif (strpos($vval["ORDER"]["DELIVERY_ID"], ":") !== false)
								{
									echo "<b>".GetMessage("P_DELIVERY")."</b>";
									$arId = explode(":", $vval["ORDER"]["DELIVERY_ID"]);
									echo $arResult["INFO"]["DELIVERY_HANDLERS"][$arId[0]]["NAME"]." (".$arResult["INFO"]["DELIVERY_HANDLERS"][$arId[0]]["PROFILES"][$arId[1]]["TITLE"].")";
								}
								?>
							</td>
						</tr>
						<tr>
							<td>
								<table class="sale_personal_order_list_table">
									<tr>
										<td width="0%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td width="100%">
											<b><?echo GetMessage("STPOL_CONTENT")?></b>
										</td>
										<td width="0%">&nbsp;</td>
									</tr>
									<?
									foreach ($vval["BASKET_ITEMS"] as $vvval)
									{
										$measure = (isset($vvval["MEASURE_TEXT"])) ? $vvval["MEASURE_TEXT"] :GetMessage("STPOL_SHT");
										?>
										<tr>
											<td width="0%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
											<td width="100%">

												<?
												if (strlen($vvval["DETAIL_PAGE_URL"]) > 0)
													echo "<a href=\"".$vvval["DETAIL_PAGE_URL"]."\">";
												echo $vvval["NAME"];
												if (strlen($vvval["DETAIL_PAGE_URL"]) > 0)
													echo "</a>";
												?>
											</td>
											<td width="0%" nowrap><?= $vvval["QUANTITY"] ?> <?=$measure?></td>
										</tr>
										<?
									}
									?>
								</table>
							</td>
						</tr>
						<tr>
							<td align="right">
								<a title="<?= GetMessage("STPOL_DETAIL_ALT") ?>" href="<?=$vval["ORDER"]["URL_TO_DETAIL"]?>"><?= GetMessage("STPOL_DETAILS") ?></a>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a title="<?= GetMessage("STPOL_REORDER") ?>" href="<?=$vval["ORDER"]["URL_TO_COPY"]?>"><?= GetMessage("STPOL_REORDER1") ?></a>
								<?if ($vval["ORDER"]["CAN_CANCEL"] == "Y"):?>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a title="<?= GetMessage("STPOL_CANCEL") ?>" href="<?=$vval["ORDER"]["URL_TO_CANCEL"]?>"><?= GetMessage("STPOL_CANCEL") ?></a>
								<?endif;?>
							</td>
						</tr>
					</table>
					<br />
				<?
				}
				?>
				<br />
				<?
			}

			if ($bNoOrder)
			{
				?><center><?echo GetMessage("STPOL_NO_ORDERS")?></center><?
			}
			?>
		</td>
		<td width="5%" rowspan="3">&nbsp;</td>
		<td width="35%" rowspan="3" valign="top">
			<?echo GetMessage("STPOL_HINT")?><br /><br />
			<?echo GetMessage("STPOL_HINT1")?>
		</td>
	</tr>
</table>
*/ ?>