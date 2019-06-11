<?

use \Bitrix\Main\Loader as BX__Loader;
use \Bitrix\Main\Localization\Loc as BX__Loc;

//use \Azbn\Core\Main;

class SiteNavbarCompClass extends CBitrixComponent
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
			
			//azbn_ed(__FILE__ . ':' . __LINE__);
			
			$this->includeComponentTemplate();
			
		} catch(\Exception $e) {
			
			ShowError($e->getMessage());
			
		}
		
	}
	
}