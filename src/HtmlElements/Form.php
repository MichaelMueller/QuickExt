<?php

namespace Qck\Ext\HtmlElements;

class Form extends ContainerElement
{

    const POST = "post";
    const GET  = "get";

    public function __construct( \Qck\Request $request, string $action, \Qck\Ext\HtmlElement $parent )
    {
        parent::__construct( $request, "form", $parent );
        $this->attributes[ "action" ] = $action;
        $this->attributes[ "method" ] = self::POST;
    }

    function setMethod( $method ): From
    {
        $this->attributes[ "method" ] = $method;
        return $this;
    }

}
