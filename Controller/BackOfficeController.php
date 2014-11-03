<?php
namespace CookieConsent\Controller;

use Thelia\Controller\Admin\BaseAdminController;

use CookieConsent\Form\AddOptionsCookie;
use CookieConsent\Form\AddTypeCookie;
use CookieConsent\Model\CookieconsentTypeQuery;
use CookieConsent\Model\CookieconsentTypeI18nQuery;
use CookieConsent\Model\CookieconsentOptionQuery;
use CookieConsent\Model\CookieconsentOption;

/**
 * Description of BackOfficeController
 * @author Nexxpix - Alexandre N. <anoziere@nexxpix.fr>
 */
class BackOfficeController extends BaseAdminController
{

    public function addType()
    {
        $locale = $this->getCurrentEditionLang();
        $request = $this->getRequest();
        $typeCookieForm = new AddTypeCookie($request);
        $form = $typeCookieForm->getForm();
        $form->bind($request);
        $parameters = array();
        
        if($form->isValid()) {
            $typesDataId = $form->get("type_cookie")->getData();
            
            $types = CookieconsentTypeQuery::create()->find();
            
            if(is_array($types->getData()) && count($types->getData()) > 0) {
                foreach($types->getData() as $typeObj) {
                    //Set active types
                    if(in_array($typeObj->getId(), $typesDataId)) {
                        $typeObj->setActive(1);
                        $typeObj->save();
                    }
                    
                    //set title and description i18n
                    $typeI18N = CookieconsentTypeI18nQuery::create()
                            ->filterById($typeObj->getId())
                            ->filterByLocale($locale->getLocale())
                            ->findOne();
                    if(!is_null($typeI18N)) {
                        $typeI18N->setTitle($form->get('type_cookie_title_'.$typeObj->getId())->getData());
                        $typeI18N->setDescription($form->get('type_cookie_description_'.$typeObj->getId())->getData());
                        $typeI18N->save();
                    }
                }
                $this->getRequest()->getSession()->set("success", 1);
            } else {
                $this->getRequest()->getSession()->set("success", 0);
                
            }
        } else {
            $this->getRequest()->getSession()->set("success", 0);
        }
        
        //add param lang
        if(!is_null($this->getRequest()->get('edit_language_id'))) {
            $parameters["edit_language_id"] = $this->getRequest()->get('edit_language_id');
        }
        
        return $this->redirectToRoute("admin.module.configure", $parameters, array('module_code' => "CookieConsent",
                    '_controller' => 'Thelia\\Controller\\Admin\\ModuleController::configureAction'));
    }
    
    public function addOption()
    {
        $request = $this->getRequest();
        $optionCookieForm = new AddOptionsCookie($request);
        $form = $optionCookieForm->getForm();
        $form->bind($request);
        $parameters = array();
        $style = "";
        
        if($form->isValid()) {
            $optionCookie = CookieconsentOptionQuery::create()->findOne();
            if(is_null($optionCookie)) {
                $optionCookie = new CookieconsentOption();
            }
            if($form->get("options_custom_style")->getData() == "") {
                $style = $form->get("options_style")->getData();
            } else {
                $style = $form->get("options_custom_style")->getData();
            }
            
            $optionCookie->setBannerDisplayMode($form->get("options_banner_display_mode")->getData());
            $optionCookie->setBannerPlacement($form->get("options_banner_placement")->getData());
            $optionCookie->setConsent($form->get("options_consent")->getData());
            $optionCookie->setPrivacySettingsTags($form->get("options_privacy_settings_tags")->getData());
            $optionCookie->setStyle($style);
            $optionCookie->setTagPlacement($form->get("options_tag_placement")->getData());
            $optionCookie->save();
            
            $this->getRequest()->getSession()->set("success", 1);
        } else {
            $this->getRequest()->getSession()->set("success", 0);
        }
        
        return $this->redirectToRoute("admin.module.configure", $parameters, array('module_code' => "CookieConsent",
                    '_controller' => 'Thelia\\Controller\\Admin\\ModuleController::configureAction'));
    }
    
}
