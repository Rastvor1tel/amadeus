<?

use \Bitrix\Main\Loader as BX__Loader;
use \Bitrix\Main\Localization\Loc as BX__Loc;

//use \Azbn\Core\Main;

class SiteNewsListClass extends CBitrixComponent
{
	
	protected function checkModules()
	{
		
		/*
		if(!BX__Loader::includeModule('azbn.core')) {
			
			throw new \Bitrix\Main\LoaderException(BX__Loc::getMessage('AZBN_CORE_MODULE_NOT_CONNECTED'));
			
			return false;
			
		}
		*/
		
		return true;
		
	}
	
	public function executeComponent()
	{
		
		$this->setFrameMode(true);
		
		$this->includeComponentLang(basename(__FILE__));
		
		try {
			
			$this->checkModules();
			
			$this->arResult = array(
				'IBLOCK' => null,
				'SECTION' => null,
				'SECTIONS' => array(),
				'ITEMS' => array(),
			);
			
			$this->arParams = array_merge($this->arParams, array(
				'CACHE_TYPE' => $this->arParams['CACHE_TYPE'],
				'CACHE_TIME' => isset($this->arParams['CACHE_TIME']) ? $this->arParams['CACHE_TIME'] : 3600,
				//'IBLOCK_TYPE' => 'news',
				//'IBLOCK_ID' => 3,
				//'nTopCount' => 3,
				'QUERY' => array(
					
					'SECTION' => array(
						'SELECT' => array(
							'UF_*',
						),
						'FILTER' => array(
							'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
							'ACTIVE' => 'Y',
							'CODE' => $this->arParams['SECTION_CODE'],
						),
						'ORDER' => array(
							//'CREATED_DATE' => 'DESC',
							//'DATE_CREATE' => 'DESC',
							//'SORT' => 'ASC',
							//'DATE_ACTIVE_FROM' => 'DESC',
							//'ID' => 'DESC',
						),
						'GROUPBY' => false,
						'NAV' => false,
						'INC_COUNT' => false,
					),
					
					'SECTIONS' => array(
						'SELECT' => array(
							'UF_*',
						),
						'FILTER' => array(
							'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
							'ACTIVE' => 'Y',
						),
						'ORDER' => array(
							'SORT' => 'ASC',
						),
						'GROUPBY' => false,
						'NAV' => false,
						'INC_COUNT' => false,
					),
					
					'ITEMS' => array(
						
						
						
					),
					
				),
				
				'PAGINATION' => array(
					'PAGE' => 0,
					'COUNT' => 8,
					'COUNT_FULL' => 0,
				),
				
			));
			
			$this->arResult['IBLOCK'] = \CIBlock::GetArrayByID($this->arParams['IBLOCK_ID']);
			
			$arItems = \CIBlockSection::GetList(
				$this->arParams['QUERY']['SECTION']['ORDER'],
				$this->arParams['QUERY']['SECTION']['FILTER'],
				$this->arParams['QUERY']['SECTION']['INC_COUNT'],
				$this->arParams['QUERY']['SECTION']['SELECT'],
				$this->arParams['QUERY']['SECTION']['NAV']
			);
			
			while($arItem = $arItems->GetNext()) {
				$this->arResult['SECTION'] = $arItem;
			}
			
			
			$arItems = \CIBlockSection::GetList(
				$this->arParams['QUERY']['SECTIONS']['ORDER'],
				$this->arParams['QUERY']['SECTIONS']['FILTER'],
				$this->arParams['QUERY']['SECTIONS']['INC_COUNT'],
				$this->arParams['QUERY']['SECTIONS']['SELECT'],
				$this->arParams['QUERY']['SECTIONS']['NAV']
			);
			
			while($arItem = $arItems->GetNext()) {
				$this->arResult['SECTIONS'][] = $arItem;
			}
			
			
			if($this->arResult['SECTION']['ID']) {
				
				$ipropValues = new \Bitrix\Iblock\InheritedProperty\SectionValues(
					$this->arResult['SECTION']['IBLOCK_ID'],
					$this->arResult['SECTION']['ID']
				);
				$seo = $ipropValues->getValues();
				/*
				azbn_setSEO(array(
					'TITLE' => $seo['SECTION_META_TITLE'] != '' ? $seo['SECTION_META_TITLE'] : $arResult['ITEM']['NAME'],
					'DESCRIPTION' => $seo['SECTION_META_DESCRIPTION'],
					'KEYWORDS' => $seo['SECTION_META_KEYWORDS'],
				));
				*/
				
				/*
				$page = $this->arParams['PAGE'];
				
				if($page < 1) {
					$page = 1;
				}
				
				$count_on_page = $this->arParams['COUNT_ON_PAGE'];
				*/
				
				$this->arParams['QUERY']['ITEMS'] = array(
					
					'SELECT' => array(
						'ID',
						'IBLOCK_ID',
						'NAME',
						//'PREVIEW_TEXT',
						'PREVIEW_PICTURE',
						'DETAIL_PAGE_URL',
						'CREATED_DATE',
						'DATE_ACTIVE_FROM',
						//'PROPERTY_ATTACHMENT_FILE',
						//'DETAIL_TEXT',
					),
					
					'FILTER' => array(
						'IBLOCK_TYPE' => $this->arResult['SECTION']['IBLOCK_TYPE_ID'],
						'IBLOCK_ID' => $this->arResult['SECTION']['IBLOCK_ID'],
						'ACTIVE' => 'Y',
						//'IBLOCK_SECTION_ID' => $arResult['ITEM']['ID'],
						'SECTION_ID' => $this->arResult['SECTION']['ID'],
					),
					
					'ORDER' => array(
						//'SORT' => 'ASC',
						'CREATED_DATE' => 'DESC',
						'ID' => 'DESC',
					),
					
					'GROUPBY' => false,
					
					'NAV' => array(
						'nTopCount' => false,
						//'bShowAll' => false,// разрешить вывести все элементы при постраничной навигации
						'iNumPage' => $this->arParams['PAGINATION']['PAGE'],// номер страницы при постраничной навигации
						'nPageSize' => $this->arParams['PAGINATION']['COUNT'],// количество элементов на странице при постраничной навигации
					),
					
				);
				
				$this->arParams['PAGINATION']['COUNT_FULL'] = \CIBlockElement::GetList($this->arParams['QUERY']['ITEMS']['ORDER'], $this->arParams['QUERY']['ITEMS']['FILTER'], array(), false, $this->arParams['QUERY']['ITEMS']['SELECT']);
				
				$arItems = \CIBlockElement::GetList($this->arParams['QUERY']['ITEMS']['ORDER'], $this->arParams['QUERY']['ITEMS']['FILTER'], $this->arParams['QUERY']['ITEMS']['GROUPBY'], $this->arParams['QUERY']['ITEMS']['NAV'], $this->arParams['QUERY']['ITEMS']['SELECT']);
				
				while($arItem = $arItems->GetNext()) {
					$this->arResult['ITEMS'][] = $arItem;
				}
				
			}
			
			/*
			
			//$urlTemplate = \CIBlock::GetArrayByID($this->arParams['IBLOCK_ID'], 'DETAIL_PAGE_URL');
			$this->arResult['IBLOCK'] = \CIBlock::GetArrayByID($this->arParams['IBLOCK_ID']);
			$replaces = $this->arResult['IBLOCK'];
			$replaces['IBLOCK_CODE'] = $replaces['CODE'];
			//azbn_ed($iblock);
			//$iblock['IBLOCK_CODE'] = $iblock['CODE'];
			//$urlDeleteSectionButton = CIBlock::ReplaceDetailUrl($urlTemplate, $iblock, true, false);
			
			$items = array();
			
			$itemlist = \Bitrix\Iblock\ElementTable::getList(array(
				'select' => array(
					'*',
				),
				'filter' => array(
					//'CODE' => $this->arParams['ITEM_CODE'],
					'ACTIVE' => 'Y',
					'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
				),
				'order' => array(
					'DATE_CREATE' => 'DESC',
				),
				//'limit' => $this->arParams['LIMIT'],
			));
			
			$rows = $itemlist->fetchAll();
			
			if(count($rows)) {
				
				foreach($rows as $_item) {
					$item = $_item;
					$replaces['CODE'] = $item['CODE'];
					$item['DETAIL_PAGE_URL'] = \CIBlock::ReplaceDetailUrl($this->arResult['IBLOCK']['DETAIL_PAGE_URL'], $replaces, true, false);
					//$item['PROPERTIES'] = azbn_props($item['IBLOCK_ID'], $item['ID']);
					
					$this->arResult['ITEMS'][] = $item;
				}
				
			}
			*/
			
			$this->includeComponentTemplate();
			
		} catch(\Exception $e) {
			
			ShowError($e->getMessage());
			
		} finally {
			
			
			
		}
		
	}
	
}