<?

use \Bitrix\Main\Loader as BX__Loader;
use \Bitrix\Main\Localization\Loc as BX__Loc;

//use \Azbn\Core\Main;

class SiteCatalogSectionsListClass extends CBitrixComponent
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
			
			// $arItems = \CIBlockSection::GetList(
			// 	$this->arParams['QUERY']['SECTION']['ORDER'],
			// 	$this->arParams['QUERY']['SECTION']['FILTER'],
			// 	$this->arParams['QUERY']['SECTION']['INC_COUNT'],
			// 	$this->arParams['QUERY']['SECTION']['SELECT'],
			// 	$this->arParams['QUERY']['SECTION']['NAV']
			// );
			
			// while($arItem = $arItems->GetNext()) {
			// 	$this->arResult['SECTION'] = $arItem;
			// }
			

			$section_id = 0;
			
			$this->arResult['SECTIONS'][$section_id] = static::genChildrenSections($this->arParams['IBLOCK_ID'], $section_id);

			if(count($this->arResult['SECTIONS'][$section_id])) {
				foreach($this->arResult['SECTIONS'][$section_id] as $item) {
					$this->arResult['SECTIONS'][$item['ID']] = static::genChildrenSections($this->arParams['IBLOCK_ID'], $item['ID']);
				}
			}
			
			// while($arItem = $arItems->GetNext()) {
			// 	$this->arResult['SECTIONS'][] = $arItem;
			// }
			
			$this->includeComponentTemplate();
			
		} catch(\Exception $e) {
			
			ShowError($e->getMessage());
			
		} finally {
			
			
			
		}
		
	}
	
}