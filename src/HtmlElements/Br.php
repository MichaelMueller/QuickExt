<?php

namespace Qck\Ext\HtmlElements;

class Br extends \Qck\Ext\HtmlElement
{

    static function new( HtmlElement $parent = null ): Br
    {
        return new Br( $parent );
    }

    function __construct( HtmlElement $parent = null )
    {
        parent::__construct( $parent );
    }

    protected function elementName(): string
    {
        return "br";
    }

}
