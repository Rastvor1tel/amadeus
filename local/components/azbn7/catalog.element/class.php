<?

use \Bitrix\Main\Loader as BX__Loader;
use \Bitrix\Main\Localization\Loc as BX__Loc;

//use \Azbn\Core\Main;

class SiteCatalogElementClass extends CBitrixComponent
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
				'ITEM' => null,
				'PREVIEW_PICTURE' => null,
				'DETAIL_PICTURE' => null,
			);
			
			$this->arParams = array_merge($this->arParams, array(
				'CACHE_TYPE' => $this->arParams['CACHE_TYPE'],
				'CACHE_TIME' => isset($this->arParams['CACHE_TIME']) ? $this->arParams['CACHE_TIME'] : 3600,
				'QUERY' => array(
					
					'ITEMS' => array(),
					'SECTION' => array(),
					
				),
				
			));
			
			if(isset($this->arParams['IBLOCK'])) {
				
				$this->arResult['IBLOCK'] = &$this->arParams['IBLOCK'];
				
			} elseif(isset($this->arParams['IBLOCK_ID'])) {
				
				$this->arResult['IBLOCK'] = \CIBlock::GetArrayByID($this->arParams['IBLOCK_ID']);
				
			}
			
			if(isset($this->arParams['SECTION_CODE'])) {
				
				$this->arParams['QUERY']['SECTION'] = array(
					
					'SELECT' => array(
						'UF_*',
					),
					'FILTER' => array(
						'IBLOCK_ID' => $this->arResult['IBLOCK']['ID'],
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
					
				);
				
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
				
			}
			
			if(isset($this->arParams['ITEM'])) {
				
				$this->arResult['ITEM'] = &$this->arParams['ITEM'];
				
			} elseif(isset($this->arParams['ITEM_ID']) || isset($this->arParams['ELEMENT_CODE'])) {
				
				$this->arParams['QUERY']['ITEMS'] = array(
					'SELECT' => array(
						'ID',
						'IBLOCK_ID',
						'NAME',
						'PREVIEW_TEXT',
						'PREVIEW_PICTURE',
						'DETAIL_PICTURE',
						'DETAIL_PAGE_URL',
						'CREATED_DATE',
						'DATE_ACTIVE_FROM',
						'DETAIL_TEXT',
					),
					
					'FILTER' => array(
						'IBLOCK_ID' => $this->arResult['IBLOCK']['ID'],
						'ACTIVE' => 'Y',
						//'ID' => $this->arParams['ITEM_ID'],
					),
					
					'ORDER' => array(
						'SORT' => 'ASC',
						//'CREATED_DATE' => 'DESC',
						'ID' => 'DESC',
					),
					
					'GROUPBY' => false,
					
					'NAV' => false,
				);
				
				if(isset($this->arParams['ITEM_ID']) && $this->arParams['ITEM_ID']) {
					$this->arParams['QUERY']['ITEMS']['FILTER']['ID'] = $this->arParams['ITEM_ID'];
				}
				
				if(isset($this->arParams['ELEMENT_CODE']) && $this->arParams['ELEMENT_CODE']) {
					$this->arParams['QUERY']['ITEMS']['FILTER']['CODE'] = $this->arParams['ELEMENT_CODE'];
				}
				
				$arItems = \CIBlockElement::GetList(
					$this->arParams['QUERY']['ITEMS']['ORDER'],
					$this->arParams['QUERY']['ITEMS']['FILTER'],
					$this->arParams['QUERY']['ITEMS']['GROUPBY'],
					$this->arParams['QUERY']['ITEMS']['NAV'],
					$this->arParams['QUERY']['ITEMS']['SELECT']
				);
				
				while($arItem = $arItems->GetNext()) {
					$this->arResult['ITEM'] = $arItem;
				}
				
			}
			
			$this->arResult['PREVIEW_PICTURE'] = \CFile::GetPath($this->arResult['ITEM']['PREVIEW_PICTURE']);
			$this->arResult['DETAIL_PICTURE'] = \CFile::GetPath($this->arResult['ITEM']['DETAIL_PICTURE']);
			
			$this->includeComponentTemplate();
			
		} catch(\Exception $e) {
			
			ShowError($e->getMessage());
			
		} finally {
			
			
			
		}
		
	}
	
}