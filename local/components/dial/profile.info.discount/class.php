<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CBitrixComponent::includeComponentClass('dial:profile.info');

class ProfileInfoDiscount extends ProfileInfo {

    private function getDiscount() {
        $result = $this->getUserField('UF_DISCOUNT');
        return $result;
    }

    public function executeComponent() {
        $this->arResult['DISCOUNT'] = $this->getDiscount();
        $this->includeComponentTemplate();
    }

}