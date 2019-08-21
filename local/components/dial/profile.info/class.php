<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class ProfileInfo extends CBitrixComponent {

    private function getUserFields() {
        global $USER;
        $result = CUser::GetByID($USER->GetID())->Fetch();
        return $result;
    }

    public function getUserField($fieldName) {
        $arUser = $this->getUserFields();
        $result = $arUser[strtoupper($fieldName)];
        return $result;
    }

    public function getUserArray() {
        $result = [
            'ID' => $this->getUserField('ID'),
            'NAME' => $this->getUserField('NAME') . ' ' . $this->getUserField('LAST_NAME'),
            'EMAIL' => $this->getUserField('EMAIL'),
            'PHONE' => $this->getUserField('PERSONAL_PHONE'),
            'LINK' => $this->arParams['PROFILE']
        ];
        return $result;
    }

    private function getUserBasket() {
        $result = [
            'QUANTITY' => 0,
            'TOTAL_PRICE' => 0
        ];
        $arItems = CSaleBasket::GetList([], ["FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"], false, false, []);
        while ($arItem = $arItems->Fetch()) {
            $result['QUANTITY'] += 1;
            $result['TOTAL_PRICE'] += $arItem['PRICE'] * $arItem['QUANTITY'];
        }
        $result['TOTAL_PRICE_FORMATTED'] = number_format($result['TOTAL_PRICE'], 0, '.', ' ');
        return $result;
    }

    public function getBasketArray() {
        $result = $this->getUserBasket();
        $result['LINK'] = $this->arParams['BASKET'];
        return $result;
    }

    private function getUserOrders() {
        //TODO Заказы пользователя
        $arUser = $this->getUserFields();
        $orders = CSaleOrder::GetList([], ['USER_ID' => $arUser['ID'], 'PAYED' => 'Y']);
        $result = [
            'QUANTITY' => 0,
            'TOTAL_PRICE' => 0
        ];
        while ($arOrder = $orders->Fetch()) {
            $result['QUANTITY']++;
            $result['TOTAL_PRICE'] += $arOrder['SUM_PAID'];
        }
        $result['TOTAL_PRICE_FORMATTED'] = number_format($result['TOTAL_PRICE'], 0, '.', ' ');
        return $result;
    }

    public function getOrdersArray() {
        $result = $this->getUserOrders();
        $result['LINK'] = $this->arParams['ORDERS'];
        return $result;
    }

    public function executeComponent() {
        $this->arResult['USER'] = $this->getUserArray();
        $this->arResult['BASKET'] = $this->getBasketArray();
        $this->arResult['ORDERS'] = $this->getOrdersArray();
        $this->includeComponentTemplate();
    }

}