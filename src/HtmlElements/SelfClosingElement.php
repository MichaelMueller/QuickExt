<?php

namespace Qck\Ext\HtmlElements;

class SelfClosingElement extends \Qck\Ext\HtmlElement
{

    public function __construct( string $elementName, \Qck\Ext\HtmlElement $parent )
    {
        parent::__construct( $elementName, $parent );
        $this->enforceClosingTag = false;
    }

}
