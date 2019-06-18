<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CBitrixComponent::includeComponentClass('dial:sort');

class SortClassGet extends SortClass {

    private function getSortParam($param, $default = '') {
        switch ($param) {
            case 'price':
                //$result = 'PROPERTY_MINIMUM_PRICE';
                $result = 'CATALOG_PRICE_3';
                break;
            case 'popular':
                $result = 'shows';
                break;
            default:
                $result = $default;
        }
        return $result;
    }

    private function getSortDirection($direction, $default = '') {
        if ($direction)
            $result = $direction;
        else
            $result = $default;
        return $result;
    }

    public function executeComponent() {
        $result = [];
        $result['SORT'] = $this->getSortParam($this->getRequestField('sort'), $this->arParams['DEFAULT_SORT']);
        $result['DIRECTION'] = $this->getSortDirection($this->getRequestField('direction'), $this->arParams['DEFAULT_DIRECTION']);
        $this->arResult = $result;
        return $result;
    }

}