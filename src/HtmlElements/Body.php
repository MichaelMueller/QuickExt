<?php

namespace Qck\Ext\HtmlElements;

class Body extends ContainerElement
{
    public function __construct( \Qck\Request $request, \Qck\Ext\HtmlElement $parent )
    {
        parent::__construct( $request, "body", $parent );
    }

    /**
     * @return Html
     */
    function parent()
    {
        parent::parent();
    }
}
