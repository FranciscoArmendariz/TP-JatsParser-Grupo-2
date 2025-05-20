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
        $this->setAttribute("src", rawurlencode($jatsInlineGraphic->getLink()));

        $alt = "";
        $title = $jatsInlineGraphic->getTitle();
        if (isset($title) && $title !== '') {
            $alt = $title;
        } else {
            $alt = "graphic file with name " . $jatsInlineGraphic->getLink();
        }
        $this->setAttribute("alt", $alt);

        $id = $jatsInlineGraphic->getId();
        if (isset($id) && $id !== '') {
            $this->setAttribute("id", $id);
        }
    }
}
