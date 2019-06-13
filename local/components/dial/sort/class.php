<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Context;

class SortClass extends CBitrixComponent {

    private function getRequestField($field){
        $request = Context::getCurrent()->getRequest();
        $result = $request->get($field);
        return $result;
    }

    public function makeQueryArray($field) {
        $curQuery = $this->getRequestField($field);
        $result = [
            'NAME' => $field
        ];
        if ($curQuery['VALUE'] == 'ASC')
            $result['DIRECTION'] = 'DESC';
        else
            $result['DIRECTION'] = 'ASC';
        return $result;
    }

    public function executeComponent() {
        $result = [];
        foreach ($this->arParams['FIELDS'] as $key => $field) {
            $result[] = $this->makeQueryArray($field);
        }
    }
}