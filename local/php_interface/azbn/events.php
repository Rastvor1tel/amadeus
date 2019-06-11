<?


AddEventHandler('main', 'OnBeforeUserLogin', '__azbn__OnBeforeUserLogin');

function __azbn__OnBeforeUserLogin(&$arFields)
{
	
	//var_dump($arFields);
	
	if(isset($_POST['f']['login'])) {
		
		$e = ($_POST['f']['login']);//htmlspecialcharsEx
		$filter = array(
			'EMAIL' => $e,
			'ACTIVE' => 'Y',
		);
		
		$by = 'ID';
		$order = 'DESC';
		
		$rsUsers = \CUser::GetList($by, $order, $filter);
		//$res = $rsUsers->Fetch();
		
		$res = array();
		
		while($arUser = $rsUsers->Fetch()) {
			if($arUser['EMAIL'] == $e) {
				
				$res = $arUser;
				
			}
		}
		
		if($res['LOGIN']) {
			$arFields["LOGIN"] = $res['LOGIN'];
		} else {
			$arFields["LOGIN"] = $e;
		}
		
		//echo '<br />';
		
		//var_dump($arFields);
		//die();
		
	}
}

