<?php

namespace Qck\Ext\HtmlElements;

class Input extends SelfClosingElement
{

    public function __construct( string $name, string $type, \Qck\Request $request, HtmlElement $parent )
    {
        parent::__construct( "input", $parent );
        $this->attributes[ "name" ]  = $name;
        $this->attributes[ "type" ]  = $type;
        $this->attributes[ "value" ] = $request->get( $name );
    }

    function setPlaceholder( $placeholder ): Input
    {
        $this->attributes[ "placeholder" ] = $placeholder;
        return $this;
    }

    function setValue( $value ): Input
    {
        $this->attributes[ "value" ] = $value;
        return $this;
    }

}
