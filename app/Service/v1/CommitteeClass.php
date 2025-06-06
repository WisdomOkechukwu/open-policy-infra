<?php

namespace App\Service\v1;

use App\Helper\OpenParliamentClass;
use App\Helper\XmlReaderClass;

class CommitteeClass
{
    private $openParliamentClass;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->openParliamentClass = new OpenParliamentClass();
    }

    public function getCommitteeBreakdown($url){
        $url = preg_replace('/[^\/]+$/', 'evidence', $url);
        $url = $this->openParliamentClass->getOurCommonsCaInformation($url);

        if(!$url) return [];

        $xmlReaderClass = new XmlReaderClass();
        $formattedXml = $xmlReaderClass->readXml($url);
        return $formattedXml['HansardBody'];
    }


}
