<?php

namespace CookieConsent\Loop;

use Thelia\Core\Template\Element\BaseI18nLoop;
use \CookieConsent\Model\CookieconsentTypeQuery;
use Thelia\Core\Template\Element\PropelSearchLoopInterface;
use Thelia\Core\Template\Loop\Argument\ArgumentCollection;
use Thelia\Core\Template\Loop\Argument\Argument;
use Thelia\Core\Template\Element\LoopResult;
use Thelia\Core\Template\Element\LoopResultRow;
use Thelia\Model\Base\LangQuery;
/**
 * @author Nexxpix - Alexandre N. <anoziere@nexxpix.fr>
 */
class TypeCookie extends BaseI18nLoop implements PropelSearchLoopInterface
{

    public $countable = true;
    public $timestampable = false;
    public $versionable = false;
    
    public function buildModelCriteria()
    {
        $typesCookie = CookieconsentTypeQuery::create();

        /* manage translations */
        $this->configureI18nProcessing($typesCookie, array('TITLE', 'DESCRIPTION', 'LINK'));

        $start = $this->getStart();
        $limit = $this->getLimit();

        if (!is_null($start) && !is_null($limit)) {
            $typesCookie->offset($start);
            $typesCookie->limit($limit);
        }
        if(!is_null($this->getActive())) {
            $typesCookie->filterByActive($this->getActive());
        }

        return $typesCookie;
    }
   

    protected function getArgDefinitions()
    {
        return new ArgumentCollection(
                Argument::createIntTypeArgument('start', 0), 
                Argument::createIntTypeArgument('limit', 20), 
                Argument::createIntTypeArgument('active', null),
                Argument::createAnyTypeArgument('edit_lang', "en_US")
        );
    }

    public function parseResults(LoopResult $loopResult)
    {
        foreach ($loopResult->getResultDataCollection() as $type) {
            $loopResultRow = new LoopResultRow($type);
            $loopResultRow
                    ->set("ID", $type->getId())
                    ->set("NAME", $type->getName())
                    ->set("TITLE", $type->getVirtualColumn('i18n_TITLE'))
                    ->set("DESCRIPTION", $type->getVirtualColumn('i18n_DESCRIPTION'))
                    ->set("LINK", $type->getVirtualColumn('i18n_LINK'))
            ;
            $loopResult->addRow($loopResultRow);
        }
        return $loopResult;
    }
    
    /**
     * Get the current edition lang ID, checking if a change was requested in the current request.
     */
    public function getLang()
    {
        $return = null;
        // Return the new language if a change is required.
        if (null !== $edit_language_id = $this->getEditLang()) {

            if (null !== $edit_language = LangQuery::create()->findOneById($edit_language_id)) {
                $return = $edit_language;
            }
        } else {
            $return = LangQuery::create()->findOneByLocale("en_US");
        }
        // Otherwise return the lang stored in session.
        return $return->getId();
    }

}
