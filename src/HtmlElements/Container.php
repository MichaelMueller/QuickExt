<?php

namespace Qck\Ext\HtmlElements;

abstract class Container extends \Qck\Ext\HtmlElement
{

    public function __construct( \Qck\Ext\HtmlElement $parent = null )
    {
        parent::__construct( $parent );
    }

    function add( \Qck\Ext\HtmlElement $child ): \Qck\Ext\HtmlElement
    {
        $child->setParent( $this );
        $this->children[] = $child;
        return $this;
    }

    /**
     * 
     * @return \Qck\Ext\HtmlElement[]
     */
    function children()
    {
        return $this->children;
    }

}
