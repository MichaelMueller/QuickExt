<?php

namespace Qck\Ext\HtmlElements;

class Textarea extends \Qck\Ext\HtmlElement
{

    public function __construct( string $name, \Qck\Request $request, \Qck\Ext\HtmlElement $parent )
    {
        parent::__construct( "textarea", $parent );
        $this->attributes[ "name" ]  = $name;
        $this->text = $request->get( $name );
    }

    function setPlaceholder( $placeholder ): Textarea
    {
        $this->attributes[ "placeholder" ] = $placeholder;
        return $this;
    }

}
