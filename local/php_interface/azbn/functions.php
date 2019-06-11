<?

function azbn_ed($a = array(), $for_all = false) {
	
	global $USER;
	
	if($USER->IsAdmin() || $for_all) {
		
		$bt = debug_backtrace();
		$bt = $bt[0];
		$dRoot = $_SERVER['DOCUMENT_ROOT'];
		$dRoot = str_replace('/', "\\", $dRoot);
		$bt['file'] = str_replace($dRoot, '', $bt['file']);
		$dRoot = str_replace("\\", '/', $dRoot);
		$bt['file'] = str_replace($dRoot, '', $bt['file']);
		?>
		<div style="background-color:#ffffff;color:#000000;outline:1px green solid;font-size:10px;" >
			<div style="padding:5px 10px;background-color:green;color:#ffffff;font-weight:bold;" >File: <?=$bt['file'];?> [line: <?=$bt['line'];?>]</div>
			<pre style="padding:10px;" ><? print_r($a);?></pre>
		</div>
		<?
		
	}
	
}

function azbn_phone($phone = '') {
	return preg_replace('/[^0-9]/', '', $phone);
}

function azbn_widget($iblock_id = 0, $el_uid = 0, $field = 'NAME', $tpl = '.default')
{
	
	global $APPLICATION;
	
	$p = array(
		'IBLOCK_ID' => $iblock_id,
		'FIELD' => $field,
	);
	
	if(is_string($el_uid)) {
		$p['CODE'] = $el_uid;
	} else {
		$p['ID'] = intval($el_uid);
	}
	
	$APPLICATION->IncludeComponent(
		SITE__NS . ':_.widget',
		$tpl,
		$p
	);
	
}
