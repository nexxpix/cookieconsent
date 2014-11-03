<?php

namespace CookieConsent\Form;

use Thelia\Form\BaseForm;
use CookieConsent\Model\CookieconsentTypeI18nQuery;
use CookieConsent\Model\CookieconsentTypeQuery;
use Thelia\Core\Translation\Translator;
use Thelia\Model\Base\LangQuery;

/**
 * Description of CookieconsentTypeQuery
 * @author Nexxpix - Alexandre N. <anoziere@nexxpix.fr>
 */
class AddTypeCookie extends BaseForm
{

    protected function buildForm()
    {
        //Vars
        $typesFields = array();
        $typesActiveFields = array();
        //Get current language
        $locale = $this->getCurrentEditionLang()->getLocale();

        //All Types
        $typesObj = CookieconsentTypeI18nQuery::create()
                ->findByLocale($locale);
        //Default lang results
        if (count($typesObj) <= 0) {
            $typesObj = CookieconsentTypeI18nQuery::create()
                    ->findByLocale("en_US");
        }
        
        //Sanitize array for Symfony
        foreach ($typesObj as $typeObj) {
            $typesFields[$typeObj->getId()] = $typeObj->getTitle();
        }
        //Sanitize array selected for Symfony
        foreach ($typesObj as $typeObj) {
            $type = CookieconsentTypeQuery::create()->findOneById($typeObj->getId());
            if (!is_null($type) && $type->getActive() == 1) {
                $typesActiveFields[] = $type->getId();
            }
            $this->formBuilder
                    ->add('type_cookie_title_' . $typeObj->getId(), 'text', [
                        'label' => Translator::getInstance()->trans("Title :", [], "cookieconsent"),
                        'data' => '',
                        'required' => false
            ]);
            $this->formBuilder
                    ->add('type_cookie_description_' . $typeObj->getId(), 'textarea', [
                        'label' => Translator::getInstance()->trans("Description :", [], "cookieconsent"),
                        'data' => '',
                        'required' => false
            ]);
            $this->formBuilder
                    ->add('type_cookie_link_' . $typeObj->getId(), 'text', [
                        'label' => Translator::getInstance()->trans("Link of the cookie page :", [], "cookieconsent"),
                        'data' => '',
                        'required' => false
            ]);
        }
        //Field types
        $this->formBuilder
                ->add('type_cookie', 'choice', [
                    'choices' => $typesFields,
                    'label' => Translator::getInstance()->trans("Select your types of cookies :", [], "cookieconsent"),
                    'required' => false,
                    'multiple' => true,
                    'data' => $typesActiveFields,
        ]);
    }

    public function getName()
    {
        return "cookieconsent_type_add";
    }

    /**
     * Get the current edition lang ID, checking if a change was requested in the current request.
     */
    protected function getCurrentEditionLang()
    {
        $return = $this->getRequest()->getSession()->getAdminEditionLang();
        // Return the new language if a change is required.
        if (null !== $edit_language_id = $this->getRequest()->get('edit_language_id', null)) {

            if (null !== $edit_language = LangQuery::create()->findOneById($edit_language_id)) {
                $return = $edit_language;
            }
        }
        // Otherwise return the lang stored in session.
        return $return;
    }

}
