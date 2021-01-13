<?php

namespace Qck\Ext\HtmlElements\Containers;

class Form extends \Qck\Ext\HtmlElements\Container
{

    const POST = "post";
    const GET  = "get";

    static function new( $action, HtmlElement $parent = null ): Form
    {
        return new Form( $action, $parent );
    }

    function __construct( $action, HtmlElement $parent = null )
    {
        parent::__construct( $parent );
        $this->action = $action;
    }

    protected function elementName(): string
    {
        return "form";
    }

    function setMethod( $method )
    {
        $this->method = $method;
    }

    protected $action;
    protected $method = self::POST;

}
