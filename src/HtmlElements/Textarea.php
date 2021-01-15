<?php

namespace Qck\Ext\HtmlElements;

class Textarea extends \Qck\Ext\HtmlElement
{

    public function __construct( string $name, \Qck\Request $request, HtmlElement $parent )
    {
        parent::__construct( "textarea", $parent );
        $this->attributes[ "name" ]  = $name;
        $this->attributes[ "value" ] = $request->get( $name );
    }

    function setPlaceholder( $placeholder ): Textarea
    {
        $this->attributes[ "placeholder" ] = $placeholder;
        return $this;
    }

}
