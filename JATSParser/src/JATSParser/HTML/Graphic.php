<?php

namespace JATSParser\HTML;

use JATSParser\Body\Graphic as JATSInlineGrapgic;


class Graphic extends \DOMElement
{
    public function __construct()
    {
        //The img is not wrapped in a div because <inline-graphics /> 
        //are intended to be shown inline with the text and not with a line break, 
        parent::__construct("img");
    }

    public function setContent(JATSInlineGrapgic $jatsInlineGraphic)
    {

        $this->setAttribute("class", "graphic");
        $this->setAttribute("alt", "graphic file with name " + $jatsInlineGraphic->getLink());
        $this->setAttribute("src", rawurlencode($jatsInlineGraphic->getLink()));
        $this->setAttribute("id", $jatsInlineGraphic->getId());
    }
}
