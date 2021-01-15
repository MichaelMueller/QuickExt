<?php

namespace Qck\Ext\HtmlElements;

class TextElement extends \Qck\Ext\HtmlElement
{

    public function __construct( string $text, string $elementName, \Qck\Ext\HtmlElement $parent )
    {
        parent::__construct( $elementName, $parent );
        $this->text = $text;
    }

    protected $elementName;

}
