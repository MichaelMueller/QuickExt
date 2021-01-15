<?php

namespace Qck\Ext\HtmlElements;

class Html extends \Qck\Ext\HtmlElement
{

    function __construct( \Qck\Ext\HtmlPage $page )
    {
        parent::__construct( "html", null );
        $this->page = $page;
    }

    function page(): \Qck\Ext\HtmlPage
    {
        return $this->page;
    }

    function head(): Head
    {
        if ( !isset( $this->children[ "head" ] ) )
            $this->children[ "head" ] = new Head( $this );
        return $this->children[ "head" ];
    }

    function body( \Qck\Request $request ): Body
    {
        if ( !isset( $this->children[ "body" ] ) )
            $this->children[ "body" ] = new Body( $request, $this );
        return $this->children[ "body" ];
    }

    /**
     *
     * @var \Qck\Ext\HtmlPage
     */
    protected $page;

}
