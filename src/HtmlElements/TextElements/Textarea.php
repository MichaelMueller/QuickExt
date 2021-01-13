<?php

namespace Qck\Ext\HtmlElements\TextElements;

class Textarea extends \Qck\Ext\HtmlElements\TextElement
{

    static function new( $name, HtmlElement $parent = null ): Textarea
    {
        return new Textarea( $name, $parent );
    }

    function __construct( $name, HtmlElement $parent = null )
    {
        parent::__construct( $parent );
        $this->name = $name;
    }

    protected function elementName(): string
    {
        return "textarea";
    }

    protected $name;

}
