<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Context;

class SortClass extends CBitrixComponent {

    public function getRequestField($field) {
        $request = Context::getCurrent()->getRequest();
        $result = $request->get($field);
        return $result;
    }

    private function makeQueryArray($code, $name) {
        global $APPLICATION;
        $curSort = $this->getRequestField('sort');
        $curDirection = $this->getRequestField('direction');
        $result = [
            'NAME' => $name,
            'CODE' => $code
        ];
        if (($curDirection == 'ASC') && $curSort == $code)
            $result['DIRECTION'] = 'DESC';
        else
            $result['DIRECTION'] = 'ASC';
        if ($curSort == $code)
            $result['ACTIVE'] = 'Y';
        else
            $result['ACTIVE'] = 'N';
        $result['QUERY_STRING'] = $APPLICATION->GetCurPageParam('sort=' . $code . '&direction=' . $result['DIRECTION'], ['sort', 'direction']);
        return $result;
    }

    public function executeComponent() {
        $result = [];
        foreach ($this->arParams['FIELDS'] as $key => $field) {
            $result['ITEMS'][] = $this->makeQueryArray($key, $field);
        }
        $this->arResult = $result;
        $this->includeComponentTemplate();
    }

}