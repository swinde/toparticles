<?php


namespace Swinde\TopArticles\Model;
use \OxidEsales\Eshop\Application\Model\ArticleList;

class SwArticleList extends SwArticleList_parent
{
    public function loadTop5Articles($iLimit = null)
    {
        //has module?
        $myConfig = $this->getConfig();
        $config = oxRegistry::getConfig();
        $topArtLimit = $config->getConfigParam('topArtLimit');
        if (!$myConfig->getConfigParam('bl_perfLoadPriceForAddList')) {
            $this->getBaseObject()->disablePriceLoad();
        }

        switch ($myConfig->getConfigParam('iTop5Mode')) {
            case 0:
                // switched off, do nothing
                break;
            case 1:
                // manually entered
                $this->loadActionArticles('oxtop5', $iLimit);
                break;
            case 2:
                $sArticleTable = getViewName('oxarticles');

                //by default limit 5
                $sLimit = ($iLimit > 0) ? "limit " . $iLimit : 'limit '.$topArtLimit;

                $sSelect = "select * from $sArticleTable ";
                $sSelect .= "where " . $this->getBaseObject()->getSqlActiveSnippet() . " and $sArticleTable.oxissearch = 1 ";
                $sSelect .= "and $sArticleTable.oxparentid = '' and $sArticleTable.oxsoldamount>0 ";
                $sSelect .= "order by $sArticleTable.oxsoldamount desc $sLimit";

                $this->selectString($sSelect);
                break;
        }
    }
}