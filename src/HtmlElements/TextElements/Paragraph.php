<?php

namespace Qck\Ext\HtmlElements\TextElements;

class Paragraph extends \Qck\Ext\HtmlElements\TextElement
{

    static function new( $text, HtmlElement $parent = null ): Paragraph
    {
        return (new Paragraph( $parent ) )->setText( $text );
    }

    function __construct( HtmlElement $parent = null )
    {
        parent::__construct( $parent );
    }

    protected function elementName(): string
    {
        return "p";
    }

    protected $action;

}
