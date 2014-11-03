<?php

namespace CookieConsent\Form;

use Thelia\Form\BaseForm;
use Thelia\Core\Translation\Translator;
use CookieConsent\Model\CookieconsentOptionQuery;

/**
 * Description of CookieconsentTypeQuery
 * @author Nexxpix - Alexandre N. <anoziere@nexxpix.fr>
 */
class AddOptionsCookie extends BaseForm
{

    protected function buildForm()
    {

        //Vars
        $styles = array(
          "dark" => Translator::getInstance()->trans("Dark", [], "cookieconsent") ,
          "light" => Translator::getInstance()->trans("Light", [], "cookieconsent"),
          "monochrome" => Translator::getInstance()->trans("Monochrome", [], "cookieconsent")
        );
        $tagsPlacement = array(
          "bottom-right" => Translator::getInstance()->trans("Bottom Right", [], "cookieconsent"),
          "bottom-left" => Translator::getInstance()->trans("Bottom Left", [], "cookieconsent"),
          "vertical-left" => Translator::getInstance()->trans("Left side", [], "cookieconsent"),
          "vertical-right" => Translator::getInstance()->trans("Right side", [], "cookieconsent")
        );
        $privacySettings = array(
          "true" => Translator::getInstance()->trans("Yes", [], "cookieconsent"),
          "false" => Translator::getInstance()->trans("No", [], "cookieconsent")
        );
        $displayMode = array(
          "top" => Translator::getInstance()->trans("Top", [], "cookieconsent"),
          "bottom" => Translator::getInstance()->trans("Bottom", [], "cookieconsent"),
          "push" => Translator::getInstance()->trans("Push from top (experimental)", [], "cookieconsent")
        );
        $placement = array(
          "false" => Translator::getInstance()->trans("Show the banner on every page until consent is gained", [], "cookieconsent"),
          "true" => Translator::getInstance()->trans("Only show the banner on the first page a visitor looks at", [], "cookieconsent"),
        );
        $consent = array(
          "implicit" => Translator::getInstance()->trans("Implied - set cookies and allow visitors to opt out", [], "cookieconsent"),
          "explicit" => Translator::getInstance()->trans("Explicit - no cookies will be set until a visitor consents", [], "cookieconsent")
        );
        
        $option = CookieconsentOptionQuery::create()->findOne();
        
        //Field types
        $this->formBuilder
                ->add('options_style', 'choice', [
                    'label' => Translator::getInstance()->trans("Select your style of banner :", [], "cookieconsent"),
                    'choices' => $styles,
                    'data' => $option->getStyle(),
                    'multiple' => false,
                    'required'  => false
        ]);
        $this->formBuilder
                ->add('options_banner_placement', 'choice', [
                    'label' => Translator::getInstance()->trans("Banner placement :", [], "cookieconsent"),
                    'choices' => $placement,
                    'data' => $option->getBannerPlacement(),
                    'multiple' => false,
                    'required'  => false,
        ]);
        $this->formBuilder
                ->add('options_custom_style', 'text', [
                    'label' => Translator::getInstance()->trans("Or add path of custom CSS :", [], "cookieconsent"),
                    'data' => (!array_key_exists($option->getStyle(), $styles)) ? $option->getStyle() : "",
                    'required'  => false
        ]);
        $this->formBuilder
                ->add('options_privacy_settings_tags', 'choice', [
                    'label' => Translator::getInstance()->trans("Hide the privacy settings tab :", [], "cookieconsent"),
                    'choices' => $privacySettings,
                    'data' => $option->getPrivacySettingsTags(),
                    'required'  => false,
        ]);
        $this->formBuilder
                ->add('options_tag_placement', 'choice', [
                    'label' => Translator::getInstance()->trans("Tag placement :", [], "cookieconsent"),
                    'choices' => $tagsPlacement,
                    'data' => $option->getTagPlacement(),
                    'multiple' => false,
                    'required'  => false,
        ]);
        $this->formBuilder
                ->add('options_banner_display_mode', 'choice', [
                    'label' => Translator::getInstance()->trans("Banner display mode :", [], "cookieconsent"),
                    'choices' => $displayMode,
                    'data' => $option->getBannerDisplayMode(),
                    'multiple' => false,
                    'required'  => false,
        ]);
        $this->formBuilder
                ->add('options_consent', 'choice', [
                    'label' => Translator::getInstance()->trans("Consent mode :", [], "cookieconsent"),
                    'choices' => $consent,
                    'data' => $option->getConsent(),
                    'multiple' => false,
                    'required'  => false,
        ]);
    }

    public function getName()
    {
        return "cookieconsent_options_add";
    }
    
    

}
