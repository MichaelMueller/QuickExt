<?php

namespace Qck\Ext\HtmlElements;

class Head extends \Qck\Ext\HtmlElement
{

    function __construct( Html $parent )
    {
        parent::__construct( "head", $parent );
    }

    /**
     * @return Html
     */
    function parent()
    {
        parent::parent();
    }

    function style(): Style
    {
        if ( !isset( $this->children[ "style" ] ) )
            $this->children[ "style" ] = new Style( $this );
        return $this->children[ "style" ];
    }

    function title( $text ): Head
    {
        if ( !isset( $this->children[ "title" ] ) )
            $this->children[ "title" ] = new TextElement( $text, "title", $this );
        return $this->children[ "title" ];
    }

}
