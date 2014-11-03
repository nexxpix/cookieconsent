<?php

namespace CookieConsent\Loop;

use Thelia\Core\Template\Element\BaseI18nLoop;
use Thelia\Core\Template\Element\PropelSearchLoopInterface;
use Thelia\Core\Template\Loop\Argument\ArgumentCollection;
use Thelia\Core\Template\Loop\Argument\Argument;
use Thelia\Core\Template\Element\LoopResult;
use Thelia\Core\Template\Element\LoopResultRow;

use CookieConsent\Model\CookieConsentOptionQuery;


/**
 * @author Nexxpix - Alexandre N. <anoziere@nexxpix.fr>
 */
class OptionsCookie extends BaseI18nLoop implements PropelSearchLoopInterface
{
    public $countable = true;
    public $timestampable = false;
    public $versionable = false;
    
    public function buildModelCriteria()
    {
        $optionCookie = CookieConsentOptionQuery::create();


        $start = $this->getStart();
        $limit = $this->getLimit();

        if (!is_null($start) && !is_null($limit)) {
            $optionCookie->offset($start);
            $optionCookie->limit($limit);
        }

        return $optionCookie;
    }
   

    protected function getArgDefinitions()
    {
        return new ArgumentCollection(
                Argument::createIntTypeArgument('start', 0), 
                Argument::createIntTypeArgument('limit', 20)
                );
    }

    public function parseResults(LoopResult $loopResult)
    {
        foreach ($loopResult->getResultDataCollection() as $option) {
            $loopResultRow = new LoopResultRow($option);
            $loopResultRow
                    ->set("STYLE", $option->getStyle())
                    ->set("BANNER_PLACEMENT", $option->getBannerPlacement())
                    ->set("TAG_PLACEMENT", $option->getTagPlacement())
                    ->set("PRIVACY_SETTINGS_TAGS", $option->getPrivacySettingsTags())
                    ->set("BANNER_DISPLAY_MODE", $option->getBannerDisplayMode())
                    ->set("CONSENT", $option->getConsent())
            ;
            $loopResult->addRow($loopResultRow);
        }
        return $loopResult;
    }
}
