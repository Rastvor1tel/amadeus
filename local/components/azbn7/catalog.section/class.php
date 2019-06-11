<?

use \Bitrix\Main\Loader as BX__Loader;
use \Bitrix\Main\Localization\Loc as BX__Loc;

//use \Azbn\Core\Main;

class SiteCatalogSectionClass extends CBitrixComponent
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

	public static function genChildrenSections($iblock_id = 0, $section_id = 0)
	{
		
		$res = array();

		$q = array(

			'SELECT' => array(
				'UF_*',
			),
			'FILTER' => array(
				'IBLOCK_ID' => $iblock_id,
				'ACTIVE' => 'Y',
				'SECTION_ID' => $section_id,
			),
			'ORDER' => array(
				'SORT' => 'ASC',
			),
			'GROUPBY' => false,
			'NAV' => false,
			'INC_COUNT' => false,

		);

		$arItems = \CIBlockSection::GetList(
			$q['ORDER'],
			$q['FILTER'],
			$q['INC_COUNT'],
			$q['SELECT'],
			$q['NAV']
		);
		
		while($arItem = $arItems->GetNext()) {
			$res[] = $arItem;
		}

		return $res;

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
							'CODE' => isset($this->arParams['SECTION_CODE']) ? $this->arParams['SECTION_CODE'] : null,
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
				
				/*
				'PAGINATION' => array(
					'PAGE' => 0,
					'COUNT' => 6,
					'COUNT_FULL' => 0,
				),
				*/
				
			));
			
			$page = isset($this->arParams['PAGINATION']) && isset($this->arParams['PAGINATION']['PAGE']) ? isset($this->arParams['PAGINATION']['PAGE']) : 1;
			
			if($page < 1) {
				$page = 1;
			}
			
			$count_on_page = isset($this->arParams['PAGINATION']) && isset($this->arParams['PAGINATION']['COUNT']) ? isset($this->arParams['PAGINATION']['COUNT']) : 6;
			
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
			
			/*
			$section_id = 0;
			
			$this->arResult['SECTIONS'][$section_id] = static::genChildrenSections($this->arParams['IBLOCK_ID'], $section_id);

			if(count($this->arResult['SECTIONS'][$section_id])) {
				foreach($this->arResult['SECTIONS'][$section_id] as $item) {
					$this->arResult['SECTIONS'][$item['ID']] = static::genChildrenSections($this->arParams['IBLOCK_ID'], $item['ID']);
				}
			}
			
			while($arItem = $arItems->GetNext()) {
				$this->arResult['SECTIONS'][] = $arItem;
			}
			*/
			
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
					'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
					'ACTIVE' => 'Y',
					//'IBLOCK_SECTION_ID' => $arResult['ITEM']['ID'],
					'SECTION_ID' => isset($this->arResult['SECTION']) ? $this->arResult['SECTION']['ID'] : null,
				),
				
				'ORDER' => array(
					'SORT' => 'ASC',
					//'CREATED_DATE' => 'DESC',
					'ID' => 'DESC',
				),
				
				'GROUPBY' => false,
				
				'NAV' => array(
					'nTopCount' => false,
					//'bShowAll' => false,// разрешить вывести все элементы при постраничной навигации
					'iNumPage' => $page,// номер страницы при постраничной навигации
					'nPageSize' => $count_on_page,// количество элементов на странице при постраничной навигации
				),
			);
			
			$this->arParams['PAGINATION']['COUNT'] = $count_on_page;
			$this->arParams['PAGINATION']['PAGE'] = $page;
			
			$this->arParams['PAGINATION']['COUNT_FULL'] = \CIBlockElement::GetList(
				$this->arParams['QUERY']['ITEMS']['ORDER'],
				$this->arParams['QUERY']['ITEMS']['FILTER'],
				array(),
				false,
				$this->arParams['QUERY']['ITEMS']['SELECT']
			);
			
			$arItems = \CIBlockElement::GetList(
				$this->arParams['QUERY']['ITEMS']['ORDER'],
				$this->arParams['QUERY']['ITEMS']['FILTER'],
				$this->arParams['QUERY']['ITEMS']['GROUPBY'],
				$this->arParams['QUERY']['ITEMS']['NAV'],
				$this->arParams['QUERY']['ITEMS']['SELECT']
			);
			
			while($arItem = $arItems->GetNext()) {
				$this->arResult['ITEMS'][] = $arItem;
			}
			
			$this->includeComponentTemplate();
			
		} catch(\Exception $e) {
			
			ShowError($e->getMessage());
			
		} finally {
			
			
			
		}
		
	}
	
}