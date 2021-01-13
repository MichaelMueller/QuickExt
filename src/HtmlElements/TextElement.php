<?php

namespace Qck\Ext\HtmlElements;

abstract class TextElement extends \Qck\Ext\HtmlElement
{

    public function __construct( \Qck\Ext\HtmlElement $parent = null )
    {
        parent::__construct( $parent );
        $this->enforceClosingTag = true;
    }

    function setText( $text ): \Qck\Ext\HtmlElement
    {
        $this->text = $text;
        return $this;
    }

}
