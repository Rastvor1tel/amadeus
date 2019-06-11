<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CBitrixComponent::includeComponentClass('dial:profile.info');

class ProfileInfoSmall extends ProfileInfo {

    private function getUserImage($width, $height) {
        $result = $this->getUserField('PERSONAL_PHOTO');
        $result = CFile::ResizeImageGet($result, ['width'=>$width, 'height'=>$height], BX_RESIZE_IMAGE_EXACT, true)['src'];
        return $result;
    }

    public function executeComponent() {
        $this->arResult = $this->getUserArray();
        $this->arResult['IMAGE'] = $this->getUserImage(74,74);
        $this->includeComponentTemplate();
    }

}